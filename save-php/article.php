<!DOCTYPE html>
<html>
    <head>
    	<title>article</title>
    	<meta charset= "UTF-8" />
    	<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet" />
		<link href="../css/featherlight.css" rel="stylesheet">


    </head>
    <body>

    	<?php
$id = $_GET["id"];

$db = new PDO('mysql:host=localhost;dbname=lireecrire', 'root', 'root');
    
?>   

<div class="matrice">

	<div class="col-md-10">

    	<?php
    	//faire une requête pour récupérer des éléments de la db
		foreach($db->query("SELECT * FROM article WHERE id='$id'") as $result){
			echo '<div class="col-md-6">';
			echo '<a href="#" data-featherlight="../uploads/';
			echo $result['cover'];
			echo '">';

			echo '<img src="../uploads/';
			echo $result['cover'];
			echo '">';
			echo '</a>';

			if($result['contenu']!=null){
			echo '<a href="../uploads/pdf/'.$result['contenu'].'">';
			echo 'Lien vers le pdf</a>';

			}

			echo '</div>';

			echo '<div class="col-md-6">';
			echo '<h1>'.$result['titre'].'</h1>';
			echo '<h2> dépositaire : <br> '.$result['auteur'].'</h2>';
			echo '<h2> auteur de lextrait : <br>'.$result['auteurlire'].'</h2>';
			echo '<h2> description :</h2> <p>'.$result['description'].'</p>';
			echo '<div class="commentaire">';
			echo '<p> bientôt, vous allez pouvoir déposer vos commentaires ici  </p>';
			echo '</div>';
			echo '</div>';
		}

		?>
	</div>			
		<div class="col-md-2">
			<div id="menu">
				<h1>navigation</h1>
					<div id="sousmenu">
						<h2>flux</h2>
							— <a href="../flux.php">flux</a>
						<h2>dépôt</h2>
							— <a href="../upload.html">formulaire</a><br>
							— <a href="../conditions.html">conditions</a>
						<h2>iceberg</h2>
							— <a href="../documentation.html">documentation</a><br>
							— <a href="../intention.html">intention</a><br>
							— <a href="../colophon.html">colophon</a><br>
							— <a href="../cadrejuridique.html">cadre juridique</a>
							<br>
						</div>
					</div>
					<div id="contact">
					  <h1>contact</h1>
					  	<div id="souscontact">
						 <h2>adressez vos commentaires et remarques à hello@lireecrire.be</h2>
						</div>
					</div>

					<div id="recherche">
					  <h1>recherche</h1>
					  	<div id="sousrecherche">
						 <h2>barre de recherche</h2>
						</div>
					</div>

	</div>


</div> <!-- fermeture de la matrice -->

		
  		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  		<script src="../js/index.js"></script>
  		<script src="../js/featherlight.js"></script>

    </body>
 </html>
