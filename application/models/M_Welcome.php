<?php

/**
 * 
 */
class M_Welcome extends CI_Model
{
	
	public function get()
	{
		return "belajar CI dong";
		$data=10;
	}

	public function luas ($panjang, $lebar){

		return $panjang *$lebar;
	}

	
}

?>