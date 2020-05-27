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
            <h1>INSCRIPTION</h1>
            <h3>Veuillez entrer vos information</h3>
            <form action="controller.php?func=addUser" method="post">
                <div class="form-group" >
                    <label for="login">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="login" name="login" >
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="text" class="form-control" id="password" name="password" >
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" >
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" >
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" >
                </div>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
        <div class="offset-md-2"></div>
    </div>
</div>
</body>
</html>