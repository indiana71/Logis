
 <?php
	$host='localhost';
	$user='root';
	$pwd='';
	$db='biblioteca';
	
		$mysqli = new mysqli($host, $user, $pwd);
	$mysqli->query("use ".$db);
	
$result = $mysqli->query("SELECT distinct libri.*,autori.NomeA,scritto.isbn,editori.NomeE as nomeed, immagini.* 
					FROM libri,scritto,autori,editori, immagini 
					WHERE (autori.idautore=scritto.idautore and scritto.isbn=libri.isbn) 
					and(editori.ideditore=libri.ideditore)
					and(immagini.isbn = libri.isbn)  ORDER BY Titolo");
$ris=$mysqli->affected_rows;
$_SESSION['libri']=$ris;
$result = $mysqli->query("SELECT * FROM editori ");
$ris=$mysqli->affected_rows;
$_SESSION['editori']=$ris;
$result = $mysqli->query("SELECT * FROM autori ");
$ris=$mysqli->affected_rows;
$_SESSION['autori']=$ris;	
$result = $mysqli->query("SELECT * FROM utenti ");
$ris=$mysqli->affected_rows;
$_SESSION['utenti']=$ris;	


?>
