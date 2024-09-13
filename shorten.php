<?php
include 'db.php';

if (isset($_POST['longUrl'])) {
    $longUrl = $_POST['longUrl'];
    $customAlias = isset($_POST['customAlias']) ? $_POST['customAlias'] : '';

    // Periksa apakah custom alias sudah dipakai
    if (!empty($customAlias)) {
        $stmt = $mysqli->prepare("SELECT COUNT(*) FROM links WHERE alias = ?");
        $stmt->bind_param("s", $customAlias);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            echo json_encode(['error' => 'Alias already taken.']);
            exit();
        }
    } else {
        // Jika tidak ada custom alias, buat secara otomatis// Jika tidak ada custom alias, buat secara otomatis
        $customAlias = substr(md5(uniqid()), 1, 6);
    }

    // Simpan URL panjang dan alias
    $stmt = $mysqli->prepare("INSERT INTO links (long_url, alias) VALUES (?, ?)");
    $stmt->bind_param("ss", $longUrl, $customAlias);
    if ($stmt->execute()) {
        echo json_encode(['shortUrl' => "http://localhost:8000/transit.php?alias={$customAlias}"]);
    } else {
        echo json_encode(['error' => 'Something went wrong.']);
    }
    $stmt->close();
}
?>
