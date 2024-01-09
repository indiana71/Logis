<html>
<head>
<title> modifica dati Studente </title>
</head>
<body>
<div> modifica dati Studente<p>&nbsp;</div>

<form action=”” method=POST>
<?php
	//$sql="select * from editori";
	$result = $mysqli->query("SELECT * FROM editori");
	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
	?>
<div class="col-md-6 col-sm-6 col-xs-12 col-lg-4">
        <div class="card card-bg card-vertical-thumb bg-white card-thumb-rounded">
            <div class="card-body">
                <div class="card-content"> 
					<article class="bcp-block-item-issue clearfix block-item-post list">
						 						<h5 class="block-sub-title" style="color : blue;"><?php echo  $row['NomeA'].  "  ".$row['CognomeA']?></h5>

						<h5 class="block-sub-title" style="color : blue;"><?php echo  $row['NomeE'] ?></h5>

						<h5 class="block-sub-title" style="color : blue;"><?php echo  $row['Indirizzoemail'] ?></h5>
						<h5 class="block-sub-title" style="color : blue;"><?php echo  $row['TelefonoE'] ?></h5>
						

					</article>
				</div>
			</div>
		</div>
		<div class="py-4"></div>
	</div>
        <?php } ?>
    </div>
</div>
</section>			
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


<input type=submit value=”cerca studente” >

</form>
<a href=index.html> menu </a>
<?php
// acquisizione dati dal form html
/*
if (isset($_POST[“cmbstudente”]))
{
$textc=$_POST[“cmbstudente”];
// connessione al data base affari
$hostname=”localhost”;
$username=”root”;
$password=””;
$conn=mysql_connect($hostname,$username,$password);
if (!$conn) die (“connessione fallita”);
// apertura del data base
$db=”affari”;
$sql=”use $db”;
$ris=mysql_query($sql);
if (!$ris) die (“apertura data base fallita”);
// ricerca record
$sql=”select * from studente where cod_fisc=’$textc'”;
$ris=mysql_query($sql);
if (!$ris) die (“studente inesistente”);
// visualizzazione dati
$riga=mysql_fetch_array($ris);
$ka=$riga[“cod_fisc”];
$kb=$riga[“cognome”];
$kc=$riga[“nome”];
$kd=$riga[“ntel”];
$ke=$riga[“indirizzo”];
$kf=$riga[“citta”];
$kg=$riga[“password”];
$kh=$riga[“email”];
// <textarea name=tcognome rows=1 cols=52>$kb</textarea>

echo “<form action=updatestudente.php method=POST>
<table border=1 width=95% align=center>
<tr>
<td width=158 align=left><p id=etichetta>Codice fiscale</p>
<td width=334> <input type=hidden name=tcod_fisc size=50 value=’$ka’ ></td>
<td width=158><p id=etichetta>Cognome</p>
<td width=334> <textarea name=tcognome rows=1 cols=50>$kb</textarea></td>

</tr>
<tr>
<td width=158 align=left><p id=etichetta>Nome</p>
<td width=334><textarea name=tnome rows=1 cols=50>$kc</textarea></td>

<td width=158><p id=etichetta>Numero di telefono</p>
<td width=334><textarea name=tntel rows=1 cols=50>$kd</textarea></td>
</tr>
<tr>
<td width=158 align=left><p id=etichetta>Indirizzo</p>
<td width=334><textarea name=tindirizzo rows=1 cols=50>$ke</textarea></td>
<td width=158><p id=etichetta>Citta</p>
<td width=334><textarea name=tcitta rows=1 cols=50>$kf</textarea></td>
</tr>
<tr>
<td width=158 align=left><p id=etichetta>Password</p>
<td width=334><textarea name=tpassword rows=1 cols=50>$kg</textarea></td>

<td width=158><p id=etichetta>Email</p>
<td width=334><textarea name=temail rows=1 cols=50>$kh</textarea></td>
</tr>
</table>

<p align=center>
<input type=submit value=Aggiorna studente name=butaggiorna>
<input type=submit value=amministratore name=butamm>
</form> “;
mysql_close($conn);

}*/
?>
</body>
</html>