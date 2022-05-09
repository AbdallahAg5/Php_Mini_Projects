<?php
require('./cnx.php');
$id=$_GET["id"];
$requete="DELETE FROM person WHERE id='$id'";
$query=mysqli_query($cnx,$requete);
header('location: index.php');



?>