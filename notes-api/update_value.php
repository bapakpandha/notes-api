<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mysqli = new mysqli("172.19.0.3", "test_notesdb", "1sampai8*notesdb", "test_notesdb");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if (isset($_POST['method'])) {
        $method = $_POST['method'];
        $value = intval($_POST['value']);
        // verify
        $methods = ['GET', 'POST', 'DELETE'];
        if (in_array($method, $methods) && is_int($value) && $value >= 0 && $value <= 30) {
            $name = "waktu_tunda_$method";
            $stmt = $mysqli->prepare("UPDATE config SET value=? WHERE name=?");
            $stmt->bind_param('is', $value, $name);
            $stmt->execute();
            $stmt->close();
        }

        
    } elseif (isset($_POST['e'])) {
        $new_status = $_POST['e'];
        $validStatuses = [0, 400, 401, 403, 404, 408, 500, 502, 504];

        if (in_array($new_status, $validStatuses)) {
            $stmt = $mysqli->prepare("UPDATE config SET value=? WHERE name='error_status'");
            $stmt->bind_param('i', $new_status);
            $stmt->execute();
            $stmt->close();
        }

    } elseif (isset($_POST['deleteId'])) {
        $idNote = intval($_POST['deleteId']);
        $stmt = $mysqli->prepare("UPDATE notes SET isHidden = 1 WHERE id = ?");
        $stmt->bind_param('i', $idNote);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Note delete successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete note']);
        }
        $stmt->close();
    }

        $mysqli->close();
} else {
    header("Content-Type: text/html");
    http_response_code(403);
}
