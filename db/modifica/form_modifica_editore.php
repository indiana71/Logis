<?php
if (isset($_SESSION['admin'] )) 
	{
	IF(!isset($_POST['log']))
		{
?>
<br><br>
<form name="FORM"  method="post" action="" enctype="text" /> 
	<div class="row">	
		<div class="col-lg-4 form-group"></div>
		<div class="col-lg-4 form-group">
			<input name="cerca" placeholder="Inserisci sequenza editore o id" onfocus="this.placeholder = 'Ricorda...sequenza di caratteri'" onblur="this.placeholder = 'Inserisci sequenza Username da cercare'" class="common-input mb-20 form-control"  type="text">
		</div>
		<div class="col-lg-4 form-group"></div>
		<div class="col-lg-4 form-group"></div>
		<div class="col-lg-4 form-group">
			<input type="submit" name="log" class="common-input mb-20 form-control" >
		</div>
		<div class="col-lg-4 form-group"></div>
	</div>
</form>
<?php
		}
		else if (!isset($_POST['log1']))
			{
				echo '<div class="container py-2">
		  <div class="row variable-gutters">';	
	$result = $mysqli->query("SELECT * FROM editori
								WHERE 
								NomeE LIKE '%$_POST[cerca]%' or ideditore LIKE '%$_POST[cerca]%'");
	$ris=$mysqli->affected_rows;																																					
	if (($ris>0) )
	  {
		echo '<div class="menu-content pb-30 col-lg-12">
							<div class="title text-center">
								<h4 class="mb-10">Accesso Area Riservata<br>Modifica Autori</h4>	
							</div>
						</div>';
	  echo ("<div class='table-responsive container'>");
	  echo ("<table class='table text-center'>
				<tr style='background-color:#f0f0f0;font-weight:bold;color:#a8a490;'>
					<td>Id</td>
					<td>Nome</td>
					<td>Indirizzo Email</td>
					<td>Telefono</td><td>Telefono</td></tr>");
	  while($row = $result->fetch_array(MYSQLI_ASSOC))
	  {
			  $id=$row['ideditore'];
			  $nome=$row['NomeE'];
			  $nascita=$row['Indirizzoemail'];
			  $luogo=$row['TelefonoE'];
?>
	<div class="container"><br>
		<div class="row"><br><br>
			<div class="col-lg-12 ">
				<form class="form-area contact-form text-right"  action="" method="post">
					<div class="row d-flex justify-content-center">
			
				</div>				
			<div class="row">
				<div class="col-lg-1 form-group">
					<input  name="id" value="<?php echo $id;?>" placeholder="<?php echo $id;?>"  class="common-input mb-20 form-control" type="label" >
				</div>
				<div class="col-lg-4 form-group">
					<input name="nome" value="<?php echo $nome;?>" placeholder="<?php echo $nome;?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Username'" class="common-input mb-20 form-control" required="" type="text">
				</div>
				<div class="col-lg-4 form-group">
					<input name="indirizzo" value="<?php echo $nascita;?>" placeholder="<?php echo $nascita;?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Password'" class="common-input mb-20 form-control" required="" type="text">
				</div>
				<div class="col-lg-3 form-group">
					<input name="telefono" value="<?php echo $luogo;?>" placeholder="<?php echo $luogo;?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Cognome'" class="common-input mb-20 form-control" required="" type="text">
				</div>
				
				
			</div>

				
		</div>
	</div>


<?php






/* 

		echo("<tr>");																						
		echo '<td>'.$row['ideditore'].'</td>
			  <td>'.$row['NomeE'].'</td>
			  <td>'.$row['Indirizzoemail'].'</td>
			  <td>'.$row['TelefonoE'].'</td>  <td>'.$row['TelefonoE'].'</td>';
	*/			 
	  //}
	echo("</tr>");      echo "</form>	";
	  print '</table></div>';

	  echo "</div>";   
/*  $id=$row['ideditore'];
			  $nome=$row['NomeE'];
			  $nascita=$row['Indirizzoemail'];
			  $luogo=$row['TelefonoE'];
	*/ 
	  }  }
	  else{
			echo '<div class="col-lg-4">
				</div>';	 
			echo '<div class="col-lg-4">
				  <div class="alert alert-success ">
						<h6>  <center><strong>Libro <h5>'.$_POST[cerca].'</h5> non trovato o non disponibile.</strong></h6>
				  </div>
				</div>';
			echo '<div class="col-lg-4">
				</div>';
			echo"<script type='text/javascript'>";   
				echo "setTimeout(\"location.href='index.php?inizio=db/cerca/form_cerca_acquisto.php';\", 3000);";     
			echo"</script>"; 	
	  }
	  echo "</div>";
	  echo "</div>";
?>
<section class="contact-page-area section-gap">
	<div class="container"><br>
		<div class="row"><br><br>
			<div class="col-lg-12 ">
				<form class="form-area contact-form text-right"  action="" method="post">
					<div class="row d-flex justify-content-center">
			
				</div>				
			<div class="row">
				<div class="col-lg-1 form-group">
					<input  name="id" value="<?php echo $id;?>" placeholder="<?php echo $id;?>"  class="common-input mb-20 form-control" type="label" >
				</div>
				<div class="col-lg-4 form-group">
					<input name="nome" value="<?php echo $nome;?>" placeholder="<?php echo $nome;?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Username'" class="common-input mb-20 form-control" required="" type="text">
				</div>
				<div class="col-lg-4 form-group">
					<input name="indirizzo" value="<?php echo $nascita;?>" placeholder="<?php echo $nascita;?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Password'" class="common-input mb-20 form-control" required="" type="text">
				</div>
				<div class="col-lg-3 form-group">
					<input name="telefono" value="<?php echo $luogo;?>" placeholder="<?php echo $luogo;?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Cognome'" class="common-input mb-20 form-control" required="" type="text">
				</div>
				
				
			</div>
			<div class="row">
				<div class="col-lg-4 form-group">
				</div>
				<div class="col-lg-4 form-group">
					  <input type="submit" value= "Aggiorna" name="log1" class="common-input mb-20 form-control" >
					<input name="log" value="" placeholder="<?php echo $biografia;?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Nome'" class="common-input mb-20 form-control" required="" type="hidden">
				</div>
				<div class="col-lg-4 form-group">
				</div>
			</div>
				</form>	
		</div>
	</div>	<br><br><br>
</section>

<?php			
		}
	else {
		
$sql="UPDATE editori 
		SET  NomeE='$_POST[nome]', 
			 Indirizzoemail='$_POST[indirizzo]', 
			 TelefonoE='$_POST[telefono]'
		WHERE ideditore = '$_POST[id]'";
echo $sql;		
//$sql =$mysqli->query("INSERT INTO autore (idautore,nome,nascita,luogo,biografia) VALUES (null,'$_POST[nome]','$_POST[data_nasc]','$_POST[luogo]','$_POST[biografia]')");	
		if (!$mysqli->query($sql)) {
			echo '	<div class="container">
						<div class="alert alert-danger ">
						   <h5>  <center><strong> inserimento non eseguito.  </strong></h5>
						</div>
					</div>';
		}
		else {
		echo '<div class="container">
				  <div class="alert alert-success ">
						<h5>  <center><strong>'.$id.'inserimento'.$_POST['id'].' eseguito.'.$_POST['nome'].'</strong></h5>
				  </div>
				</div><br>';		

		}
	}

echo '<div class="container">
		  <div class="alert alert-success ">
				<h5>  <center><strong>Utente non autorizzato</strong></h5>
				<h5>  <center><strong>Effettuare accesso</strong></h5>
		  </div>
		</div><br>';		
/*	echo"<script type='text/javascript'>";   
			echo "setTimeout(\"location.href='index.php?inizio=include/accedi.php';\", 3000);";     
		echo"</script>";*/
	}
?>
