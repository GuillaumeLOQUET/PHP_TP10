<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
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
<div class="container">
    <div class="row">
        <div class="offset-md-2"></div>
        <div class="col-md-8">
            <h1>Modification d'un etudiant</h1>
            <h3>Veuillez modifier les informations</h3>
            <?php
            $dbh = new PDO('pgsql:dbname=etudiants;host=127.0.0.1;port=5432', 'postgres', 'Isen2018');
            $idEtudiant = $_POST['edit'];
            $request = $dbh->query("SELECT * FROM etudiant WHERE id = '$idEtudiant'");

            foreach ($request as $data){
                $nom = $data['nom'];
                $prenom = $data['prenom'];
                $note = $data['note'];
            }

            ?>
            <form action="./controller.php?func=editEtudiant" method="post">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <?php echo "<input type='text' class='form-control' id='nom' name='nom' value='$nom' required>"; ?>

                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <?php echo "<input type='text' class='form-control' id='prenom' name='prenom' value='$prenom' required>"; ?>
                </div>
                <div class="form-group" >
                    <label for="note">Note</label>
                    <?php echo "<input type='text' class='form-control' id='note' name='note' value='$note' required>"; ?>
                </div>
                <?php echo "<button type='submit' name='id' value='$idEtudiant' class='btn btn-primary'>Modifier</button>"; ?>

            </form>
        </div>
        <div class="offset-md-2"></div>
    </div>
</div>
</body>
</html>