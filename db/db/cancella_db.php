<?php
session_start();
if(!isset($_SESSION['admin'])) 
{
	echo '<br><br><br><br><div class="container">
		  <div class="alert alert-danger">
		   <h5>  <center><strong> Utente non autorizzato  </strong></h5>
		   <h5>  <center><strong> Area riservata </strong></h5>
		    <h5>  <center><strong> Accedere con le proprie credenziali </strong></h5>
		  </div>
		 
		</div><br><br><br>';
		echo"<script type='text/javascript'>";   
    echo "setTimeout(\"location.href='index.php?inizio=include/accedi.php';\", 3000);";     
echo"</script>"; 
}
else{

include 'connessione.php';
$sql="DROP DATABASE ".$db;
if ($mysqli->query($sql)) 
	{
		// cancello il database
		echo $mysqli->query($sql);
		echo '<div class="container">
				  <div class="alert alert-success ">
					   <h5>  <center><strong> DataBase  :'.$db.' eliminato</strong></h5>
				  </div>
			 </div>';
			
	}
else 
		{
		echo '<br><br><br><br><div class="container">
		  <div class="alert alert-danger">
		   <h5>  <center><strong> Utente autorizzato  </strong></h5>
		   <h5>  <center><strong> DATABASE : '.$db.' non eliminato</strong></h5>
		  </div>
		 
		</div><br><br><br>';	
		}
		echo"<script type='text/javascript'>";   
			echo "setTimeout(\"location.href='index.php?inizio=include/main.php';\", 3000);";     
		echo"</script>"; 
}
?>