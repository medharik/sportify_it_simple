<?php
include "../models/utils.class.php";
include "../models/paiement.class.php";
Paiement::connecter_db();
extract($_GET); //$action, $id : met les data du lien dans des variable ?id=9 => $id=9
extract($_POST); // data du form
switch ($action) {
    case 'store':
        $data = $_POST;
        Paiement::add($data);
        break;
    case 'delete':
        Paiement::delete($id);
        break;
    case 'update':

        break;

    default:
        # code...
        break;
}

// redirection vers la page index
header("location:index.php");
