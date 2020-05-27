<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="viewnewuser.php">Inscription</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="viewlogin.php">Connexion</a>
            </li>

        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="offset-md-2"></div>
        <div class="col-md-8">

            <h1>Bonjour

                <?php
                $dbh = new PDO('pgsql:dbname=etudiants;host=127.0.0.1;port=5432', 'postgres', 'Isen2018');
                $idUtilisateur = $_SESSION['__userSession']['idUser'];

                $request = $dbh->query("SELECT * FROM utilisateur WHERE utilisateur.id = '$idUtilisateur'");

                foreach ($request as $data){
                    echo $data['prenom'] . " " . $data['nom'];
                }

                ?>

            </h1>

            <br />

            <h3>Liste étudiants</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Note</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $request = $dbh->query("SELECT * FROM etudiant WHERE user_id = '$idUtilisateur'");

                foreach ($request as $data){
                    echo "<tr>";
                    echo "<td>".$data['nom']."</td>";
                    echo "<td>".$data['prenom']."</td>";
                    echo "<td>".$data['note']."</td>";
                    echo "<td>";
                    echo "<form action='./view-editetudiant.php' method='post'><button type='submit' name='edit' value='".$data['id']."' class='btn btn-primary'>Modifier</button></form>";
                    echo "</td>";
                    echo "<td>";
                    echo "<form action='./controller.php?func=delEtudiant' method='post'><button type='submit' name='delete' value='".$data['id']."' class='btn btn-primary'>Supprimer</button></form>";
                    echo "</td>";
                    echo "</tr>";
                }

                ?>
                </tbody>
            </table>

            <form action="./view-newetudiant.php" method="post">
                <button type="submit" class="btn btn-primary">Ajout étudiant</button>
            </form>

        </div>
        <div class="offset-md-2"></div>
    </div>
</div>

</body>
</html>
