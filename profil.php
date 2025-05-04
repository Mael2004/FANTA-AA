<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.html");
    exit();
}

// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "fanta_db");

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les informations de l'utilisateur
$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT name, solde_principal, solde_compte FROM users WHERE id = $user_id");

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("Utilisateur introuvable.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Profil - Fanta</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('image2.jpg');
      background-size: cover;
      margin: 0;
      padding: 0;
      color: #fff;
    }
    .container {
      background-color: rgba(0,0,0,0.7);
      max-width: 600px;
      margin: 100px auto;
      padding: 30px;
      border-radius: 10px;
      text-align: center;
    }
    h1 {
      color: #1e90ff;
    }
    .solde {
      font-size: 20px;
      margin: 20px 0;
    }
    .btn {
      background-color: #1e90ff;
      color: white;
      padding: 10px 20px;
      margin: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn:hover {
      background-color: #0c70c1;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Bienvenue, <?= htmlspecialchars($user['name']) ?></h1>

    <div class="solde">
      <p><strong>Solde principal :</strong> <?= number_format($user['solde_principal'], 2) ?> FCFA</p>
      <p><strong>Solde du compte :</strong> <?= number_format($user['solde_compte'], 2) ?> FCFA</p>
    </div>

    <div>
      <button class="btn" onclick="location.href='recharger.php'">Recharger</button>
      <button class="btn" onclick="location.href='retirer.php'">Retirer</button>
      <button class="btn" onclick="location.href='portefeuille.php'">Portefeuille</button>
    </div>

    <div>
      <button class="btn" onclick="location.href='historique_recharge.php'">Historique Recharges</button>
      <button class="btn" onclick="location.href='historique_retrait.php'">Historique Retraits</button>
    </div>

    <div>
      <button class="btn" onclick="location.href='deconnexion.php'">Déconnexion</button>
    </div>
  </div>
</body>
</html>
