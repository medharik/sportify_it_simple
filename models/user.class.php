<?php 
class User extends Utils {
    //POJO : plain old java object
    //datas
public static $TABLE ="users";
private $login; 
private $passe; 
private $nom;
private $email;
private $role;
//constructor 
function __construct(string $passe=null,string $login=null,string $nom=null,string $email=null,string $role="",$remise,string $montant="",$type_paiement=""){
$this->passe=$passe;
$this->login=$login;
$this->nom=$nom;
$this->email=$email;
$this->role=$role;
}

//Methodes  magics :
public function  __get($attribut){
return $this->attribut;
}

//echo $ali->login; => fait appel a getLogin <=> __get($login)
public function  __set($passe_attribut,$value){
 $this->passe_attribut=$value;
}

//methodes
public function ajouter($data){
    Parent::add($data);
}

}


?>