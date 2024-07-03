<?php 

$pdo = new PDO('mysql:host=localhost;dbname=gest-corp', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>