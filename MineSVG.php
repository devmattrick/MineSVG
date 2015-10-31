<?php
	/*
	 * MineSVG
	 *
	 * This library converts an 8x8 Minecraft avatar into an SVG image.
	 * This can be cached for later use and help to lower loading time
	 * when using large Minecraft heads.
	 *
	 * See example.php for usage.
	 */

	function avatarToSVG($image) {
		//Basic SVG image template
		$svg = '<?xml version="1.0" standalone="no"?>
				<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
				<svg width="8" height="8" viewbox="0 0 8 8" xmlns="http://www.w3.org/2000/svg">';

		//Gets width of image
		$width = imagesx($image);
		//Gets height of image
		$height = imagesy($image);

		//Only accept 8x8 images, there is not reason to have larger ones
		if (($width == 8 && $height == 8)) {
			//Loop thorugh all pixels in the image
			for($x = 0; $x < $width; $x++) {
			    for($y = 0; $y < $height; $y++) {
			    	//Get the color at that specific pixel
			        $color = imagecolorat($image, $x, $y);
			        //Convert to a usable color
			        $colors = imagecolorsforindex($image, $color);
			        //Convert to rgb() color code
			        $colorString = "rgb(" . $colors['red'] . "," . $colors['green'] . "," . $colors['blue'] . ")";

			        //Append to SVG element
			        $svg .= '<rect width="1" height="1" x="' . $x . '" y="' . $y . '" fill="' . $colorString . '" shape-rendering="crispEdges"/>';
			    }
			}

			//Close SVG tag
			$svg .= "</svg>";

			return $svg;
		}
	}
?>