<? php
$user = "root";
$pass = ""; 
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=ufr_sds;charset=utf8;','root','');
        
    } catch(Exception $e){
        die('Erreur' .$e->getMessage()); 
    }

    ?>


    

