<?php
include 'db.php';

if (isset($_GET['alias'])) {
    $alias = $_GET['alias'];

    // Cari URL asli berdasarkan alias
    $stmt = $mysqli->prepare("SELECT long_url FROM links WHERE alias = ?");
    $stmt->bind_param('s', $alias);
    $stmt->execute();
    $stmt->bind_result($longUrl);
    $stmt->fetch();
    $stmt->close();

    if ($longUrl) {
        // Pengalihan ke URL asli setelah jeda waktu
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='apple-touch-icon' sizes='180x180' href='assets/apple-touch-icon.png'>
            <link rel='icon' type='image/png' sizes='32x32' href='assets/favicon-32x32.png'>
            <link rel='icon' type='image/png' sizes='16x16' href='assets/favicon-16x16.png'>
            <link rel='icon' href='assets/favicon.ico' type='image/x-icon'>
            <link rel='manifest' href='assets/site.webmanifest'>
            <title>Redirecting...</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet'>
            <style>
                body { display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f8f9fa; }
                .card { padding: 20px; text-align: center; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px; }
            </style>
        </head>
        <body>
            <div class='card'>
                <h2>Tungguan...</h2>
                <p>Sakedeng deui kana website tujuan <span id='countdown'>15</span> detik.</p>
                <p>Mun teu pindah, <a href='{$longUrl}'>pecet didieu!</a>.</p>
            </div>
            <script>
                let countdown = 15;
                const countdownElement = document.getElementById('countdown');
                const interval = setInterval(() => {
                    countdown--;
                    countdownElement.textContent = countdown;
                    if (countdown === 0) {
                        clearInterval(interval);
                        window.location.href = '{$longUrl}';
                    }
                }, 1000);
            </script>
        </body>
        </html>";
    } else {
        echo 'Link not found!';
    }
} else {
    echo 'No alias provided!';
}
?>
