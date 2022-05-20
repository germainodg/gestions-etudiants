<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./css/acceuil.css">
    <title>Liste</title>
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

  <form action="">
        <div class="container">
            <div class="etudiant">
                <h2><strong> LISTE DES ETUDIANTS</strong></h2>
            </div>

            <div class="ruban"> <img src="./image/Yellow-Ribbon-PNG-Transparent-Image1.png" alt="">
            </div>
            <?php
            $bd = new PDO("mysql:host=localhost;dbname=ufr_sds", "root", "");
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $requete    ='SELECT * FROM etudiant  ORDER BY tuteur ASC';
            $result = $bd->query($requete);

            if (!$result) {
              echo "la recuperation a echoue";
          } else {
              $nombre_etudiant = $result->rowCount();
            }
            ?>
            <h3>tous nos etudiant</h3>
            <h4> il y a <?php=$nombre_etudiant?></h4>
          <table class="table grand">
            <thead>
              <tr>
                
                <th class="bien col-2">Nom</th>
                <th class="bien col-2">Prénom(s) </th>
                <th class="bien col-2"> Date de <br> naissance </th>
                <th class="bien col-2">Numéro <br> de téléphone</th>
                <th class="bien col-2">Email</th>
                <th class="bien col-3">Tuteur</th>
              </tr>
            </thead>

            <tbody>
            <?php
                    while ($ligne = $result->fetch(PDO::FETCH_NUM)) {
                      echo"<tr>";
                      foreach ($ligne as $valeur) {   
                        echo"<td> $valeur</td>";
                      }
                      echo"</tr>";
                    }
                  ?>
        
            </tbody>
          </table>
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


</body>
</html>