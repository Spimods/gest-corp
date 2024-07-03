<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        require_once('./../asset/conn.php');
        
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE (username = :username)");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: home.php");
                exit();
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Utilisateur non trouvé.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>
