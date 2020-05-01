<?php
require( __DIR__ . '/config.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mot_de_passe = $_POST['password'];
$tel = $_POST['tel'];
$nom_entreprise = $_POST['nom_entreprise'];
$secteur = $_POST['secteur'];
$fonction_entreprise = $_POST['fonction_entreprise'];
$client = $_POST['client'];

if ($_FILES['photo']['name'] !== '')
    $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
else
    $photo = '';


if ($photo === '')
    $sql = "INSERT INTO users(nom, prenom, email, password, numero_telephone, nom_entreprise, secteur, fonction_entreprise, photo, deja_client) 
                    VALUES ('$nom', '$prenom', '$email','$mot_de_passe', '$tel', '$nom_entreprise', '$secteur', '$fonction_entreprise', 1, '$client')";
else
    $sql = "INSERT INTO users(nom, prenom, email, password, numero_telephone, nom_entreprise, secteur, fonction_entreprise, photo, deja_client) 
                    VALUES ('$nom', '$prenom', '$email','$mot_de_passe', '$tel', '$nom_entreprise', '$secteur', '$fonction_entreprise' , '$photo', '$client')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
// setcookie("user_register_succesfull",true, time() + 1, "/");
header('Location: ../index.php');
?>

<!--$mot_de_passe_secure = password_hash($mot_de_passe, PASSWORD_ARGON2I); 
INSERT INTO first_table_name [(column1, column2, ... columnN)] 
   SELECT column1, column2, ...columnN 
   FROM second_table_name
   [WHERE condition];
-->