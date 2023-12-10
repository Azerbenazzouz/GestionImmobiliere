<?php
    class Connection{
        function getConnection(){
            $dsn="mysql:host=localhost;dbname=gestionimmobiliere;charset=utf8";
            $username="root";
            $password="";

            try{
                $connection = new PDO($dsn,$username,$password);
            }catch(Exception $e){
                echo "Erreur de connexion : ".$e->getMessage();
            }
            return $connection;
        }
    }
?>