<?php
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$method = $_SERVER['REQUEST_METHOD'];
$requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$endpoint = isset($requestUri[1]) ? $requestUri[1] : null;
$noteId = isset($requestUri[2]) ? $requestUri[2] : null;
$action = isset($requestUri[3]) ? $requestUri[3] : null;

// temporary development
$mysqli = new mysqli("172.19.0.3", "test_notesdb", "1sampai8*notesdb", "test_notesdb");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$error_simul = $mysqli->query("SELECT value FROM config WHERE name='error_status'");
$error_simul = $error_simul->fetch_assoc()['value']; 
$error_simul = (int)$error_simul;

if ($error_simul !== 0 && $endpoint !== null) {
    header("Content-Type: text/html");
    http_response_code((int)$error_simul);
    die();
} else {
    switch($method) {
        case 'GET':
            $sleepTime = $mysqli->query("SELECT value FROM config WHERE name='waktu_tunda_GET'");
            $sleepTime = $sleepTime->fetch_assoc()['value']; 
            $sleepTime = (int)$sleepTime;
            if ($endpoint === "notes" && $noteId === null) {
                // Get all non-archived notes
                $result = $mysqli->query("SELECT * FROM notes WHERE archived = 0 AND isHidden=0");
                $notes = [];
                while ($row = $result->fetch_assoc()) {
                    unset($row['idNote']);
                    unset($row['submittedBy']);
                    unset($row['isHidden']);
                    $notes[] = $row;
                }
                sleep($sleepTime);
                echo json_encode(["status" => "success", "message" => "Notes retrieved", "data" => $notes]);
            } elseif ($endpoint === "notes" && $noteId === "archived") {
                // Get all archived notes
                $result = $mysqli->query("SELECT * FROM notes WHERE archived = 1 AND isHidden=0");
                $notes = [];
                while ($row = $result->fetch_assoc()) {
                    unset($row['idNote']);
                    unset($row['submittedBy']);
                    unset($row['isHidden']);
                    $notes[] = $row;
                }
                sleep($sleepTime);
                echo json_encode(["status" => "success", "message" => "Notes retrieved", "data" => $notes]);
            } elseif ($endpoint === "notes" && $noteId !== null) {
                $stmt = $mysqli->prepare("SELECT * FROM notes WHERE id = ? AND isHidden=0");
                $stmt->bind_param("s", $noteId);
                $stmt->execute();
                $result = $stmt->get_result();
                $note = $result->fetch_assoc();
                unset($note['idNote']);
                unset($note['submittedBy']);
                unset($note['isHidden']);
                sleep($sleepTime);
                echo json_encode(["status" => "success", "message" => "Note retrieved", "data" => $note]);
            } elseif ($endpoint === null && $noteId === null) {
                header("Content-Type: text/html");
                include './doc.php';
            } else {
                echo json_encode(["status" => "fail", "message" => "Not Found",]);
            }
            break;
    
        case 'POST':
            $sleepTime = $mysqli->query("SELECT value FROM config WHERE name='waktu_tunda_POST'");
            $sleepTime = $sleepTime->fetch_assoc()['value']; 
            $sleepTime = (int)$sleepTime;
            if ($endpoint === "notes" && $noteId === null) {
                // Create new note
                $input = json_decode(file_get_contents('php://input'), true);
                $title = $mysqli->real_escape_string($input['title']);
                $body = $mysqli->real_escape_string($input['body']);
                $createdAt = date('Y-m-d\TH:i:s.v\Z');
                $submittedBy = $_SERVER['REMOTE_ADDR'];
                $query = "INSERT INTO notes (title, body, createdAt, submittedBy) VALUES ('$title', '$body', '$createdAt', '$submittedBy')";
                if ($mysqli->query($query)) {
                    $newNoteId = $mysqli->insert_id;
                    $newNote = [
                        "id" => "notes-$newNoteId",
                        "title" => $title,
                        "body" => $body,
                        "archived" => false,
                        "createdAt" => $createdAt,
                    ];
                    sleep($sleepTime);
                    echo json_encode(["status" => "success", "message" => "Note created", "data" => $newNote]);
                } else {
                    sleep($sleepTime);
                    echo json_encode(["status" => "error", "message" => "Failed to create note"]);
                }
            } 
            elseif ($endpoint === "notes" && $action === "archive") {
                // Archive note
                $stmt = $mysqli->prepare("UPDATE notes SET archived = 1 WHERE id = ?");
                $stmt->bind_param("s", $noteId);
                $stmt->execute();
                sleep($sleepTime);
                echo json_encode(["status" => "success", "message" => "Note archived"]);
            } 
            elseif ($endpoint === "notes" && $action === "unarchive") {
                // Unarchive note
                $stmt = $mysqli->prepare("UPDATE notes SET archived = 0 WHERE id = ?");
                $stmt->bind_param("s", $noteId);
                $stmt->execute();
                sleep($sleepTime);
                echo json_encode(["status" => "success", "message" => "Note unarchived"]);
            } else {
                echo json_encode(["status" => "fail", "message" => "Not Found",]);
            }
            break;
    
        case 'DELETE':
            $sleepTime = $mysqli->query("SELECT value FROM config WHERE name='waktu_tunda_DELETE'");
            $sleepTime = $sleepTime->fetch_assoc()['value']; 
            $sleepTime = (int)$sleepTime;
            if ($endpoint === "notes" && $noteId !== null) {
                // Delete note by ID
                $stmt = $mysqli->prepare("UPDATE notes SET isHidden = 1 WHERE id = ?");
                $stmt->bind_param("s", $noteId);
                $stmt->execute();
                sleep($sleepTime);
                echo json_encode(["status" => "success", "message" => "Note deleted"]);
            } else {
                echo json_encode(["status" => "fail", "message" => "Not Found",]);
            }
            break;
    
        default:
            sleep($sleepTime);
            echo json_encode(["status" => "error", "message" => "Unsupported request method"]);
            break;
    }
}

$mysqli->close();
?>
