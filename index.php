<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<fieldset style="border:solid 1px black; padding:20px; width:320px; color:white; font-family:verdana;"><h1>Exercice du dico</h1></fieldset>
	
	<p>Combien de mots contient ce dictionnaire ?<br/>
		Combien de mots font exactement 15 caractères ?<br/>
		Combien de mots contiennent la lettre « w » ?<br/>
		Combien de mots finissent par la lettre « q » ?	</p>

	<?php
		$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
		$dico = explode("/n", $string);

		//echo $dico[0];
		$result = count($dico);
		echo $result;
	?>

	<fieldset style=";border:solid 1px black; padding:20px; width:450px; color:white; font-family:verdana;"><h1>Exercice Liste de Films</h1>
		<p align="none"><img border="0" src="css/image/bobine_film.png" width="250" height="300"></td>
		
	</fieldset>																				
					
	<p><h3>Afficher le top10 des films sous cette forme :</h3></br>
	```</br>
	1 Mission: Impossible - Rogue Nation</br>
	2 …</br>
	…</br>
	10 …</br>
	```</br>

	* Quel est le classement du film « Gravity » ?</br>
	* Quel est le réalisateur du film « The LEGO Movie » ?</br>
	* Combien de films sont sortis avant 2000 ?</br>
	* Quel est le film le plus récent ? Le plus vieux ?</br>
	* Quelle est la catégorie de films la plus représentée ?</br>
	* Quel est le réalisateur le plus présent dans le top100 ?</br>
	* Combien cela coûterait-il d'acheter le top10 sur iTunes ? de le louer ?</br>
	* Quel est le mois ayant vu le plus de sorties au cinéma ?</br>
	* Quels sont les 10 meilleurs films à voir en ayant un budget limité ?</p>

	<?php

		$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
		$brut = json_decode($string, true);
		$top = $brut["feed"]["entry"]; # liste de films
		$top100 = count($top); 

		//var_dump($top); me montre les elements du tableau .

		echo"<h3>Top 10 des Films.</h3>";
		for ($i=1; $i<=10; $i++){
			$titre = $top[$i]['im:name']["label"];
			echo $i." ".$titre. "<br />";
		}

		/* ou ca qui marche aussi: $top10 = array_slice($top, 1, 10);  */

		echo "<h3>Classement du film: GRAVITY.</h3>";
		for ($i=0; $i<100; $i++){
			$titre = $top[$i]["im:name"]["label"];
			if ($titre === 'Gravity'){
			echo "Le classement du film est: ".$i;
			}
		}

		echo "<h3>réalisateur du film LEGO the Movie.</h3>";
		for ($i=0; $i<$top100; $i++){
			$titre = $top[$i]["im:name"]["label"];
			if($titre == "The LEGO Movie"){

				echo "Les réalisateurs du film The LEGO Movie sont : ".$top[$i]["im:artist"]["label"];
			}

		}

		echo "<h3>Le nombre de films sortis avant 2000</h3>";
		$nbFilm=0;
		for ($i=0; $i<$top100; $i++){
			$date = $top[$i]['im:releaseDate']["label"];
			if(date_parse($date)['year']<2000){
				$nbFilm++;
			}
		}
				echo "Le nombre de films sortis avant 2000 est de : ".$nbFilm;



		echo "<h3>Film le plus récents</h3>";	
// var_dump($top[99]);
		for($i=0; $i>$top100; $i++);{
			if($i==0){
				$FilmRecent= $top[$i];				
			}
			else{
			// var_dump($i);
			$date = $top[$i]['im:releaseDate']["label"];
			$filmAnciens> $FilmRecent['im:releaseDate']["label"];
			if($date> $filmAnciens){
				$FilmRecent = $top[$i];
			}
		}
				
	}
	echo "Le film le plus récent est : ".$FilmRecent['im:name']["label"];
			$date = $top[$i]['im:releaseDate']["label"];			

	echo "<h3>Film le plus ancien</h3>";
		for($i =0; $i<$top100; $i++);{
			if($i==0){
				$filmAnciens = $top100[$i];
			}else{
				$date = $top[$i]['im:releaseDate']["label"];
				$filmAnciens> $FilmRecent['im:releaseDate']["label"];
				if($date> $filmAnciens){
					$FilmRecent = $top[$i];
				}
			}

		}
		echo "le film le plus ancien est : ".$filmAnciens['im:name']["label"];
			$date = $top[$i]['im:releaseDate']["label"];
	
	//$filmAnciens = "";
	//for($i=0; $i=$top100; $i++){
	//	if($i ==0){

	//	}

	//}

	
	echo "<h3>La catégorie de films la plus représentée est:</h3>";

	echo "<h3>Réalisateur le plus présent dans le top100</h3>";

	echo "<h3>Combien cela coûterait-il d'acheter le top10 sur iTunes</h3>";

		$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
			$brut = json_decode($string, true);
			$top = $brut["feed"]["entry"]; # liste de films
			$top10 = array_slice($top, 1, 10);
			$total_price = 0;
			foreach ($top10 as $key => $film) {
			  $total_price += $film["im:price"]["attributes"]["amount"];
			}

		/*$total_price = 0;
			foreach ($top10 as $key => $film) {
			  $total_price += $film["im:price"]["attributes"]["amount"];
			}
			echo $total_price;*/


	echo "<h3>Mois ayant vu le plus de sorties au cinéma</h3>";

	echo "<h3>Quels sont les 10 meilleurs films à voir en ayant un budget limité</h3>";





?>	
	<p align="center"><img border="0" src="css/image/bobine_film.png" width="500" height="300"></td>

</body>
</html>

