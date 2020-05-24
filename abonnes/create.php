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
                        <label class="col-md-12  control-label" for="nom">Nom</label>
                        <div class="col-md-12 ">
                            <input id="nom" name="nom" type="text" placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for="prenom">Prénom</label>
                        <div class="col-md-12 ">
                            <input id="prenom" name="prenom" type="text" placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for="date_naissance">Date de naissance</label>
                        <div class="col-md-12 ">
                            <input id="date_naissance" name="date_naissance" type="date" placeholder="" class="form-control input-md">

                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for="profession">Profession</label>
                        <div class="col-md-12 ">
                            <input id="profession" name="profession" type="text" placeholder="" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Multiple Radios -->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for="sexe">Sexe</label>
                        <div class="col-md-12 ">
                            <div class="radio">
                                <label for="sexe-0">
                                    <input type="radio" name="sexe" id="sexe-0" value="homme" checked="checked">
                                    Homme
                                </label>
                            </div>
                            <div class="radio">
                                <label for="sexe-1">
                                    <input type="radio" name="sexe" id="sexe-1" value="femme">
                                    Femme
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for="cin">Cin</label>
                        <div class="col-md-12 ">
                            <input pattern="[a-zA-Z]{1,2}[0-9]{6}" id="cin" name="cin" type="text" placeholder="ba010203" class="form-control input-md">
                            <span class="help-block">Note : cin doit contenir une a deux lettres suivies de 6 chiffres </span>
                        </div>
                    </div>

                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-12  control-label" for="photo">Photo</label>
                        <div class="col-md-12 ">
                            <input id="photo" name="photo" class="input-file" type="file" required>
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