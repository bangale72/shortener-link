<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="manifest" href="assets/site.webmanifest">
    <link rel="stylesheet" href="assets/style.css">
    <title>Nyari Solusi</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Redirect URL</h1>
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <form id="shorten-form">
                            <div class="mb-3">
                                <label for="longUrl" class="form-label">Enter URL</label>
                                <input type="url" class="form-control" id="longUrl" name="longUrl" required placeholder="Masukan URL">
                            </div>
                            <div class="mb-3">
                                <label for="customAlias" class="form-label">Custom URL (Optional)</label>
                                <input type="text" class="form-control" id="customAlias" name="customAlias" placeholder="Custom URL (optional)">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Shorten URL</button>
                        </form>
                        <div class="mt-3 d-none" id="result">
                            <h5>Shortened URL:</h5>
                            <div class="d-flex align-items-center">
                                <a href="#" target="_blank" id="shortenedUrl" class="me-2 flex-grow-1"></a>
                                <button id="copyBtn" class="btn btn-outline-secondary"><i class="bi bi-clipboard"></i> Copy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/main.js"></script>
</body>
</html>
