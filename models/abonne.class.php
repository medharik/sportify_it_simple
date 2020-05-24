<?php
// include("utils.class.php");
class Abonne extends Utils
{
    //POJO : plain old java object
    //datas
    public static $TABLE = "abonnes";
    private $nom;
    private $prenom;
    private $date_naissance;
    private $sexe;
    private $inscrit_le;
    private $photo;
    private $cin;

    //constructor 
    function __construct(string $nom, string $prenom, string $date_naissance, string $sexe = "femme", string $inscrit_le = "", $photo, string $cin = "")
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_naissance = $date_naissance;
        $this->sexe = $sexe;
        if (empty($inscrit_le)) {
            $this->inscrit_le = date('Y-m-d');
        } else {

            $this->inscrit_le = $inscrit_le;
        }
        $this->inscrit_le = $inscrit_le;
        $this->photo = $photo;
        $this->cin = $cin;
    }
    // getters  
    public function nom()
    {
        return $nom;
    }
    //setters 

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }
    //Methodes  magics :
    public function  __get($nom_attribut)
    {
        return $this->nom_attribut;
    }
    public function  __set($nom_attribut, $value)
    {
        $this->nom_attribut = $value;
    }

    //methodes
    public function ajouter()
    {
    }
}
