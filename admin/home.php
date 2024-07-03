<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Actualité ou une Mise à Jour</title>
    <style>
        /* CSS pour le style de base */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .form-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }
        .form-container label,
        .form-container input,
        .form-container textarea,
        .form-container select {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        .form-container label {
            font-weight: bold;
        }
        .form-container input[type="submit"],
        .form-container button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Ajouter une Actualité</h2>
        <form action="ajouter_actualite.php" method="post" enctype="multipart/form-data">
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required>
            
            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="4" required></textarea>
            
            <label for="image">Image :</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            
            <input type="submit" value="Ajouter">
        </form>
    </div>

    <div class="form-container">
        <h2>Ajouter une Mise à Jour</h2>
        <form action="ajouter_maj.php" method="post">
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>
            
            <label for="description">Description :</label>
            <textarea id="description" name="description_maj" rows="4" required></textarea>

            <label for="platform">plateforme :</label>
            <select id="platform" name="platform" required>
                <option value="GEST JSP">GEST JSP</option>
                <option value="GEST SPV">GEST SPV</option>
                <option value="GEST CIS">GEST CIS</option>
                <option value="GEST AMICALE">GEST AMICALE</option>
                <option value="GEST CADET">GEST CADET</option>
                <option value="GEST CAR">GEST CAR</option>
                <option value="GEST ASSOCIATION">GEST ASSOCIATION</option>
            </select>
            
            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>
</html>
