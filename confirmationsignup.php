<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription réussie</title>
    <link rel="stylesheet" type="text/css" href="confirmationsignup.css">
    <script>
        setTimeout(function() {
            window.location.href = "loginform.php";
        }, 3000);
    </script>
</head>
<body>
<div class="container">
    <div class="success-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="none" d="M0 0h24v24H0z"/>
            <path d="M9 16.17L5.53 12.7a.996.996 0 1 1 1.41-1.41l2.83 2.83L18.3 7.7a.996.996 0 1 1 1.41 1.41L9 16.17z"/>
        </svg>
    </div>
    <h1>Inscription réussie !</h1>
    <p>Redirection en cours...</p>
    <div class="loader"></div>
</div>
</body>
</html>
