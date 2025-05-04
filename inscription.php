<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nom, $email, $mot_de_passe);

    if ($stmt->execute()) {
        $_SESSION['nom'] = $nom;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Erreur : " . $stmt->error;
    }
}
?>
