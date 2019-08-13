<?php 

function formataData($dat)
{
	$dat = explode(" ", $dat);
		list($dat) = $dat;
		$data_sem_barra = array_reverse(explode("/", $dat));
		$data_sem_barra = implode("-", $data_sem_barra);
	return $data_sem_barra;
}

?>