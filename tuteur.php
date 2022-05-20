<?php 
$bdd = new PDO('mysql:host=localhost;dbname=ufr_sds;charset=utf8;','root','');
if(isset($_POST['envoyer'])){  
     if(!empty($_POST['nom'])  AND !empty($_POST['prenom'])  AND !empty($_POST['numero'])){
        $nom = ($_POST['nom']);
        $prenom =($_POST['prenom']);
        $numero = ($_POST['numero']);
        $insertUser = $bdd->prepare("INSERT INTO tuteur(nom,prenom,numero) VALUES(?,?,?) ");
        $insertUser->execute(array($nom,$prenom,$numero));

        }
        $recupUser = $bdd->prepare('SELECT * FROM tuteur WHERE nom = ? AND prenom = ? AND numero = ?'); 
        $recupUser->execute(array($nom, $prenom, $numero));

        if($recupUser->rowCount() > 0){
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['numero'] = $numero;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('location:liste.php');
         }
         
        else{   
           
            echo"veuillez remplir tous les champs...";
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
    <title>Tuteur</title>
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
        <div class="container">
            <div class="row">
                <div class="ajouttuteur">
                    <h2><strong> FORMULAIRE D'ENREGISTREMENT TUTEUR</strong></h2>
                </div>

                <div class="ruban"> <img src="./image/Yellow-Ribbon-PNG-Transparent-Image1.png" alt="">
                </div>

                <div class="espace1 ">
                    <div class="mb-3 row">
                        <label for="inputText" class="col-sm-2 col-form-label"> <strong> Nom: </strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="nom">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputText" class="col-sm-2 col-form-label"><strong> Prénom:
                            </strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="prenom">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="inputText" class="col-sm-2 col-form-label"><strong> Numéro de télephone :</strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="numero">
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <input type="submit" name="envoyer" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <footer>
        <div class="container ">
            <div class="row">
                <div class="fin">
                    <img src="./image/arton112289.jpg" width="250px" height="130px">
                </div>
            </div>
        </div>
    </footer>

    <script src="./css/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
</body>

</html>