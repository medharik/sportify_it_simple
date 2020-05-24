<?php
include "../models/utils.class.php";
include "../models/paiement.class.php";
include "../models/abonne.class.php";
include "../models/user.class.php";
Paiement::connecter_db();
$paiements = Paiement::all();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>

    <?php
    include "../_menu.php";
    ?>

    <div class="container border">
        <!-- le titre -->
        <h3 class="alert alert-primary text-center">Liste des paiements </h3>
        <table class="table table-striped" id="matable">
            <thead>
                <tr>
                    <th>id</th>
                    <th scope="col">Abonne id</th>
                    <th scope="col">user id</th>
                    <th scope="col">debut </th>
                    <th scope="col">fin</th>
                    <th scope="col">montant</th>
                    <th>Le</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paiements as $a) {   ?>
                    <tr>
                        <td><?= $a['id'] ?></td>
                        <td> <?php
                                $abonne =    Abonne::find($a['abonne_id']);
                                echo $abonne['nom'] . ' ' . $abonne['prenom'];
                                ?> </td>
                        <td> <?php

                                $user = User::find($a['user_id']);
                                echo $user['login'];
                                ?> </td>
                        <td>
                            <?= $a['date_de'] ?> </td>
                        <td><?= $a['date_a'] ?> </td>
                        <td><?= $a['tarif_mois'] * 1 ?></td>
                        <td><?= $a['created_at']  ?></td>
                        <td>

                            <a onclick="return confirm ('supprimer?')" href="controller.php?action=delete&id= <?= $a['id'] ?>" class="btn btn-sm btn-danger">S</a>
                            <a href="edit.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-warning">M</a>
                            <a href="show.php?id= <?= $a['id'] ?>" class="btn btn-sm btn-info">C</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#matable').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
                }
            });
        });
    </script>
</body>

</html>