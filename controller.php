<?php
session_start();
function addUser(){

    $dbh = new PDO('pgsql:dbname=etudiants;host=127.0.0.1;port=5432', 'postgres', 'Isen2018');

    $rqst1 = $dbh->query('SELECT id FROM utilisateur');
    $idMax = -1 ;
    foreach ($rqst1 as $data){
        if($data['id'] > $idMax){
            $idMax = $data['id'];
        }
    }

    $insertRequest = $dbh->prepare("insert into utilisateur (id, login, password, mail, nom, prenom) values (?,?,?,?,?,?);");

    $insertRequest->execute([$idMax+1, $_POST['login'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['email'], $_POST['nom'], $_POST['prenom']]);
    header('Location: ./index.php');
}


function addEtu()
{
    $dbh = new PDO('pgsql:dbname=etudiants;host=127.0.0.1;port=5432', 'postgres', 'Isen2018');

    $rqst1 = $dbh->query('SELECT id FROM etudiant');
    $idMax = -1 ;
    foreach ($rqst1 as $data){
        if($data['id'] > $idMax){
            $idMax = $data['id'];
        }
    }
    $idUtilisateur = $_SESSION['__userSession']['idUser'];

    $insertRequest = $dbh->prepare("insert into etudiant (id, user_id, nom, prenom, note) values (?,?,?,?,?);");

    $insertRequest->execute([$idMax+1, $idUtilisateur, $_POST['nom'], $_POST['prenom'], $_POST['note']]);
    header('Location: ./viewadmin.php');
}

function login()
{
    $dbh = new PDO('pgsql:dbname=etudiants;host=127.0.0.1;port=5432', 'postgres', 'Isen2018');

    $login = $_POST['login'];
    $password = $_POST['password'];

    $request = $dbh->query("SELECT * FROM utilisateur WHERE utilisateur.login = '$login'");

    $utilisateurExistant = false;

    foreach ($request as $data) {
        if (password_verify($password, $data['password'])) {
            $utilisateurExistant = true;
            $idUtilisateur = $data['id'];
        }
    }
    if ($utilisateurExistant) {

        $arraySession = array(
            "idUser" => $idUtilisateur
        );

        $_SESSION['__userSession'] = $arraySession;

        header('Location: ./viewadmin.php');
    } else
        header('Location: ./viewlogin.php?error=true');

}

function editEtu()
{
    $dbh = new PDO('pgsql:dbname=etudiants;host=127.0.0.1;port=5432', 'postgres', 'Isen2018');


    $request = $dbh->prepare("UPDATE etudiant SET nom = ?, prenom = ?, note = ? WHERE id = ?");
    $request->execute(array($_POST['nom'], $_POST['prenom'], $_POST['note'], $_POST['id']));
    header('Location: ./viewadmin.php');
}

function delEtu()
{
    $dbh = new PDO('pgsql:dbname=etudiants;host=127.0.0.1;port=5432', 'postgres', 'Isen2018');
    $idDelete = $_POST['delete'];
    $dbh->query("DELETE FROM etudiant WHERE id = '$idDelete';");
    header('Location: ./viewadmin.php');
}

if ($_GET['func'] == 'addUser') {
    addUser();
}
if ($_GET['func'] == 'addEtudiant') {
    addEtu();
}
if ($_GET['func'] == 'login') {
    login();
}
if ($_GET['func'] == 'editEtudiant') {
    editEtu();
}
if ($_GET['func'] == 'delEtudiant') {
    delEtu();
}


