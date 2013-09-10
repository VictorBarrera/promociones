<?php
function fecha_adb($fecha="00-00-0000",$delimitador="-") {

		$d = "00-00-0000";
		if ($fecha=="") {
		}else{
			$nueva_fecha = explode( $delimitador,$fecha );
			$d= $nueva_fecha[2]."-".$nueva_fecha[1]."-".$nueva_fecha[0];
		}
		return $d;
	}


	function fecha_auser($fecha="0000-00-00",$delimitador="-") {
		if ($fecha=="") {
			$d = "0000-00-00";
		}else{
			$nueva_fecha =explode($delimitador,$fecha);
			$dia         = explode(' ', $nueva_fecha[2]);

			$d= $dia[0]."-".$nueva_fecha[1]."-".$nueva_fecha[0];
		}
		return $d;
	}