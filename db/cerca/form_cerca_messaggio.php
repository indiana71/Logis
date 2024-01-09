<br><br>

<?php		 
$result = $mysqli->query("SELECT * FROM messaggi");
?>
<div class="container">
  <h2>Ricerca con filtro</h2><br>
 
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
<tr>
		<th><h5 class="block-sub-title" style="color : blue;">Nome</h5></th>
		<th><h5 class="block-sub-title" style="color : blue;">Mail</h5></th>
		<th><h5 class="block-sub-title" style="color : blue;">Telefono</h5></th>
		<th><h5 class="block-sub-title" style="color : blue;">Messaggio</h5></th>
		<th><h5 class="block-sub-title" style="color : blue;">Stato</h5></th>

	</tr>
 	<tr>
		<th></th>
		<th></th>
		<th></th>

	</tr> 
<?php 
while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
	?>	
<tbody id="myTable">	
      <tr>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['nome'] ?></h5></th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['mail'] ?></h5></th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['telefono'] ?></h5></th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['messaggio'] ?></h5></th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['letto'] ?></h5></th>

      </tr>
	  
<?php } ?>	
</tbody>
  </table>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

