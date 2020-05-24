<?php
include "../models/utils.class.php";
include "../models/paiement.class.php";
include "../models/user.class.php";
include "../models/abonne.class.php";
Utils::connecter_db();
$abonnes = Abonne::all();
$users = User::all();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>

    <?php
    include "../_menu.php";
    ?>

    <div class="container border">
        <!-- le titre -->
        <h3 class="alert alert-primary text-center">Liste des abonnés </h3>
        <div class="row">

            <!-- le contenu -->


            <form action="controller.php?action=store" class="form-horizontal" method="post" enctype="multipart/form-data">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Nouveau</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for="user_id">user_id</label>
                        <div class="col-md-12 ">
                            <select name="user_id" id="user_id" class="form-control">
                                <?php
                                foreach ($users as $u) {

                                ?>
                                    <option value="<?= $u['id'] ?>"><?= $u['login'] ?> </option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for="abonne_id">Abonne id</label>
                        <div class="col-md-12 ">
                            <select name="abonne_id" id="abonne_id" class="form-control">
                                <?php
                                foreach ($abonnes as $a) {

                                ?>
                                    <option value="<?= $a['id'] ?>"><?= $a['nom'] ?> <?= $a['prenom'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for="date_de">Date debut : </label>
                        <div class="col-md-12 ">
                            <input id="date_de" name="date_de" type="date" placeholder="" class="form-control input-md">

                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for="date_a">date fin </label>
                        <div class="col-md-12 ">
                            <input id="date_a" name="date_a" type="date" placeholder="" class="form-control input-md">

                        </div>
                    </div>



                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for="tarif_mois">tarif_mois</label>
                        <div class="col-md-12 ">
                            <input id="tarif_mois" name="tarif_mois" min="0" type="number" step="0.01" placeholder="ba010203" class="form-control input-md">
                            <span class="help-block">Note : tarif_mois doit contenir une a deux lettres suivies de 6 chiffres </span>
                        </div>
                    </div>

                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for="type_paiement">type de paiement</label>
                        <div class="col-md-12 ">

                            <label for="cb">Carte bancaire : </label><input type="radio" name="type_paiement" id="cb" value="cb"> <br>
                            <label for="cash">Cash : </label><input type="radio" name="type_paiement" id="cash" value="cash"> <br>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for=""></label>
                        <div class="col-md-12 ">
                            <button id="" name="" class="btn btn-primary">Valider</button>
                        </div>
                    </div>

                </fieldset>




            </form>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>