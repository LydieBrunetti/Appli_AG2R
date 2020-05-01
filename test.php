<?php
require "includes/config.php";
$nbTables = 10; //TODO input
$nbUsers = 100;  //TODO relation BD
$nbUsersPerTable = intdiv($nbUsers, $nbTables);
$moduloUsersPerTable = $nbUsers % $nbTables;
$singleUsersArray = array();



/*Check si il y a un reste dans la division*/
if ($moduloUsersPerTable == 0) {

    ;
} /*Si il y a un reste, il faut adapter le nombre de personnes par table*/
else {
    $nbOfSmallTables = $nbTables - $moduloUsersPerTable; //Sert à calculer le nombre de petites tables.
    $nbUsersPerTable += 1; //Equilibre le nombre d'utilisateur par table.
    $nbUsersPerSmallTables = $nbUsersPerTable - 1; //Nombre d'utilisateur par petite table.

    echo "||||" . $nbOfSmallTables . "   " . $nbTables;
}

/*Classe Users*/
class Users
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $numero_telephone;
    private $nom_entreprise;
    private $fonction_entreprise;
    private $photo;
    private $metPeople = array();
    private $singleMetPeopleCount = 0;
    private $status = 0;

    function __construct($id, $nom, $prenom, $email, $password, $numero_telephone, $nom_entreprise, $fonction_entreprise, $photo)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->numero_telephone = $numero_telephone;
        $this->nom_entreprise = $nom_entreprise;
        $this->fonction_entreprise = $fonction_entreprise;
        $this->photo = $photo;
    }

    function getMetPeople() {
        return $this->metPeople;
    }

    function setMetPeople($people)
    {
        $metPeopleCounter = 0;
        foreach ($people as $value) {
            if ($value != $this->getId()) {
                $this->metPeople[$metPeopleCounter] = $value;
                $metPeopleCounter++;
            }
        }
        //TODO int metPeople
    }

    function getId()
    {
        return $this->id;
    }
    function getStatus() {
        return $this->status;
    }
    function setStatus($newStatus)  {
        $this->status = $newStatus;
    }

    function printPhoto()
    {
        echo "<img src='data:image/jpeg;base64, " . base64_encode($this->photo) . "'/>";
    }

}

$usersArray = array();

$selectQuery = "SELECT * FROM users";
$selectResult = mysqli_query($conn, $selectQuery);
while ($selectRow = mysqli_fetch_array($selectResult)) {
    $idUtilisateur = $selectRow[0];
    $nomUtilisateur = $selectRow[1];
    $prenomUtilisateur = $selectRow[2];
    $emailUtilisateur = $selectRow[3];
    $password = $selectRow[4];
    $numeroTel = $selectRow[5];
    $nomEntreprise = $selectRow[6];
    $fonctionEntreprise = $selectRow[7];
    $photo = $selectRow[8];

    $user = new Users($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $emailUtilisateur, $password, $numeroTel, $nomEntreprise, $fonctionEntreprise, $photo);
    array_push($usersArray, $user);
}

/*Truc ag2r*/
$nbOfAg2rPeople = 3;
$counterOfAg2r = $nbOfAg2rPeople + 1;
$secondCounter = 0;


$usersArray[50]->setStatus(1);
$usersArray[67]->setStatus(1);
$usersArray[68]->setStatus(1);
//var_dump($usersArray);
while ($nbOfAg2rPeople > 0) {
    if ($usersArray[$counterOfAg2r]->getStatus() == 1) {
        while ($usersArray[$secondCounter]->getStatus() == 1) {
            $secondCounter++;
        }
        $temp = $usersArray[$counterOfAg2r];
        $usersArray[$counterOfAg2r] = $usersArray[$secondCounter];
        $usersArray[$secondCounter] = $temp;
        $secondCounter = 0;
        $nbOfAg2rPeople--;
    }
    $counterOfAg2r++;
} $nbOfSmallTables = 0;
$nbOfAg2rPeople = 3 - 1;
$counterOfAg2r = $nbOfAg2rPeople;
$secondCounter = $nbOfSmallTables;
/*Place les membres ag2r pour qu'ils soient 1er aux tables (fixes).*/
/*
while ($nbOfAg2rPeople > 0 - 1) {
    if ($moduloUsersPerTable == 0) {
        $nbOfAg2rPeople--;
        $temp = $usersArray[$nbUsersPerTable - $nbOfAg2rPeople];
        $usersArray[$nbUsersPerTable - $nbOfAg2rPeople] = $usersArray[$counterOfAg2r];
        $usersArray[$counterOfAg2r] = $temp;
        $counterOfAg2r = $nbOfAg2rPeople;
        $secondCounter = $nbOfAg2rPeople;
        while ($secondCounter > 0) {
            if ($usersArray[$nbUsersPerTable - $nbOfAg2rPeople]->getStatus() == 1) {
                $counterOfAg2r += $nbUsersPerTable - $nbOfAg2rPeople;
            }
            else {
                $temp = $usersArray[$nbUsersPerTable - $nbOfAg2rPeople];
                $usersArray[$nbUsersPerTable - $nbOfAg2rPeople] = $usersArray[$nbOfAg2rPeople];
                $usersArray[$nbOfAg2rPeople] = $temp;
                $secondCounter--;
                $nbOfAg2rPeople--;
            }
        }
    }
    else {
        if ($nbOfSmallTables < $nbOfAg2rPeople) {
            while ($secondCounter > 0) {
                $temp = $usersArray[$counterOfAg2r + $nbUsersPerSmallTables];
                $usersArray[$counterOfAg2r + $nbUsersPerSmallTables] = $usersArray[$counterOfAg2r];
                $usersArray[$counterOfAg2r] = $temp;
                $nbOfAg2rPeople--;
                $secondCounter = $nbOfAg2rPeople;
            }
            $secondCounter = $nbTables - $nbOfSmallTables;
            while ($secondCounter > 0) {
                $temp = $usersArray[$counterOfAg2r + $nbUsersPerSmallTables + 1];
                $usersArray[$counterOfAg2r + $nbUsersPerSmallTables + 1] = $usersArray[$counterOfAg2r];
                $usersArray[$counterOfAg2r] = $temp;
                $nbOfAg2rPeople--;
                $secondCounter = $nbOfAg2rPeople;
            }
        } else {
            while ($secondCounter > 0) {
                $temp = $usersArray[$counterOfAg2r + $nbUsersPerSmallTables];
                $usersArray[$counterOfAg2r + $nbUsersPerSmallTables] = $usersArray[$counterOfAg2r];
                $usersArray[$counterOfAg2r] = $temp;
                $nbOfAg2rPeople--;
                $secondCounter = $nbOfAg2rPeople;
            }
        }
    }
} */
//var_dump($usersArray);

/*Classe table*/
class Table
{
    public static $numberOfTables = 0;
    private $id;
    private $typeOfTable = 0;
    private $usersId = array();

    function __construct($id)
    {
        static::$numberOfTables++;
        $this->id = $id;

    }

    public function getNbOfTables()
    {
        return static::$numberOfTables;
    }

    public function getUsersId()
    {
        return $this->usersId;
    }

    function setUsersId($users)
    {
        array_push($this->usersId, $users);
    }

    function cleanTable() {
        unset($this->usersId);
    }

    function setTypeOfTable($id)
    {
        $this->typeOfTable = $id;
    }

    public function getId()
    {
        return $this->id;
    }
    function removeUsersFromTable() {
        foreach ($this->usersId as $key => $value) {
            if ($key == 0) {
                continue;
            }
            unset($this->usersId[$key]);
        }
    }
}

$tableArray = array();
$idCounter = 0;
$counterOfSmallTable = 0;
$counterOfBigTable = 0;
$counterOfUsersPerTable = 0;
$counterTotalUsers = 0;
$counterTotalUsersBigTable = 0;

if ($GLOBALS["moduloUsersPerTable"] !== 0) {
    /* Remplis les petites tables */
    while ($counterTotalUsers < $GLOBALS["nbOfSmallTables"] * $GLOBALS["nbUsersPerSmallTables"]) {
        $table = new Table($idCounter);
        while ($counterOfUsersPerTable < $GLOBALS["nbUsersPerSmallTables"]) {
            // echo $counterTotalUsers . "<br>";
            $table->setUsersId($GLOBALS["usersArray"][$counterTotalUsers]);
            $counterOfUsersPerTable++;
            $counterTotalUsers++;
        }
        $counterOfUsersPerTable = 0;
        metPeople($table, $GLOBALS["usersArray"]);
        array_push($tableArray, $table);
        $idCounter++;

    }

    /* Remplis les grandes tables */
    while ($counterTotalUsersBigTable < ($GLOBALS["nbTables"] - $GLOBALS["nbOfSmallTables"]) * $GLOBALS["nbUsersPerSmallTables"] + 1) {
        $table = new Table($idCounter);
        while ($counterOfUsersPerTable < $GLOBALS["nbUsersPerSmallTables"] + 1) {
            // echo $counterTotalUsers . "<br>";
            $table->setUsersId($GLOBALS["usersArray"][$counterTotalUsers]);
            $counterOfUsersPerTable++;
            $counterTotalUsers++;
            $counterTotalUsersBigTable++;
        }
        $counterOfUsersPerTable = 0;
        metPeople($table, $GLOBALS["usersArray"]);
        array_push($tableArray, $table);
        $idCounter++;
    }
    $singleUsersArray = getSingleUsersArray($GLOBALS["usersArray"]);
} else {
    /* Remplis les tables. (Quand il y a un seul type de table) */
    while ($counterTotalUsers < count($GLOBALS["usersArray"])) {
        $table = new Table($idCounter);
        while ($counterOfUsersPerTable < $GLOBALS["nbUsersPerTable"]) {
            //echo $counterTotalUsers . "<br>";
            $table->setUsersId($GLOBALS["usersArray"][$counterTotalUsers]);
            $counterOfUsersPerTable++;
            $counterTotalUsers++;
        }
        $counterOfUsersPerTable = 0;
        metPeople($table, $GLOBALS["usersArray"]);
        array_push($tableArray, $table);
        $idCounter++;
    }
}
//var_dump($usersArray);
var_dump($tableArray);
var_dump(cleanTableArray($tableArray));

/*Crée un tableau par utilisateur des participants déjà rencontrés1*/
function metPeople($table, $usersArray)
{
    $usersId = array();
    $tableArray = $table->getUsersId();
    $tableArrayCounter = 0;
    foreach ($tableArray as $val) {
        $usersId[$tableArrayCounter] = $val->getId();
        $tableArrayCounter++;
    }
    foreach ($usersId as $val) {
        foreach ($usersArray as $sval) {
            if ($sval->getId() == $val) {
                $sval->setMetPeople($usersId);
            }
        }
    }
}

/*Crée un tableau unique de tout les utilisateurs*/
function getSingleUsersArray($usersArray) {
    $singleUsersArray = array();
    $counter = 0;
    foreach ($usersArray as $value) {
        $singleUsersArray[$counter] = $value;
        $counter++;
    }

    return $singleUsersArray;
}
/*Enlève les utilisateurs d'une table à part les premiers*/
function cleanTableArray($tableArray) {
    foreach ($tableArray as $key => $value) {
        $value->removeUsersFromTable();
    }
    return $tableArray;
}

function turnAlgorithm() {
    insertFirstUsersOnTable($GLOBALS["singleUsersArray"]);
}
//var_dump($tableArray);
cleanTableArray($tableArray);
function    insertFirstUsersOnTable($singleUsersArray) {
    //var_dump($singleUsersArray);
    $counterTotalTables = 0;
    $counterUsers = 0;

    if ($GLOBALS["moduloUsersPerTable"] !== 0) {
        while (/*Shuffle*/ $counterTotalTables < $GLOBALS["nbOfSmallTables"]) {
            if ($counterTotalTables < $GLOBALS["nbOfSmallTables"]) {
                while ($counterTotalTables < $GLOBALS["nbOfSmallTables"]) {
                    //var_dump($GLOBALS["tableArray"][$counterTotalTables]);
                    $GLOBALS["tableArray"][$counterTotalTables]->setUsersId($singleUsersArray[$counterUsers]);
                    $counterTotalTables++;
                    $counterUsers++;
                }
            }
        }
    }
}
//var_dump(cleanTableArray($tableArray));
//foreach ($usersArray as $value) {
//    var_dump($value->getMetPeople());
//}
//echo "Hello" . $GLOBALS["nbTables"];
//insertFirstUsersOnTable($singleUsersArray);
//$tableArray = cleanTableArray($tableArray);
//var_dump($tableArray);
//var_dump($singleUsersArray);
//var_dump($usersArray);
//var_dump($tableArray);
//echo Table::$numberOfTables;
//var_dump($nbOfSmallTables);




