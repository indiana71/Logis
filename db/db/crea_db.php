<?php
//session_start();
$_SESSION['admin']="p";
if(!isset($_SESSION['admin'])) 
{
	echo '<br><br><div class="container">
		  <div class="alert alert-danger">
		   <h5>  <center><strong> Utente non autorizzato  </strong></h5>
		   <h5>  <center><strong> Area riservata </strong></h5>
		    <h5>  <center><strong> Accedere con le proprie credenziali </strong></h5>
		  </div>
		 
		</div><br><br><br>';
		echo"<script type='text/javascript'>";   
    echo "setTimeout(\"location.href='index.php?inizio=pagine/accedi.html';\", 3000);";     
echo"</script>"; 
}
else{

//include "connessione.php";
//$mysqli->query("CREATE DATABASE bibliotecab");
$sql="CREATE DATABASE ".$db;
if ($mysqli->query($sql)) 
	{
		// cancello il database
		//echo $mysqli->query($sql);
		echo '<div class="container">
				  <div class="alert alert-success ">
					   <h5>  <center><strong> DataBase  :'.$db.' Creato</strong></h5>
				  </div>
			 </div>';
			
	}
else 
		{
		echo '<br><div class="container">
		  <div class="alert alert-danger">
		   <h5>  <center><strong> Utente non autorizzato o DB già esistente </strong></h5>
		   <h5>  <center><strong> DATABASE : '.$db.' non Creato</strong></h5>
		  </div>
		 
		</div><br><br><br>';	
		
		}
		echo"<script type='text/javascript'>";   
			echo "setTimeout(\"location.href='index.php?inizio=include/main.php';\", 3000);";     
		echo"</script>"; 
echo $_SESSION['admin'];
}
?>
