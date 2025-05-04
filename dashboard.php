<?php
session_start();
if (!isset($_SESSION['nom'])) {
    header("Location: connexion.html");
    exit();
}
$nom = $_SESSION['nom'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fanta - Tableau de bord</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding-bottom: 80px; /* espace pour le menu fixe */
      background: url('img/image2.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    header {
      background: rgba(30, 144, 255, 0.9);
      color: white;
      padding: 20px;
      text-align: center;
    }

    main {
      padding: 40px;
      background-color: rgba(255, 255, 255, 0.85);
      margin: 20px;
      border-radius: 10px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    .vip-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .vip-card {
      background: white;
      border: 1px solid #ddd;
      border-radius: 10px;
      width: 250px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }

    .vip-card h3 {
      color: #1e90ff;
      margin-bottom: 10px;
    }

    .vip-card p {
      font-size: 14px;
      color: #333;
    }

    .vip-card button {
      margin-top: 15px;
      background: #1e90ff;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
    }

    .vip-card button:hover {
      background: #0d75d8;
    }

    footer {
      background: #222;
      color: #aaa;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }

    .menu-bottom {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background: rgba(255,255,255,0.95);
      display: flex;
      justify-content: space-around;
      border-top: 1px solid #ccc;
      padding: 10px 0;
      z-index: 999;
    }

    .menu-bottom a {
      text-decoration: none;
      color: #1e90ff;
      font-weight: bold;
      text-align: center;
    }

    .menu-bottom a:hover {
      color: #0d75d8;
    }

    .menu-bottom div {
      font-size: 14px;
    }

    @media (max-width: 768px) {
      .vip-card {
        width: 100%;
        max-width: 300px;
      }

      main {
        margin: 10px;
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <header>
    <h1>Bienvenue, <?php echo htmlspecialchars($nom); ?> 👋</h1>
    <p>Choisissez votre offre d'investissement</p>
  </header>

  <main>
    <h2>Nos Offres VIP</h2>
    <div class="vip-container">
      <!-- Cartes VIP -->
      <?php for ($i = 1; $i <= 10; $i++): ?>
        <div class="vip-card">
          <h3>VIP <?= $i ?></h3>
          <p>Investissement min : <?= number_format($i * 10000 * ($i > 2 ? $i : 1)) ?> FCFA<br>
          Rendement : <?= 2.5 + $i * 0.5 ?>% / jour</p>
          <button>Souscrire</button>
        </div>
      <?php endfor; ?>
    </div>
  </main>

  <!-- Menu bas -->
  <div class="menu-bottom">
    <a href="dashboard.php"><div>🏠<br>Accueil</div></a>
    <a href="plan_actif.php"><div>📈<br>Plan Actif</div></a>
    <a href="profit.php"><div>💰<br>Profit</div></a>
    <a href="profil.php"><div>👤<br>Profil</div></a>
  </div>

  <footer>
    © 2025 - Fanta. Tous droits réservés.
  </footer>

</body>
</html>
