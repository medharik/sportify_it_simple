<?php
include "../models/utils.class.php";
include "../models/abonne.class.php";
Abonne::connecter_db();
$abonnes = Abonne::all();

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
        <h3 class="alert alert-primary text-center">Liste des abonnés </h3>
        <table class="table table-striped" id="matable">
            <thead>
                <tr>
                    <th scope="col">photo</th>
                    <th scope="col">id</th>
                    <th scope="col">Nom / Prenom </th>
                    <th scope="col">cin</th>
                    <th scope="col">profession</th>
                    <th scope="col">date de naissance</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($abonnes as $a) {   ?>
                    <tr>
                        <td> <img src="<?= $a['photo'] ?>" width="150"> </td>
                        <td><?= $a['id'] ?></td>
                        <td>
                            <?php

                            if ($a['sexe'] == 'homme') echo "Mr.";
                            else echo "Mme.";

                            ?>

                            <?= $a['nom'] ?> <?= $a['prenom'] ?></td>
                        <td><?= $a['cin'] ?> </td>
                        <td><?= $a['profession'] ?></td>
                        <td><?= $a['date_naissance'] ?></td>
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