<?php
session_start(); // Démarrer la session

include 'header.php';
include 'db_connection.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    try {
        // Connexion à la base de données
        $db = Connexion();

        // Récupérer les informations utilisateur
        $stmt = $db->prepare("SELECT idUtilisateur FROM utilisateur WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $userId = $user['idUtilisateur'];

        // Récupérer les commandes de l'utilisateur
        $stmt = $db->prepare("SELECT numFacture, prixFacture, descriptionFacture FROM facture WHERE idUtilisateur = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
} else {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: loginform.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace client</title>
    <link rel="stylesheet" type="text/css" href="espace_client.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="content">
        <?php if (isset($_SESSION['email'])): ?>
            <div class="welcome-banner">Bienvenue sur votre espace, <?php echo $_SESSION['email']; ?> !</div>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>N° de commande</th>
                        <th>Montant</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['numFacture']); ?></td>
                                <td><?php echo htmlspecialchars($order['prixFacture']); ?> $</td>
                                <td><?php echo htmlspecialchars($order['descriptionFacture']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">Aucune commande passée.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Vous devez être connecté pour voir cette page.</p>
        <?php endif; ?>
    </div>
    <footer class="footer">
        <p>© 2023 Bladespin aircraft inc.</p>
    </footer>
</div>
</body>
</html>
