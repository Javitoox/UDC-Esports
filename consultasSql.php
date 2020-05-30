<?php
    function obtenVideojuegos($conexion){
        try{
            $consulta= "SELECT * from videojuegos";
            $stmt = $conexion->query($consulta);
            return $stmt;
        }catch(PDOException $e) {
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }
    }
	function racha($conexion){
		try{
			$consulta="SELECT nombreVideojuego from (SELECT oid_v,max(oid_e) oid_E from estadisticas natural join partidos group by oid_v)
						natural join estadisticas natural join videojuegos where racha > 5";
			$stmt = $conexion->prepare($consulta);
			$stmt->execute();
			return $stmt;
		}catch(PDOException $e){
			
			$_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
			
		}
		
	}
	
	function ultimosResultados($conexion){
		try{
			$consulta="select * from partidos natural join videojuegos natural join estadisticas where rownum<=5 order by partidos.fechahora DESC";
			$stmt = $conexion->prepare($consulta);
			$stmt->execute();
			return $stmt;
		}catch(PDOException $e){
			
			$_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
			
		}
		
	}
	
	function jugadoresFichados($conexion,$fecha){
		try{
			$consulta="SELECT nombrejugador from
						(SELECT nombrevirtual,oid_v videojuego,clausula,club from posiblesfichajes natural join ojeadores natural join videojuegos)
						natural join jugadores where nombrevirtual=nombrevirtualjugador and videojuego=oid_v and (fechaentrada between :fecha and sysdate)";
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam(':fecha',$fecha);			
			
			$stmt->execute();
			return $stmt;
		}catch(PDOException $e){
			
			$_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
			
		}
		
	}
	
	
	
	
	function dniOjeadores($conexion){
		try{
			$consulta="SELECT dniojeador from ojeadores";
			$stmt = $conexion->prepare($consulta);
			$stmt->execute();
			return $stmt;
		}catch(PDOException $e){
			
			$_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
			
		}
		
	}
	function posiblesFichajes($conexion,$dni){
		try{
			$consulta="select nombreVirtual from posiblesfichajes  
						natural join ojeadores natural join videojuegos where dniOjeador= :dni and nombreVirtual not in 
						(select nombreVirtualJugador from jugadores natural join videojuegos where oid_v=oid_v)";
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam(':dni',$dni);			
			$stmt->execute();
			return $stmt;
		}catch(PDOException $e){
			
			$_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
			
		}
		
	}
	
    
	function consulta_paginada( $conn, $query, $pag_num, $pag_size ){
	try {
		$primera = ( $pag_num - 1 ) * $pag_size + 1;
		$ultima  = $pag_num * $pag_size;
		$consulta_paginada = 
			 "SELECT * FROM ( "
				."SELECT ROWNUM RNUM, AUX.* FROM ( $query ) AUX "
				."WHERE ROWNUM <= :ultima"
			.") "
			."WHERE RNUM >= :primera";

		$stmt = $conn->prepare( $consulta_paginada );
		$stmt->bindParam( ':primera', $primera );
		$stmt->bindParam( ':ultima',  $ultima  );
		$stmt->execute();
		return $stmt;
	}	
	catch ( PDOException $e ) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
} 

	function total_consulta( $conn, $query ){
	try {
		$total_consulta = "SELECT COUNT(*) AS TOTAL FROM ($query)";

		$stmt = $conn->query($total_consulta);
		$result = $stmt->fetch();
		$total = $result['TOTAL'];
		return  $total;
	}
	catch ( PDOException $e ) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
} 
	
	
	
?>

