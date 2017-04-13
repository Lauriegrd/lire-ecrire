<!DOCTYPE html>
<html>
<head>

<title>Test bootstrap</title>
<meta charset= "UTF-8" />
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

</head>
<body>
	<?php
    
	//pour page d'acceuil
    $db = new PDO('mysql:host=localhost;dbname=lireecrire', 'root', 'root');
    ?>
    
		<div class="matrice">


				<div class="col-md-10">
						
   
					         <?php 
							//faire une requête pour récupérer des éléments de la db
    						foreach($db->query('SELECT id,cover,titre,auteur,auteurlire FROM article ORDER BY id DESC') as $result){
    						 echo '<div class="col-md-3">';
					         echo '<img src="./uploads/';
						     echo $result['cover'];
						     echo '">';

							 echo '<p>';
							 echo '<h1>'.$result['titre'].'</h1>';
							 echo '<h2>'.$result['auteur'].'</h2>';
							 echo '<h2>'.$result['auteurlire'].'</h2>';
							 //echo '<a href="article.php';
							 //echo '?id=';
							 //echo $result['id'];
							 //echo '">';
							 echo '<a href="article/';
							 echo $result['id'];
							 echo '">';
							 echo '"go"';
							 echo '</a>';
							 echo '</p>';
							 echo '</div>';
							}
							 
							 ?>

				</div>			
				<div class="col-md-2">
					<div id="menu">
					  <h1>navigation</h1>
					  	<div class="sousmenu">
						  	<h2>flux</h2>
								— <a href="display/flux.html">flux</a>
							<h2>dépôt</h2>
								— <a href="depot/formulaire.html">formulaire</a><br>
								— <a href="depot/conditions.html">conditions</a>
							<h2>iceberg</h2>
								— <a href="iceberg/documentation.html">documentation</a><br>
								— <a href="iceberg/intention.html">intention</a><br>
								— <a href="iceberg/colophon.html">colophon</a><br>
								— <a href="iceberg/cadrejuridique.html">cadre juridique</a>
								<br>
						</div>
					</div>
				</div>


		</div> <!-- fermeture de la matrice -->

		
  		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  		<script src="js/index.js"></script>
</body>
</html>
