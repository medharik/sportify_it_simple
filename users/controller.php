<?php
include "../models/utils.class.php";
include "../models/users.class.php";
Abonne::connecter_db();
extract($_GET); //$action, $id : met les data du lien dans des variable ?id=9 => $id=9
extract($_POST); // data du form
switch ($action) {
    case 'store':
        if (!empty($_FILES['photo']['name'])) {
            $chemin = Abonne::uploader($_FILES['photo'], "images");
            $data = $_POST;
            $data['photo'] = $chemin;
            Abonne::add($data);
        }


        break;
    case 'delete':
        Abonne::delete($id);
        break;
    case 'update':

        break;

    default:
        # code...
        break;
}

// r4direction vers la page index
header("location:index.php");
