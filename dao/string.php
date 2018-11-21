<?php 
	function lstring($string){
	 	$conservar = '0-9a-z '; // juego de caracteres a conservar
		$rx = sprintf('~[^%s]++~i', $conservar); // case insensitive
		$string = preg_replace($rx, '', $string);
	    return $string;
	}
	function nstring($string){
	 	$conservar = '0-9'; // juego de caracteres a conservar
		$rx = sprintf('~[^%s]++~i', $conservar); // case insensitive
		$string = preg_replace($rx, '', $string);
	    return $string;
	}
	function ltstring($string){
	 	$conservar = '0-9a-z '; // juego de caracteres a conservar
		$rx = sprintf('~[^%s]++~i', $conservar); // case insensitive
		$string = preg_replace($rx, '', $string);
	    return $string;
	}
	function lpass($string){
		$conservar = '0-9a-z .'; // juego de caracteres a conservar
		$rx = sprintf('~[^%s]++~i', $conservar); // case insensitive
		$string = preg_replace($rx, '', $string);
	    return $string;
	}
 ?>