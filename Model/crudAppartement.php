<?php 
    require_once "Appartement.php";
    require_once "../Config/Connexion.php";

    class crudAppartement{
        private $connexion;

        public function __construct(){
            $this->connexion = Connexion::getConnexion();
        }

        public function AjouteApp($appartement){
            $sql = "INSERT INTO appartement 
                    VALUES($appartement->getReference(),'$appartement->getProprietaire()','$appartement->getLocalite()',$appartement->getSurface(),$appartement->getNbPieces(),'$appartement->getDomaineUsage()')";
            $res = $this->connexion->query($sql);
            return $res->fetch(PDO::FETCH_NUM);
        }

        public function RecupererApp($ref){
            $sql = "SELECT * FROM appartement WHERE reference=$ref";
            $res = $this->connexion->query($sql);
            return $res->fetch(PDO::FETCH_NUM);
        }

        public function SupprimerApp($ref){
            $sql = "DELETE FROM appartement WHERE reference=$ref";
            $res = $this->connexion->exec($sql);
            return $res->fetch(PDO::FETCH_NUM);
        }

        public function ModifierApp($appartement){
            $sql = "UPDATE appartement SET proprietaire=$appartement->getProprietaire(),localite=$appartement->getLocalite(),surface=$appartement->getSurface(),nbPieces=$appartement->getNbPieces(),domaineUsage=$appartement->getDomaineUsage() WHERE reference=$appartement->getReference()";
            $res = $this->connexion->exec($sql);
            return $res->fetch(PDO::FETCH_NUM);
        }
        
        public function ListerApp(){
            $sql = "SELECT * FROM appartement";
            $res = $this->connexion->query($sql);
            return $res->fetch(PDO::FETCH_NUM);
        }

    }
?>