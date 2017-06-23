<?php
	/*
		Cette page met en pratique la théorie vu sur la création d'image en PHP 
	 	Partie:  Des fonctions encore plus puissantes
	 	Sous partie: Mélanger deux images
	 */

	 	header("Content-type: image/jpeg");

	 	// On charge nos images
	 	$source = imagecreatefromjpeg("olympus.jpg"); 
	 	$destination = imagecreatefromjpeg("soleil.jpg");

	 	// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
	 	$largeur_source = imagesx($source);
	 	$hauteur_source = imagesy($source);
	 	$largeur_destination = imagesx($destination);
	 	$hauteur_destination = imagesy($destination);

	 	// On souhaite placer le logo en bas à droite. On calcule les coordonnées où on doit le placer sur la photo
	 	$destination_x = $largeur_destination - $largeur_source;
	 	$destination_y = $hauteur_destination - $hauteur_source;

	 	// On met l logo (source) dans l'image de destination (la photo)
	 	imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 65);
	 	//imagecopymerge(dst_im, src_im, dst_x, dst_y, src_x, src_y, src_w, src_h, pct)

	 	// On affiche l'image de destination q ui a été fusionné avec le logo
	 	imagejpeg($destination);


	 	/*
	 		L'image de fond de mon exemple est un peu gourmande alors mon logo parait tout petit à côté mais ça fonctionne.
	 		Test fait avec logo2 qui lui, est un peu plus gros
		*/
?>