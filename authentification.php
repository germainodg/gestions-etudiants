<?php
$bdd = new PDO('mysql:host=localhost;dbname=ufr_sds;charset=utf8;','root','');
if(isset($_POST['envoyer'])){
    if(!empty($_POST['email']) AND !empty($_POST['password'])){
         $email = ($_POST['email']);
         $password = sha1($_POST['password']);
         $insertUser = $bdd->prepare("INSERT INTO authenfication(email,password) VALUES(?,?) " );
         $insertUser->execute(array($email,$password));

        }
        $recupUser = $bdd->prepare('SELECT * FROM authenfication WHERE  email = ? AND password = ?');
        $recupUser->execute(array($email,$password));
        
            if($recupUser->rowCount() > 0){
                $_SESSION['password'] = $password;
                $_SESSION['email'] = $recupUser->fetch()['email'];
                header('Location:pageacceuil.php');
             }
           
             else{   
              echo "veuillez compléter tous les champs...";
    
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
    <title>acceuil</title>
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
                       <center> <h2>AUTHENTIFICATION</h2></center>
                    </div>

                    <div class="trai2"></div>

                    <div class="espace2">
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
                                <input type="password" class="form-control" id="inputPassword" name="password">
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