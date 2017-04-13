<?php
$id = $_GET["id"];

$db = new PDO('mysql:host=localhost;dbname=lireecrire', 'root', 'root');
    
?>   
<!DOCTYPE html>
<html>
    <head>
    	<title>article</title>
    	<meta charset= "UTF-8" />
		<link href="css/style.css" rel="stylesheet" />
    </head>
    <body>
    	<h1>Ceci est l'article!</h1>
    	<?php
    	//faire une requête pour récupérer des éléments de la db
		foreach($db->query("SELECT * FROM article WHERE id='$id'") as $result){
			echo '<img src="../uploads/';
			echo $result['cover'];
			echo '">';

			echo '<h1>'.$result['titre'].'</h1>';
			echo '<h2>'.$result['auteur'].'</h2>';
			echo '<h2>'.$result['auteurlire'].'</h2>';

			if($result['contenu']!=null){
				echo '<a href="../uploads/pdf/'.$result['contenu'].'">';
				echo 'Lien vers le pdf</a>';
			}
		}

		?>

				<br>
    			<a href="./lecture.html">aller à la zone lecture</a>
    </body>
 </html>
