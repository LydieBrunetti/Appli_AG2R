<?php


$counter = 0;
require('includes/config.php');


while ($counter <= 9)
{
    $userNom = "nom" . $counter;
    $userPrenom = "prenom" . $counter;
    $userEmail = "email" . $counter;
    $userPassword = "password" . $counter;
    $userTel = $counter;
    $userEntName = "ent" . $counter;
    $userEntFnc = "fnc" . $counter;
    $userPicture = 1;

    $qry = "INSERT INTO users(`nom`,`prenom`,`email`,`password`,`numero_telephone`,`nom_entreprise`,`fonction_entreprise`,`photo`) 
            VALUES ('$userNom','$userPrenom','$userEmail','$userPassword',$userTel,'$userEntName','$userEntFnc', $userPicture);";
    mysqli_query($conn,$qry);
    $counter++;

}