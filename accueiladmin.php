<?php
include_once '_config/config.php';
session_start();
$email1 = $_SESSION['email1'];

include 'include/head.php';
if (isset($email1)){
    
    $requser = $pdo->prepare("SELECT * FROM users WHERE email = ? AND grade = 'admin'");
	$requser->execute(array($email1));
	$userinfo = $requser->fetch();
	$emailE = $userinfo['email'];
  
    $query = "SELECT * FROM users";
    $queryCount = "SELECT COUNT(id) as count FROM users";
  
    $requete = $pdo->prepare($query);
    $requete->execute();
    $inscrits = $requete->fetchAll();
  
  
    $requete1 = $pdo->prepare("SELECT * FROM users");
	$requete1->execute();
	$count = $requete1->rowCount();

    
	$requeteClient = $pdo->prepare("SELECT * FROM users WHERE grade = 'client' ORDER by nom");
	$requeteClient->execute();
	$countClient = $requeteClient->rowCount();
	$Clientpercent=($countClient*100)/$count;
	$Clientpercent=intval($Clientpercent);

    $requeteAdmin = $pdo->prepare("SELECT * FROM users WHERE grade = 'admin' ORDER by nom");
	$requeteAdmin->execute();
	$countAdmin = $requeteAdmin->rowCount();
	$Adminpercent=($countClient*100)/$count;
	$Adminpercent=intval($Adminpercent);

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
                        <a href="#" class="nav-link text-light px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Statistique</span></a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="col py-3">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Nombre d'inscrits: </div>
				    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count; ?></div>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre de client inscrit</div>
				    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countClient; ?> soit  <?= $Clientpercent; ?>%</div>
                </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nombre d'Admin inscrit</div>
				        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countAdmin; ?> soit  <?= $Adminpercent; ?>%</div>
                    </div>
                </div>
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