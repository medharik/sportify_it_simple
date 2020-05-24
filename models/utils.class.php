<?php

class Utils
{
    // connection 
    public static  $_CNX = NULL; // attribut de la classe 
    const TVA = 20;
    public static  $TABLE;
    public    static function connecter_db()
    {
        try {
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            // creation d'un singleton pattern
            if (!self::$_CNX) {
                self::$_CNX =  new PDO("mysql:host=localhost;dbname=sportify_db_2020;port=3306;charset=utf8", "root", "", $options);
            }
            return self::$_CNX;
        } catch (PDOException $e) {
            die("erreur de connexion a la base de donnees " . $e->getMessage());
        }
    }

    //delete 
    public static  function delete($id)
    {
        try {

            $rp = self::$_CNX->prepare("delete from " . static::$TABLE . " where id=?");
            $rp->execute([$id]);
        } catch (PDOException $e) {
            die('erreur de suppression  de  ' . static::$TABLE . ' dans  la base de donnees ' . $e->getMessage());
        }
    }

    //all

    public static function all()
    {
        try {

            $rp = self::$_CNX->prepare("select * from " . static::$TABLE . " order by id  desc");
            $rp->execute();
            $resultat =  $rp->fetchAll();

            return $resultat;
        } catch (PDOException $e) {
            die("erreur de  recuperation des " . static::$TABLE . " dans  la base de donnees " . $e->getMessage());
        }
    }
    // find by id
    public static function find($id)
    {
        try {
            $rp = self::$_CNX->prepare("select * from " . static::$TABLE . " where id=?");
            $rp->execute([$id]);
            $resultat =  $rp->fetch();

            return $resultat;
        } catch (PDOException $e) {
            die("erreur de  recuperation des " . static::$TABLE . "  d'id =$id dans  la base de donnees " . $e->getMessage());
        }
    }

    //findBy
    // findBy("prix>2000")
    public static function findBy($condition)
    {
        try {
            $rp = self::$_CNX->prepare("select * from " . static::$TABLE . " where $condition order by id  desc");
            $rp->execute();
            $resultat =  $rp->fetchAll();

            return $resultat;
        } catch (PDOException $e) {
            die("erreur de  recuperation des " . static::$TABLE . " dans  la base de donnees " . $e->getMessage());
        }
    }
    //add
    // add("hp",9000);
    public static  function add(array $data)
    {
        try {
            $str_keys = join(",", array_keys($data));
            $in = function ($v) {
                return "?";
            };

            $inter = join(",", array_map($in, $data));

            $rp = self::$_CNX->prepare("insert into " . static::$TABLE . " ($str_keys) values ($inter)");
            echo "insert into " . static::$TABLE . " ($str_keys) values ($inter)";
            $rp->execute(array_values($data));
        } catch (PDOException $e) {
            die('erreur d\'ajout  de  ' . static::$TABLE . ' dans  la base de donnees ' . $e->getMessage());
        }
    }


    // update
    // $produit=['libelle'=>'dell d9','prix'=>9000], id=1;
    // update produit set libelle=? , prix=? where id=?
    //execute([])

    public static  function update(array $data, int $id)
    {
        try {

            $str_keys = join(",", array_keys($data));
            $in = function ($v) {
                return "$v=?";
            };
            $keys = array_keys($data); //['libelle','prix'] =>['libelle=?','prix=?']
            // var_dump($keys);
            $tab_intro = array_map($in, $keys);
            // print_r($tab_intro);
            //['libelle=?','prix=?'] => libelle=? , prix=?
            $sets = join(",", $tab_intro);

            $inter = join(",", array_map($in, $data));
            $data['id'] = $id;
            $rp = self::$_CNX->prepare(" update  " . static::$TABLE . " set $sets   where id=?");
            $rp->execute(array_values($data));
        } catch (PDOException $e) {
            die('erreur de modification   de  ' . static::$TABLE . ' dans  la base de donnees ' . $e->getMessage());
        }
    }
    //$infos = $_FILES['photo'] tmp_name, name, size, error, type
    public static function uploader(array $infos, $dossier = "images")
    {
        if (!is_dir($dossier)) {
            mkdir($dossier, 777, true);
        }
        $original_client_name = $infos['name'];
        $tmp = $infos['tmp_name'];
        $path_parts = pathinfo($original_client_name);
        $ext = strtolower($path_parts['extension']);
        $new_name = md5(time() . rand(0, 99999)) . ".$ext";
        $chemin = "$dossier/$new_name";
        $autorise = ['png', 'jpeg', 'gif', 'webp', 'jpg', 'pdf'];
        if (!in_array($ext, $autorise)) {
            die("ce type de fichier n'est pas autorisé");
        } else if ($infos['size'] > 8 * 1024 * 1024) {
            die("la taille de ce fichier depasse 8Mo");
        } else if (!move_uploaded_file($tmp, $chemin)) {
            die("une erreur est survenue lors de l'upload di fichier");
        } else {
            return $chemin;
        }
    }
}
