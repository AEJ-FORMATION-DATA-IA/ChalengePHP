<?php
    include 'include/head.php';

    if(!empty($_POST)){
	
		$errors = null;
		$nom = htmlspecialchars($_POST['nom']);
		$prenoms = htmlspecialchars($_POST['prenoms']);
		$password = htmlspecialchars($_POST['password1']);

		if (empty(trim($nom))){
			$errors = "vous devez remplir tous les champs !";
		}

		if (empty(trim($prenoms))){
			$errors = "vous devez remplir tous les champs !";
		}

        $password1 = sha1($_POST['password1']);
		// fin de verification des champs

		//Insertion dans la base de donné
		if (empty($errors)) {
			$requete = $pdo->prepare("INSERT INTO users SET 
				nom = ?,
				prenoms = ?,
				grade = ?,
				email = ?,
				password1 = ?;");

		// envoie des données du formulaire a la base de donnée (dans l'ordre)
			$requete->execute([
				$_POST['nom'], 
				$_POST['prenoms'], 
				$_POST['role'],
				$_POST['email'],
				$password1
			]);
            if ($_POST['role']) {
                header('Location: connexion.php');
            }
            else {
                header('Location: connexion.php');
            }
		}
	} 
?>
<title><?= ucfirst($page)?> - Accueil</title>
<body>
    <div class="container">
        <form method="post">
            
            <div class="form-row">
                <div class="form-group col-md-6 mb-3">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" class="form-control" placeholder="Entrez votre prenoms" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="prenoms">Prenoms:</label>
                    <input type="text" class="form-control" name="prenoms" placeholder="Entrez votre prenoms" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 mb-3">
                    <label for="role">Rôle:</label>
                    <select class="form-select" name="role">
                        <option selected>Veuillez selectionner votre rôle</option>
                        <option value="client">Clients</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6 mb-3">
                    <label for="Mot de pass1">Mot de pass</label>
                    <input type="password" name="password1" class="form-control" id="password1" placeholder="Mot de pass" required>
                </div>
                
                <div class="form-group col-md-6 mb-3">
                    <label for="Mot de pass2">Password</label>
                    <input type="password" name="password2" class="form-control" id="password2" placeholder="Mot de pass" required>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
            vous avez deja un compte ? <a href="connexion.php">Cliquez ici</a>
        </form> 
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        oninput='password2.setCustomValidity(password2.value != password1.value ? "Pas de correspondance entre les deux mot de pass." : "")'
    </script>
</body>
</html>