<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Dicoding Notes Api</title>
    <link rel="stylesheet" href="./asset/vue.css">
</head>

<body>
    <main><button class="sidebar-toggle" aria-label="Menu">
            <div class="sidebar-toggle-button"><span></span><span></span><span></span></div>
        </button>
        <aside class="sidebar">
            <div class="sidebar-nav">
                <ul>
                    <li><a class="section-link" href="#/?id=dicoding-notes-api-no-authentication" title="Custom Dicoding Notes API">Dokumentasi Custom Dicoding Notes API</a></li>
                    <ul style="display: none;">
                        <li><a class="section-link" href="#/?id=endpoint" title="Endpoint">Endpoint</a></li>
                        <ul>
                            <li class="active"><a class="section-link" href="#/?id=notes" title="Notes">Notes</a></li>
                            <ul>
                                <li><a class="section-link" href="#/?id=create-note" title="Create Note">Create Note</a></li>
                                <li><a class="section-link" href="#/?id=get-notes-non-archived" title="Get Notes (non-archived)">Get Notes (non-archived)</a></li>
                                <li><a class="section-link" href="#/?id=get-archived-notes" title="Get Archived Notes">Get Archived Notes</a></li>
                                <li><a class="section-link" href="#/?id=get-single-note" title="Get Single Note">Get Single Note</a></li>
                                <li><a class="section-link" href="#/?id=archive-note" title="Archive Note">Archive Note</a></li>
                                <li><a class="section-link" href="#/?id=unarchive-note" title="Unarchive Note">Unarchive Note</a></li>
                                <li><a class="section-link" href="#/?id=delete-note" title="Delete Note">Delete Note</a></li>
                            </ul>
                        </ul>
                    </ul>
                    <li><a class="section-link" href="#/?id=configuration" title="Konfigurasi">KONFIGURASI API</a></li>
                    <ul style="display: none;">
                        <li><a class="section-link" href="#/?id=waktu-tunda" title="Waktu Tunda">Waktu Tunda</a></li>
                    </ul>
                    <li><a class="section-link" href="#/?id=dataTables" title="Tabel Data">Tabel Data Catatan</a></li>
                </ul>
            </div>
        </aside>
        <section class="content">
            <article class="markdown-section" id="main">
                <h1 id="dicoding-notes-api-no-authentication"><a href="#/?id=dicoding-notes-api-no-authentication" data-id="dicoding-notes-api-no-authentication" class="anchor"><span>Dokumentasi Custom Dicoding Notes API (No Authentication)</span></a></h1>
                <blockquote>
                    <p>API untuk menyimpan catatan publik secara online. Digunakan untuk latihan kelas Dicoding Academy. Di Kustom khusus untuk mempermudah API Processing</p>
                </blockquote>
                <h2 id="endpoint"><a href="#/?id=endpoint" data-id="endpoint" class="anchor"><span>Endpoint</span></a></h2>
                <p><a href= "<?php $_SERVER['SERVER_NAME']?>/notes-api" target="_blank" rel="noopener"><?php $_SERVER['SERVER_NAME']?>/notes-api</a></p>
                <p>atau</p>
                <p><a href="http://103.191.15.111/notes-api" target="_blank" rel="noopener">http://103.191.15.111/notes-api</a></p>
                <h2 id="implementation"><a href="#/?id=implementation" data-id="implementation" class="anchor"><span>Contoh Implementasi</span></a></h2>
                <p><a href="http://my.hostd.my.id/tyntiannotes" target="_blank" rel="noopener">http://my.hostd.my.id/tyntiannotes</a><br>or<br><a href="http://my.hostd.my.id/pustanotes" target="_blank" rel="noopener">http://my.hostd.my.id/pustanotes</a></p>
                <img src="asset/implement.png" alt="Contoh Implementasi">
                <h3 id="notes"><a href="#/?id=notes" data-id="notes" class="anchor"><span>Notes</span></a></h3>
                <h4 id="create-note"><a href="#/?id=create-note" data-id="create-note" class="anchor"><span>Create Note</span></a></h4>
                <ul>
                    <li>URL<ul>
                            <li><code>/notes</code></li>
                        </ul>
                    </li>
                    <li>Method<ul>
                            <li><code>POST</code></li>
                        </ul>
                    </li>
                    <li>Request Body<ul>
                            <li><code>title</code> as <code>string</code></li>
                            <li><code>body</code> as <code>string</code></li>
                        </ul>
                    </li>
                    <li>Response
                        <pre v-pre="" data-lang="json"><code class="lang-json">{
  "status": "success",
  "message": "Note created",
  "data": {
      "id": "notes-_O6A6TJcCYUWO7t4",
      "title": "Hello, Notes!",
      "body": "My new notes.",
      "archived": false,
      "createdAt": "2022-07-28T10:12:12.396Z"
  }
}</code></pre></li>
                </ul>
                <h4 id="get-notes-non-archived"><a href="#/?id=get-notes-non-archived" data-id="get-notes-non-archived" class="anchor"><span>Get Notes (non-archived)</span></a></h4>
                <ul>
                    <li>URL<ul>
                            <li><code>/notes</code></li>
                        </ul>
                    </li>
                    <li>Method<ul>
                            <li><code>GET</code></li>
                        </ul>
                    </li>
                    <li>Response
                        <pre v-pre="" data-lang="json"><code class="lang-json">{
  "status": "success",
  "message": "Note created",
  "data": {
      "id": "notes-_O6A6TJcCYUWO7t4",
      "title": "Hello, Notes!",
      "body": "My new notes.",
      "archived": false,
      "createdAt": "2022-07-28T10:12:12.396Z"
  }
}</code></pre>
                    </li>
                </ul>
                <h4 id="get-archived-notes"><a href="#/?id=get-archived-notes" data-id="get-archived-notes" class="anchor"><span>Get Archived Notes</span></a></h4>
                <ul>
                    <li>URL<ul>
                            <li><code>/notes/archived</code></li>
                        </ul>
                    </li>
                    <li>Method<ul>
                            <li><code>GET</code></li>
                        </ul>
                    </li>
                    <li>Response
                        <pre v-pre="" data-lang="json"><code class="lang-json">{
  "status": "success",
  "message": "Notes retrieved",
  "data": [
      {
          "id": "notes-jT-jjsyz61J8XKiI",
          "title": "Welcome to Notes, Dimas!",
          "body": "Welcome to Notes! This is your first note. You can archive it, delete it, or create new ones.",
          "createdAt": "2022-07-28T10:03:12.594Z",
          "archived": true
      }
  ]
}</code></pre>
                    </li>
                </ul>
                <h4 id="get-single-note"><a href="#/?id=get-single-note" data-id="get-single-note" class="anchor"><span>Get Single Note</span></a></h4>
                <ul>
                    <li>URL<ul>
                            <li><code>/notes/{note_id}</code></li>
                        </ul>
                    </li>
                    <li>Method<ul>
                            <li><code>GET</code></li>
                        </ul>
                    </li>
                    <li>Response
                        <pre v-pre="" data-lang="json"><code class="lang-json">{
  "status": "success",
  "message": "Note retrieved",
  "data": {
      "id": "notes-jT-jjsyz61J8XKiI",
      "title": "Welcome to Notes, Dimas!",
      "body": "Welcome to Notes! This is your first note. You can archive it, delete it, or create new ones.",
      "createdAt": "2022-07-28T10:03:12.594Z",
      "archived": false
  }
}</code></pre>
                    </li>
                </ul>
                <h4 id="archive-note"><a href="#/?id=archive-note" data-id="archive-note" class="anchor"><span>Archive Note</span></a></h4>
                <ul>
                    <li>URL<ul>
                            <li><code>/notes/{note_id}/archive</code></li>
                        </ul>
                    </li>
                    <li>Method<ul>
                            <li><code>POST</code></li>
                        </ul>
                    </li>
                    <li>Response
                    <pre v-pre="" data-lang="json"><code class="lang-json">{
  "status": "success",
  "message": "Note archived"
}</code></pre>
                    </li>
                </ul>
                <h4 id="unarchive-note"><a href="#/?id=unarchive-note" data-id="unarchive-note" class="anchor"><span>Unarchive Note</span></a></h4>
                <ul>
                    <li>URL<ul>
                            <li><code>/notes/{note_id}/unarchive</code></li>
                        </ul>
                    </li>
                    <li>Method<ul>
                            <li><code>POST</code></li>
                        </ul>
                    </li>
                    <li>Response
                    <pre v-pre="" data-lang="json"><code class="lang-json">{
  "status": "success",
  "message": "Note unarchived"
}</code></pre>
                    </li>
                </ul>
                <h4 id="delete-note"><a href="#/?id=delete-note" data-id="delete-note" class="anchor"><span>Delete Note</span></a></h4>
                <ul>
                    <li>URL<ul>
                            <li><code>/notes/{note_id}</code></li>
                        </ul>
                    </li>
                    <li>Method<ul>
                            <li><code>DELETE</code></li>
                        </ul>
                    </li>
                    <li>Response
                    <pre v-pre="" data-lang="json"><code class="lang-json">{
  "status": "success",
  "message": "Note deleted"
}</code></pre>
                    </li>
                </ul>
                <div>
                    <h1 id="configuration"><a href="#/?id=configuration" data-id="configuration" class="anchor"><span>Konfigurasi</span></a></h1>
                    <blockquote>
                        <p>Konfigurasi untuk mengcustom API. Konfigurasi bisa diedit oleh semua user. Jika anda sudah mengatur konfigurasi, bisa jadi ketika anda uji coba, konfigurasi diubah oleh user lain. Mohon maklum karena API ini publik dan tidak ada autentikasi.</p>
                    </blockquote>
                    <h4 id="waktu-tunda"><a href="#/?id=waktu-tunda" data-id="waktu-tunda" class="anchor"><span>Waktu Tunda</span></a></h4>
                    <blockquote>
                        <p>Konfigurasi ini untuk mengeksekusi perintah sleep() pada PHP. Konfigurasi ini mengakibatkan waktu tunda pada fetch API, sehingga fetch API lebih lama dan bisa digunakan untuk mengatur css loading. Anda bisa menginspeksi tampilan loading anda dengan konfigurasi ini.</p>
                    </blockquote>
                    <div style="display: flex;flex-direction: column;align-items: center;">
                        <div class="lnnMGf" style="flex-direction: column;gap: 2rem;border-radius: 16px;width:100%;">
                            <div class='RqT6ge nUAT5b sjVJQd' style="text-align: center;margin: 2rem 0;">
                                <span style='font-size: 1.25rem;'>Waktu Tunda (delay)</span>
                            </div>
                            <?php
                            $methods = ['GET', 'POST', 'DELETE'];
                            foreach ($methods as $method) {
                                $name = "waktu_tunda_$method";
                                $result = $mysqli->query("SELECT value FROM config WHERE name='$name'");
                                $row = $result->fetch_assoc();
                                $value = $row['value'];
                                echo "

                            <div class='vLaHG'>
                                <div jscontroller='SozS2' class='' data-ui='nl' role='link' tabindex='0' jsaction='YOxyHf' data-ved='0ahUKEwjQqe76lruHAxVdUGcHHXd4DZgQ0PMKCB0'>
                                    <div class='HrqWPb'>
                                        <div class='Q1bVje'>
                                            <span class='gn0F7d'>
                                                <span class='RqT6ge'>Delay method $method (detik)</span>
                                            </span>
                                            <div class='Fx8DUe'>
                                                <div id='waktu-tunda-method-$method' style='height:18px;line-height:18px;width:18px;display: flex;flex-direction: row;justify-content: center;align-items: center;gap: 10px;' class='z1asCe GNeCNe'>
                                                    <button onclick=\"updateValue('$method', -1)\">-</button>
                                                    <span id='value-$method'>$value</span>
                                                    <button onclick=\"updateValue('$method', 1)\">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            ";
                            };
                            ?>
                            <script>
                                function updateValue(method, change) {
                                    const span = document.getElementById('value-' + method);
                                    let newValue = parseInt(span.textContent) + change;

                                    const xhr = new XMLHttpRequest();
                                    xhr.open("POST", "update_value.php", true);
                                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                            if (newValue > 30) {
                                                newValue = 30;
                                            } else if (newValue < 0) {
                                                newValue = 0
                                            }
                                            span.textContent = newValue;
                                        }
                                    };
                                    xhr.send("method=" + method + "&value=" + newValue);
                                }
                            </script>
                        </div>
                        <div class="lnnMGf" style="flex-direction: column;gap: 2rem;border-radius: 16px;padding: 1rem;width: 100%;">
                            <form>
                                <div class="Q1bVje" aria-label="Dark theme" role="dialog" style="flex-direction: column;gap: 2rem;border-radius: 16px;width: 100%;">
                                    <div class="RqT6ge nUAT5b sjVJQd">
                                        <span style="font-size: 1.50rem;">Simulasi Error</span>
                                    </div>
                                    <?php $result = $mysqli->query("SELECT value FROM config WHERE name='error_status'");
                                    $error_status = $result->fetch_assoc()['value']; ?>
                                    <label><input type="radio" name="e" value="0" onclick="updateErrorStatus(0)" <?php echo ($error_status == 0 ? 'checked' : ''); ?>>OFF</label>
                                    <label><input type="radio" name="e" value="400" onclick="updateErrorStatus(400)" <?php echo ($error_status == 400 ? 'checked' : ''); ?>>400 Bad Request Error</label>
                                    <label><input type="radio" name="e" value="401" onclick="updateErrorStatus(401)" <?php echo ($error_status == 401 ? 'checked' : ''); ?>>401 Unauthorized Error</label>
                                    <label><input type="radio" name="e" value="403" onclick="updateErrorStatus(403)" <?php echo ($error_status == 403 ? 'checked' : ''); ?>>403 Forbidden Error</label>
                                    <label><input type="radio" name="e" value="404" onclick="updateErrorStatus(404)" <?php echo ($error_status == 404 ? 'checked' : ''); ?>>404 Not Found Error</label>
                                    <label><input type="radio" name="e" value="408" onclick="updateErrorStatus(408)" <?php echo ($error_status == 408 ? 'checked' : ''); ?>>408 Request Timeout Error</label>
                                    <label><input type="radio" name="e" value="500" onclick="updateErrorStatus(500)" <?php echo ($error_status == 500 ? 'checked' : ''); ?>>500 Internal Server Error</label>
                                    <label><input type="radio" name="e" value="502" onclick="updateErrorStatus(502)" <?php echo ($error_status == 502 ? 'checked' : ''); ?>>502 Bad Gateway Error</label>
                                    <label><input type="radio" name="e" value="504" onclick="updateErrorStatus(504)" <?php echo ($error_status == 504 ? 'checked' : ''); ?>>504 Gateway Timeout Error</label>
                                    <div class="RqT6ge nUAT5b sjVJQd" style="align-self: flex-end;color: red;">
                                        <span id="current-status" style="font-size: 1rem;">Current Status: <?php echo $error_status; ?> <?php $error_mesg = null;
                                                                                                                                        switch ($error_status) {
                                                                                                                                            case 400:
                                                                                                                                                $error_mesg = "Bad Request";
                                                                                                                                                echo $error_mesg;
                                                                                                                                                break;
                                                                                                                                            case 401:
                                                                                                                                                $error_mesg = "Unauthorized";
                                                                                                                                                echo $error_mesg;
                                                                                                                                                break;
                                                                                                                                            case 403:
                                                                                                                                                $error_mesg = "Forbidden";
                                                                                                                                                echo $error_mesg;
                                                                                                                                                break;
                                                                                                                                            case 404:
                                                                                                                                                $error_mesg = "Not Found";
                                                                                                                                                echo $error_mesg;
                                                                                                                                                break;
                                                                                                                                            case 408:
                                                                                                                                                $error_mesg = "Request Timeout";
                                                                                                                                                echo $error_mesg;
                                                                                                                                                break;
                                                                                                                                            case 500:
                                                                                                                                                $error_mesg = "Internal Server Error";
                                                                                                                                                echo $error_mesg;
                                                                                                                                                break;
                                                                                                                                            case 502:
                                                                                                                                                $error_mesg = "Bad Gateway";
                                                                                                                                                echo $error_mesg;
                                                                                                                                                break;
                                                                                                                                            case 504:
                                                                                                                                                $error_mesg = "Gateway Timeout";
                                                                                                                                                echo $error_mesg;
                                                                                                                                                break;
                                                                                                                                            default:
                                                                                                                                                $error_mesg = "OFF";
                                                                                                                                                echo $error_mesg;
                                                                                                                                                break;
                                                                                                                                        }
                                                                                                                                        ?></span>
                                    </div>
                                </div>
                                <script>
                                    function updateErrorStatus(newStatus) {
                                        const validStatuses = {
                                            0: "OFF",
                                            400: "Bad Request",
                                            401: "Unauthorized",
                                            403: "Forbidden",
                                            404: "Not Found",
                                            408: "Request Timeout",
                                            500: "Internal Server Error",
                                            502: "Bad Gateway",
                                            504: "Gateway Timeout"
                                        };
                                        if (!(newStatus in validStatuses)) {
                                            console.error("Invalid status: " + newStatus);
                                            return;
                                        }
                                        const xhr = new XMLHttpRequest();
                                        xhr.open("POST", "update_value.php", true);
                                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                document.getElementById("current-status").innerText = "Current Status: " + newStatus + " " + validStatuses[newStatus];
                                            }
                                        };
                                        xhr.send("e=" + newStatus);
                                    }
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <h1 id="dataTables"><a href="#/?id=dataTables" data-id="dataTables" class="anchor"><span>Tabel Data</span></a></h1>
                    <blockquote>
                        <p>Tabel Data dari seluruh catatan yang ada di API ini
                        <p>
                    </blockquote>


                    <?php
                    $queryDbTable = "SELECT id, title, body, archived, createdAt FROM notes WHERE isHidden = 0";
                    $result = $mysqli->query($queryDbTable);
                    echo "<table border='1'>";
                    echo "<tr><th>ID</th><th>Title</th><th>Body</th><th>Archived</th><th>Created At</th><th>Action</th></tr>";
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr IdNote='" . $row['id'] . "'>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['body'] . "</td>";
                            echo "<td><strong>" . ($row['archived'] ? 'True' : 'False') . "</strong></td>";
                            echo "<td>" . $row['createdAt'] . "</td>";
                            echo "<td><button class='delete-btn' data-id='" . $row['id'] . "'>Delete</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' style='text-align:center;'>No Data found.</td></tr>";
                    }
                    echo "</table>";
                    ?>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.querySelectorAll('.delete-btn').forEach(function(button) {
                                if (!button) {
                                    return
                                }
                                button.addEventListener('click', function() {
                                    var idNote = this.getAttribute('data-id');
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'update_value.php', true);
                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === XMLHttpRequest.DONE) {
                                            if (xhr.status === 200) {
                                                var response = JSON.parse(xhr.responseText);
                                                if (response.status == 'success') {
                                                    console.log('Note delete successfully');
                                                    document.querySelector('tr[IdNote="' + idNote + '"]').remove();
                                                } else {
                                                    console.error('Failed to delete note');
                                                }
                                            } else {
                                                alert('Request failed. Returned status of ' + xhr.status);
                                            }
                                        }
                                    };
                                    xhr.send('deleteId=' + idNote);
                                });
                            });
                        });
                    </script>
                </div>
            </article>
            <div style="height: 50vh;"></div>
        </section>

    </main>
</body>
<script src="./asset/docsify.js"></script>

</html>