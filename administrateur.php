<?php

$bdd = new PDO('mysql:host=localhost;dbname=ufr_sds;charset=utf8;','root','');
if(isset($_POST['envoyer'])){
    if(!empty($_POST['nom'])  AND !empty($_POST['prenom'])AND !empty($_POST['email'])AND !empty($_POST['password'])){
         $nom = ($_POST['nom']);
         $prenom =($_POST['prenom']);
         $email = ($_POST['email']);
         $password = sha1($_POST['password']);
         $insertUser = $bdd->prepare("INSERT INTO administrateur(nom,prenom,email,password) VALUES(?,?,?,?) " );
         $insertUser->execute(array($nom,$prenom,$email,$password));

        }
        $recupUser = $bdd->prepare('SELECT * FROM administrateur WHERE nom = ? AND prenom = ? AND email = ? AND password = ?');
        $recupUser->execute(array($nom, $prenom, $email, $password));
        
            if($recupUser->rowCount() > 0){
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['password'] = $password;
                $_SESSION['email'] = $recupUser->fetch()['email'];
                header('Location:authentification.php');
            }   
            else{echo"Enregistre avec succes...";
           
        }
        
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./css/acceuil.css">
    <title>administrateur</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="logo col-sm-10">
                    <img src="./image/index3.png" width="400px">
                </div>
                <div class="trai col-sm-10"></div>
            </div>
        </div>
    </header>
    <form method="POST" action="">
        <div class="container ">
            <div class="row">
                <div class="trois">

                    <div class="gestions">
                        <center><h2><strong> ENREGISTREMENT DE L'ADMINISTRATEUR</strong></h2></center>
                    </div>

                    <div class="trai2"></div>

                    <div class="espace2">
                        <div class="mb-3 row">
                            <label for="inputtext" class="col-sm-2 col-form-label"> <strong> Nom </strong></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nom">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputtext" class="col-sm-2 col-form-label"> <strong> Prenom </strong></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="prenom">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputtext" class="col-sm-2 col-form-label"> <strong> Email </strong></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label"><strong> Password 
                                </strong></label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="card-body">
                                <input type="submit" name="envoyer" class="btn btn-primary">
                              
                            </div>
                        </div>
                    </div>
                    <div class="logobas col-sm-10">
                        <img src="./image/index3.png" width="400px">
                    </div>
                    <div class="trai3"></div>
                </div>
            </div>
        </div>
    </form>

    <script src="./css/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
</body>

</html>