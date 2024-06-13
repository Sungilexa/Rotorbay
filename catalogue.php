<!-- catalogue.php -->
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link rel="stylesheet" href="catalogue.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <?php include 'header.php'; ?>

    <div class="catalogue">
      <h3>Catalogue des hélicoptères</h3>
      <div class="card-deck">
        <div class="card text-center">
          <a href="milmi24.php">
            <div class="card-header">
              En stock
            </div>
            <img class="card-img-top" src="images/milmi24.jpg" alt="Card image">
            <div class="card-body">
              <p class="card-text text-muted">Hélicoptère de combat</p>
              <a href="#"><h5 class="card-title">Mil-mi 24</h5></a>
              <div class="card-footer">
                15.000.000$
              </div>
            </div>
          </a>
        </div>
        <div class="card text-center">
          <a href="sikorskys92.php">
            <div class="card-header">
                En stock
            </div>
            <img class="card-img-top" src="images/sikorskys92.jpg" alt="Card image">
            <div class="card-body">
              <p class="card-text text-muted">Hélicoptère civil</p>
              <a href="#"><h5 class="card-title">Sikorsky S-92</h5></a>
              <div class="card-footer">
                27.000.000$
              </div>
            </div>
          </a>
        </div>
        <div class="card text-center">
          <a href="h225mcaracal.php">
            <div class="card-header">
                En stock
            </div>
            <img class="card-img-top" src="images/caracalh225m.jpg" alt="Card image">
            <div class="card-body">
              <p class="card-text text-muted">Hélicoptère de combat</p>
              <a href="#"><h5 class="card-title">H225M Caracal</h5></a>
              <div class="card-footer">
                22.000.000$
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
        
    <footer class="footer">
        <p>© 2023 Bladespin aircraft inc.</p>
    </footer>
  </div>
<script src="dynamique.js"></script>
</body>
</html>
