<?php
require 'include/head.php';
$requete = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$requete-> execute([$_GET['id']]);

$resultatInscrit = $requete->fetch(PDO::FETCH_OBJ);

$id = $resultatInscrit->id;
// verification des champs
if(!empty($_POST)){
    if (isset($_POST['newnom']) && !empty($_POST['newnom']) && $_POST['newnom']) {
        $newnom = trim(htmlspecialchars($_POST['newnom']));
        $insertnom = $pdo->prepare("UPDATE users SET nom = ? WHERE id = ?");
        $insertnom->execute(array($newnom, $id));
        header('Location: admin.php');
        
    }

    if (isset($_POST['newprenoms']) && !empty($_POST['newprenoms']) && $_POST['newprenoms']) {
        $newprenoms = trim(htmlspecialchars($_POST['newprenoms']));
        $insertprenoms = $pdo->prepare("UPDATE users SET prenoms = ? WHERE id = ?");
        $insertprenoms->execute(array($newprenoms, $id));
        header('Location: admin.php');
    }

    if (isset($_POST['newemail']) && !empty($_POST['newemail']) && $_POST['newemail']) {
        $newemail = trim(htmlspecialchars($_POST['newemail']));
        $insertemail = $pdo->prepare("UPDATE users SET email = ? WHERE id = ?");
        $insertemail->execute(array($newemail, $id));
        header('Location: admin.php');
    }

    if (isset($_POST['newrole']) && !empty($_POST['newrole']) && $_POST['newrole']) {
        $newrole = trim(htmlspecialchars($_POST['newrole']));
        $insertgrade = $pdo->prepare("UPDATE users SET grade = ? WHERE id = ?");
        $insertgrade->execute(array($newrole, $id));
        header('Location: admin.php');
    }
}
?>

<body>
<div class="container-fluid">

<div class="container col-10">

        <div class="subhead mt-0 mb-0" style="text-align: center">
            <h3 class="subhead-heading">Modification des informations sur L'inscrit <strong><?= "$resultatInscrit->nom $resultatInscrit->prenoms";?></strong></h3>
        </div>

        <form method="post">

            <div class="form-row">

                <div class="form-group col-md-4 mb-3">
                    <label for="nom">Nom:</label>
                    <input class="form-control" type="text" name="newnom" value="<?= $resultatInscrit->nom?>">
                </div>

                <div class="form-group col-md-4 mb-3">
                    <label for="nom">Prenoms:</label>
                    <input class="form-control" type="text" name="newprenoms" value="<?= $resultatInscrit->prenoms?>">
                </div>

                <div class="form-group col-md-4 mb-3">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" name="newemail" value="<?= $resultatInscrit->email?>">
                </div>

                <div class="form-group col-md-4 mb-3">
                    <label for="niveau">Rôle:</label>
                    <select class="form-control" name="newrole" >
                        <option value="<?= $resultatInscrit->grade?>">Le rôle actuel est: <?= $resultatInscrit->grade?>									
                        </option>
                        <option value="client">Clients</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                
            </div>

            <button type="Button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Enregistrer</button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modification des Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            Êtes-vous sûre des Modification apporter à <?= "$resultatInscrit->nom $resultatInscrit->prenoms";?>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                            <button type="submit" class="btn btn-primary">Oui</button>
                        </div>
                    </div>

                </div>
            </div>

        </form>
</div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>