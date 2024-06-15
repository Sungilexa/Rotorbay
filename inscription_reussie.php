<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Réussie</title>
    <link rel="stylesheet" href="inscription_reussie.css">
</head>
<body>
<div class="container">
    <div class="message">
        <h1>Inscription Réussie !</h1>
        <p>Redirection...</p>
    </div>
</div>
<script>
    // Redirige vers loginform.php après 2 secondes (2000 millisecondes)
    setTimeout(function() {
        window.location.href = 'loginform.php';
    }, 2000);
</script>
</body>
</html>
