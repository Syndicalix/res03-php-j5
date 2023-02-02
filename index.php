<?php

require'./User.php';

$host = "db.3wa.io";
$port = "3306";
$dbname = "sebastienspeich_phpj5";
$connexionString = "mysql:host=$host;port=$port;dbname=$dbname";

$user = "sebastienspeich";
$password = "78e591a8c7d3161b1f57097e0e688eba";

$db = new PDO(
    $connexionString,
    $user,
    $password
);

$tabuser = [
    "firstName" => "Clark",
    "lastName" => "Kent",
    "email" => "clark.kent@test.fr"
];

echo $tabuser["firstName"];

$clark = new User($tabuser["firstName"], $tabuser["lastName"], $tabuser["email"]);

var_dump($clark);

$query = $db->prepare('SELECT * FROM users LIMIT 1');

$query ->execute();

$user = $query->fetch(PDO::FETCH_ASSOC);

var_dump($user);



$newUser = new User($user["first_name"],$user["last_name"],$user["email"]);

$newUser-> setId($user["id"]);

var_dump ($newUser);

?>