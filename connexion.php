<?php include 'include/head.php'; 

if (!empty($_COOKIE['inscrit'])) {
	$email1 = $_COOKIE['inscrit'];
}

if (!empty($_POST)) {

	$email1 = htmlspecialchars($_POST['email1']);
	$password = sha1($_POST['password2']);

	if (!empty($email1) && !empty($password)) {
		$requser = $pdo->prepare("SELECT * FROM users WHERE email = ? && password1 = ?");
		$requser->execute(array($email1,$password ));
		$userexist = $requser->rowCount();

		if ($userexist == 1) {
			session_start();
			$_SESSION['inscritConnecte'] = 1;

			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['email1'] = $userinfo['email'];
			$_SESSION['password'] = $userinfo['password1'];

			$cookie = setcookie('inscrit', $_POST['email1']);

            if ($userinfo['grade'] == "client") {
				require '_functions/auth.php';
	            if (inscritConnecte()) {
					header("Location: client.php");
					exit();
				}
			}

			if ($userinfo['grade'] == "admin") {
				require '_functions/auth.php';
				if (inscritConnecte()) {
					header("Location: admin.php");
					exit();
				}
			}
		}
		else{
			$erreur = "votre email ou le mot de passe est incorrect";
		}
	}
	else{
		$erreur = "Tous les champs doivent etre remplis";
	}
}
?>

<?php 
if (isset($erreur)):?>
	<div class="alert alert-danger"><?= "$erreur"; ?></div>
<?php endif; ?>

<body>
    <div class="container">
        <form method="post" class="">
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email1" name="email1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Nous ne partageons vos informations avec personnes.</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de pass:</label>
                <input type="password" class="form-control" name="password2" id="password2">
            </div>
            <button type="submit" class="btn btn-success">Connexion</button>
        </form>
    </div>
</body>
</html>