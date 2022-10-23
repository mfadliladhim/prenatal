<?php
function usia($tanggal_lahir){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	if ($birthDate > $today) {
	    // exit("0 tahun 0 bulan 0 hari");
	    exit("0");
	}
	$y = $today->diff($birthDate)->y;
	$m = $today->diff($birthDate)->m;
	$d = $today->diff($birthDate)->d;
	// return $y." tahun ".$m." bulan ".$d." hari";
	return $y;
}
 ?>
