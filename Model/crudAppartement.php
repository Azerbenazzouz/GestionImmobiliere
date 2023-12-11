<?php 
    require_once "Appartement.php";
    require_once "Config/connection.php";

    class crudAppartement{
        private $connexion;

        public function __construct(){
            $obj = new Connection;
            $this->connexion = $obj->getConnection();
        }

        public function AjouteApp($appartement){
            $ref = $appartement->getReference();
            $prop = $appartement->getProprietaire();
            $loc = $appartement->getLocalite();
            $surf = $appartement->getSurface();
            $nbP = $appartement->getNbPieces();
            $dom = $appartement->getDomaineUsage();
            $surfEspace = $appartement->getSurfaceEspaceCommun();
            $sql = "INSERT INTO appartement 
                    VALUES($ref,'$prop','$loc',$surf,$nbP,'$dom',$surfEspace)";
            $res = $this->connexion->query($sql);
            
            return $res;
        }

        public function RecupererApp($ref){
            $sql = "SELECT * FROM appartement WHERE reference=$ref";
            $res = $this->connexion->query($sql);
            return $res;
        }

        public function SupprimerApp($ref){
            $sql = "DELETE FROM appartement WHERE reference=$ref";
            $res = $this->connexion->exec($sql);
            return $res;
        }

        public function ModifierApp($appartement){
            $ref = $appartement->getReference();
            $prop = $appartement->getProprietaire();
            $loc = $appartement->getLocalite();
            $surf = $appartement->getSurface();
            $nbP = $appartement->getNbPieces();
            $dom = $appartement->getDomaineUsage();
            $surfEspace = $appartement->getSurfaceEspaceCommun();
            echo $ref, $prop, $loc, $surf, $nbP, $dom, $surfEspace;
            $sql = "UPDATE appartement 
                    SET proprietaire='$prop', 
                        localite='$loc', 
                        surface=$surf, 
                        NbPieces=$nbP, 
                        DomaineUsage='$dom', 
                        SurfaceEspaceCommun=$surfEspace 
                    WHERE appartement.reference=$ref";
            $res = $this->connexion->exec($sql);
            return $res;
        }
        
        public function ListerApp(){
            $sql = "SELECT * FROM appartement";
            $res = $this->connexion->query($sql);
            return $res;
        }

    }
?>