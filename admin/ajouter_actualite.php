<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['titre'], $_POST['description'], $_FILES['image'])) {

        require_once('./../assets/conn.php');

        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $image_name = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
        if (!in_array($image_type, $allowed_types)) {
            die("Erreur : Seules les images JPEG, PNG et GIF sont autorisées.");
        }
        $img_info = getimagesize($image_temp);
        $img_width = $img_info[0];
        $img_height = $img_info[1];
        $target_ratio = 16 / 9;
        $current_ratio = $img_width / $img_height;
        $allowed_diff = 0.5;
        if (abs($current_ratio - $target_ratio) > $allowed_diff) {
            die("Erreur : L'image doit avoir un format 16:9 (ex: 1920x1080, 1280x720).");
        }
        $upload_directory = "./../assets/actus/";
        $target_file = $upload_directory . basename($image_name);
        if (move_uploaded_file($image_temp, $target_file)) {
            $stmt = $pdo->prepare("INSERT INTO actus (titre, description, image) VALUES (:titre, :description, :image)");
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $image_name);
            if ($stmt->execute()) {
                echo "Actualité ajoutée avec succès.";
            } else {
                echo "Erreur lors de l'insertion de l'actualité.";
            }
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>
