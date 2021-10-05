<?php
include_once '_config/config.php';
session_start();
$email1 = $_SESSION['email1'];

if (isset($email1)){
    
    $requser = $pdo->prepare("SELECT * FROM users WHERE email = ? AND grade = 'admin'");
	$requser->execute(array($email1));
	$userinfo = $requser->fetch();
	$emailE = $userinfo['email'];
    
    include 'include/head.php';
        $requete = $pdo->prepare("SELECT * FROM users ORDER BY nom");
        $requete->execute();
        $inscrits = $requete->fetchAll();

?>
<title><?= ucfirst($page)?> - Admin</title>
<body>

<div class="container-fluid">
    <div>
        <p class="text-danger text-center" style="font-size: 25px;font-weight:700 ">Bienvenue Mr <?= $userinfo['nom'] ?> <?= $userinfo['prenoms'] ?></p>
    </div>
    <div class="row flex-nowrap">
        <div class="col-auto col-md-4 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white"> <br>
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Administration</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Accueil</span>
                        </a>
                    </li>
                    <li>
                        <a href="accueiladmin.php" class="nav-link text-light px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Statistique</span></a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="col py-3">
            <div class="card-header">	
                    <div>
                        <h3 style="text-align: center">Liste des Inscrits</h3>
                    </div>
                </div><!--  .card-header -->

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenoms</th>
                                <th scope="col">Rôle</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mot de pass</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody class="text-center">
                            <?php foreach ($inscrits as $inscrit): ?>
                                <tr>
                                    <th><?= $inscrit['nom']; ?></th>
                                    <th><?= $inscrit['prenoms']; ?></th>
                                    <th><?= $inscrit['grade']; ?></th>
                                    <th><?= $inscrit['email']; ?></th>
                                    <th><?= $inscrit['password1']; ?></th>
                                    <th>
                                        <div class="text-right">
                                            <button class="btn btn-primary"><a class="text-light" href="update.php?id=<?= $inscrit['id']; ?>">Modifier</a></button>/
                                            <button class="btn btn-danger"><a class="text-light" href="delete.php?id=<?= $inscrit['id']; ?>">Supprimer</a></button>
                                        </div>
                                    </th>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
					</table>
				</div>

			</div>
            
        </div>
    </div>
</div>
    
</body>
</html>
<?php }
else{
  echo "qui est tu?";
} ?>