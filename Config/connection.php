<?php
    class connection{
        function getConnection(){
            $dsn="mysql:host=localhost;dbname=GestionImmobiliere;charset=utf8";
            $username="root";
            $password="";

            try{
                $connection = new PDO($dsn,$username,$password);
            }catch(PDOException $e){
                echo "Erreur de connexion : ".$e->getMessage();
            }

            return $connection;
        }
    }
?>