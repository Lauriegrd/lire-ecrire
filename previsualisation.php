 <?php

/**
  * Shortcut to username and password
*/
$titre = $_POST['titre'];
$description = $_POST['description'];
$auteur = $_POST['auteur'];
$auteurlire = $_POST['auteurlire'];


///////////COVER : //////////////////

if(isset($_FILES['cover']['name']))  {
// on récupère les infos du fichier à uploader
    $fichier_temp = $_FILES['cover']['tmp_name'];
    $fichier_nom = $_FILES['cover']['name'];
 
// on défini les dimensions et le type du fichier
    list($fichier_larg, $fichier_haut, $fichier_type, $fichier_attr) = getimagesize($fichier_temp);
 
// infos de contrôle du fichier
    $fichier_poids_max = 500000;
    $fichier_h_max = 2448;
    $fichier_l_max = 3264;
    
 
// dossier de destination
 $fichier_dossier = 'uploads/' ; //. basename($_FILES['cover']['name'])); echo "L'envoi a bien été effectué !";
 
// extension du fichier
    $fichier_ext = substr($fichier_nom, strrpos($fichier_nom, '.') + 1);
 
// on renomme le fichier
    $fichier_date = date("ymdhis");
    $fichier_n_nom = $fichier_date . "." . $fichier_ext;
 
// on vérifie s'il y a bien un fichier à uploader
    if (isset($fichier_temp) && is_uploaded_file($fichier_temp)) {
// on vérifie le poids du fichier
    if (filesize($fichier_temp) < $fichier_poids_max) {
// types de fichiers autorises 1=gif / 2=jpg / 3=png
        if (($fichier_type === 1) || ($fichier_type === 2) || ($fichier_type === 3)) {
// on vérifie si l'image n'est pas trop grande
        if (($fichier_larg <= $fichier_l_max) && ($fichier_haut <= $fichier_h_max)) {
// si le fichier est ok, on l'upload sur le serveur
            if (move_uploaded_file($_FILES['cover']['tmp_name'], $fichier_dossier . $fichier_n_nom)) {
            echo "Le fichier a été uploadé avec succès<br /><br />";
            echo '<a href="' .$fichier_dossier. $fichier_n_nom . '"><img src="'  .$fichier_dossier. $fichier_n_nom . '"></a><br />';
            echo $_FILES['cover']['tmp_name'];
            
            }
            else
            echo "Le fichier n'a pas pu être uploadé<br />";
        }
        else
            echo "Le fichier est trop grand<br />";
        }
        else
        echo "Le fichier n'a pas le bon format<br />";
    }
    else
        echo "Le fichier est trop lourd<br />";
    }
    else
    echo "Pas de fichier à uploader<br />";
}
//$fichier = $_FILES['cover'];
//else      $fichier="";


////// IMAGEPLUS : ///////////////
if(isset($_POST['submit'])){
    
    $file_count = count($_FILES["imageplus"]['name']);
	
	echo $file_count . " file(s) sent... <BR><BR/>";
    
    if(count($_FILES['imageplus']['name']) > 0){
        
for($i=0; $i<count($_FILES['imageplus']['name']); $i++) {
    
    //Get the temp file path
    $tmpFilePath = $_FILES['imageplus']['tmp_name']["$i"];
    $nom_plus = $_FILES['cover']['name']["$i"];

    //Make sure we have a filepath
    if($tmpFilePath != ""){
 //save the filename
        
        
    // renomme toi de manière chelou :
//   $extension = substr($nom_plus, strrpos($nom_plus, '.') + 1);
//   $file_date = date("ymdhis");
//   $shortname = $file_date . "." . $extension;
//        
     //   $extension = end(explode(".", $_FILES["contenu"]["name"]));
     
$extension = end(explode(".", $_FILES["imageplus"]["name"]["$i"]));

$shortname = date("ymdhis").'-'.$_FILES['imageplus']['name']["$i"].'.'.$extension;
    
    
    //$_FILES['imageplus']['name'][$i];

//save the url and the file
$filePath = "uploads/plus/" ;
    //. date('d-m-Y-H-i-s').'-'.$_FILES['imageplus']['name'][$i];

//Upload the file into the temp dir
//if(move_uploaded_file($tmpFilePath, $filePath)) {
    
if (move_uploaded_file($_FILES['imageplus']['tmp_name'][$i], $filePath . $shortname)) {
    
   // $count++;
    
//$query  = "UPDATE INTO article(imageplus)";
//$query .= "VALUES ('$filePath.$shortname')";
//$result = mysqli_query($link, $query);
    
     echo "Le fichier a été uploadé avec succès<br /><br />";
            echo '<a href="' .$filePath . $shortname . '"><img src="'  .$filePath . $shortname . '"></a><br />';
            echo $_FILES['imageplus']['tmp_name'][$i];
            
            }
            else
            echo "Le fichier n'a pas pu être uploadé<br />";
        }
    
    //insert into db 
    //use $shortname for the filename
    //use $filePath for the relative url to the file

}}}
  
    

       
//////


/////PDF :


$allowedExts = array(
  "pdf",
  "doc",
  "docx"
); 

$allowedMimeTypes = array( 
  'application/msword',
  'application/pdf',
  'image/gif',
  'image/jpeg',
  'image/png'
);

$extension = end(explode(".", $_FILES["contenu"]["name"]));

// echo "<br> PDF : <br>";


// echo end(explode(".", $_FILES["contenu"]["name"]));
// echo "<br>";
// echo $_FILES["contenu"]["size"];

if ( 2000000 < $_FILES["contenu"]["size"]  ) {
  die( 'Please provide a smaller file [E/1].' );
}

if ( ! ( in_array($extension, $allowedExts ) ) ) {
  die('Please provide another file type [E/2].');
}

if ( in_array( $_FILES["contenu"]["type"], $allowedMimeTypes ) ) 
{
  $date = new DateTime();
  $contenu_name = $date->getTimestamp().'.'.$extension;

 move_uploaded_file($_FILES["contenu"]["tmp_name"],'uploads/pdf/'.$contenu_name);
 //'.$_FILES["contenu"]["tmp_name"]); 
 echo "Pdf transfer = Success";
}
else
{
// die('Please provide another file type [E/3].');
}



/**
  * Connect to the database
  * http://php.net/manual/en/mysqli.real-connect.php
*/
$user = 'root';
$pass = 'root';
$db   = 'lireecrire';
$host = 'localhost';
$port = 8889;
$link = mysqli_init();
if (!$link) {
    die('mysqli_init failed');
}

if (!$link->options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
    die('Setting MYSQLI_INIT_COMMAND failed');
}

if (!$link->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
    die('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed');
}

if (!$link->real_connect(
  $host,
  $user,
  $pass,
  $db
)) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

// Quick test
// echo 'Success... ' . $link->host_info . "\n";

$connection = $link->real_connect(
  $host,
  $user,
  $pass,
  $db
);

/**
  * More testing
*/
// echo '$link: '; print_r($link); echo "\n";
// echo '$connection: '; print($connection); echo "\n";
// echo '$connection _r: '; print_r($connection); echo "\n";

if (!$connection) {
  die('Database connection failed.');
}

/**
  * Insert data into table
*/
$query  = "INSERT INTO article(id, titre, cover, imageplus, contenu, auteur, description, auteurlire)";
$query .= "VALUES ('','$titre', '$fichier_n_nom','$shortname','$contenu_name','$auteur', '$description', '$auteurlire')";

    //  '$filePath.$shortname',
      

// $result = mysqli_query($connection, $query);
$result = mysqli_query($link, $query);

if (!$result) {
  die('Error: ' . mysqli_error($link));
}

 

/**
  * Close connection
*/
$link->close();
?>




  
   
