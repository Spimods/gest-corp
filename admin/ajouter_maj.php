<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['date'], $_POST['description_maj'], $_POST['platform'])) {
        $pdo = new PDO('mysql:host=localhost;dbname=gest-corp', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $date = $_POST['date'];
        $description_maj = $_POST['description_maj'];
        $platform = $_POST['platform'];
        
        $stmt = $pdo->prepare("INSERT INTO updates (date, description, platform) VALUES (:date, :description, :platform)");
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':description', $description_maj);
        $stmt->bindParam(':platform', $platform);
        
        if ($stmt->execute()) {
            echo "Mise à jour ajoutée avec succès.";
        } else {
            echo "Erreur lors de l'insertion de la mise à jour.";
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>
