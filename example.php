<?php
	/*
	 * MineSVG
	 *
	 * Example usage of MineSVG.
	 */

	//Require library
	require("MineSVG.php");

	//Set the content type to an SVG image
	header('Content-type: image/svg+xml');

	//Get the username passed
	$username = $_GET["username"];

	//Check if the username is not null
	if (isset($username)) {
		//Get avatar from Cravatar
		$image = imageCreateFromPng("http://cravatar.eu/avatar/" . $username . "/8.png");

		//Convert image to its SVG representation and echo it
		echo avatarToSVG($image);
	}
?>