<?php



	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	

	//$curso = mysql_real_escape_string( $_REQUEST['curso'] );
  $curso = pg_escape_string( $_REQUEST['curso'] );
	$disciplinas = array();

	$sql = "SELECT * FROM disciplinas as d WHERE d.curso=$curso
			ORDER BY d.disciplina";
	$return = pg_query( $sql );
	while ( $line = mysql_fetch_assoc( $return ) ) {
		$cidades[] = array(
			'id_disc'	=> $line['cod_cidades'],
			'disciplina'	=> $line['disciplina'],
		);
	}

	echo( json_encode( $disciplinas ) );
