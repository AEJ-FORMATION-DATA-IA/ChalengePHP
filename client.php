<?php
include_once '_config/config.php';
session_start();
$email1 = $_SESSION['email1'];

if (isset($email1)){
  
    $requser = $pdo->prepare("SELECT * FROM users WHERE email = ?");
	$requser->execute(array($email1));
	$userinfo = $requser->fetch();
	$emailE = $userinfo['email'];

  ?>
<title><?= ucfirst($page)?> - Client</title>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Maquette</title>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <div class="collapse navbar-collapse menu d-flex">
          <a class="navbar-brand rounded-circle logo" href="#" >B</a>
          <ul class="navbar-nav me-auto my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Restaurants</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="semi-circle">
      <img src="assets/img/burger.png" alt="" class="burger">
    </div>
    
    <div class="bouton">
      <button class="btn text-light me-2" type="submit" style="color: green; font-size: 20px"><?= $userinfo['nom'] ?> <?= $userinfo['prenoms'] ?></button>
      <button class="btn btn-danger text-light" type="submit" style="font-size: 20px"><a class="nav-link text-light" href="deconnexion.php"> Deconnexion</a></button>
    </div> <br><br>

    <div class="texte">
      <h1>Burger Brother</h1>
      <p> The Burgers brothers were created accordind to a secret recipe that gives them the greatest pleasure while tasting it</p>
      <p>Due to the panic you can book an online visit to our restaurant branches</p>

      <h6>or order by delivery</h6>
      <br><br><br>
      <button class="btn" style="background-color: #FF7C39; color: white;">Order now</button>
    </div>
    <br><br>
    <p>Book a visit</p><br>

    <div class="d-flex boite bg-light shadow mb-5" >
      
      <div class="text-center m-2 p-2 petite-boite" style="border-radius: 5px; background: #F6EBB1;">
        <h4>Restaurants</h4>
        <p>Clik and see <br> locations</p>
      </div>

      <div class="text-center m-2 p-2 petite-boite" style="border-radius: 5px; background: #CDF6AF">
        <h4>Calendar</h4>
        <p>Clik and see <br> times</p>
      </div>

      <div class="text-center p-5">
        <form>
          <label>Phone number</label><br>
          <input type="text" placeholder="+995 512 345 678">
        </form>
      </div>
      <div class="pt-5 w-100">
        <button class="btn text-center" style="background-color: #FF7C39;">Book a visit</button>
      </div>
    </div>

    <div class="text-center" style="position: relative; bottom: -45px;left:70%; width: 25%" >
      <button class="btn btn-outline text-light" type="submit">Facebook</button>
      <button class="btn btn-outline text-light" type="submit">Instagram</button>
      <button class="btn btn-outline text-light" type="submit">Twitter</button>
    </div>
</div>

    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php }
else{
  echo "qui est tu?";
} ?>