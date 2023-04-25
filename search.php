<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
<title>Search engine</title>


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">



</head>


<body>

<!-- RECHERCHE DOCUMENT -->
<div class="container my-5">

<form method="post">

<input type="text" placeholder="Search document" name="motcle">
<button class="btn btn-dark btn-sm" name="submit">Search</button>
</form>

</div>


<!-- AFFICHAGE DOCUMENT -->
<div class="container my-5">
<table class="table" >

<?php


if(isset($_POST['submit']))
{
	
// Connexion au serveur
$connexion = mysql_connect("localhost", "root", "");

// Connexion à la base de données
$db = mysql_select_db("MOTEUR", $connexion);
	
$motcle=$_POST['motcle'];
	
$req1="select motcle,chemin from documents where motcle like '$motcle' ";
$res=mysql_query($req1)or mysql_error();

if($res)
{
	if(mysql_num_rows($res)>0)
	{
	$i=0;
	echo"<tr><td><b>num</td><td><b>motcle</td><td><b>chemin</td><tr>";
	
	while($l=mysql_fetch_row($res))
	{
		echo"<tr><td>$i</td><td>$l[0]</td><td>$l[1]</td><tr>";
		$i=$i+1;
	}
	}
	else echo"<h1 class=text-danger>Aucun document trouve!</h1>";
}


}

?>

</table>
</div>


</body>



</html> 