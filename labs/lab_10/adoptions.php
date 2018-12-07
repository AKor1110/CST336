<?php
include 'inc/Connection.php';
$dbConn = getDatabaseConnection("c9");

function getAllPets(){
    global $dbConn;
    
    $sql = "SELECT id, name, type FROM pets ORDER BY name ASC";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    return $records;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
            body {
                text-align: center;
            }
        </style>
   
    </head>
    <body>
        
	  <?php 
	    include 'inc/header.php';
	    
	  ?>
	  <script>
	      $('document').ready(function() {
	          $('.petLink').click(function() {
	              $("#container").html("<img src='img/loading.gif' />");
	              
	              $('#petModal').modal("show");
    	              $.ajax({
    
                        type: "GET",
                        url: "api/getPetInfo.php",
                        dataType: "json",
                        data: { "petid": $(this).attr('id') },
                        success: function(data, status) {
                            data = data[0];
                            //console.log(data);
                            $("#petname").html(data.name);
                            $("#description").html(data.description);
                            $("#petImage").attr('src', "img/" + data.pictureURL);
                            $("#container").html("");
                        },
    	              });
	          
	          });
	          
	      });
	  </script>
	  <?php
	    $pets = getAllPets();
	    foreach($pets as $pet) {
	        echo "<ul><li>Name: " ."<a href='#' class = 'petLink' id = '". $pet['id']. "'>". $pet['name'] ." </a>" ."</li>";
	        echo "<li>Type: ".$pet['type']."</li></ul>";
	    }
	  ?>
	  
	  <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="petModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="petname">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div id="container"></div>
            <div>
    	      
    	      <img id = "petImage" src="">
    	      <div id="description">Description: </div>
    	      
    	      </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
        <?php
        include 'inc/footer.php';
        
        ?>
        </body>

</html>