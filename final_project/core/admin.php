<?php
session_start();



include '../inc/Connection.php';
$dbConn = getDatabaseConnection("c9");

include '../inc/functions.php';
validateSession();

?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        
        <title> Admin Main Page </title>
        <style>
            form {
                display: inline-block;
            }
            
            h1 {
                text-align: center;
            }
            
            body {
                text-align: center;
                background-color: cornflowerblue;
            }
            
            a {
                color: black;
            }
           
            #songList {
                float: left;
                margin-left: 5%;
            }
            
            #albumList {
                float: right
                margin-right: 5%;
            }
            
            
        </style>
        
        <script>
        
            function confirmDelete() {
                
                return confirm("Really??");
                
            }
            
            function openModal() {
                
                $('#myModal').modal("show");
            }
            
            function totalReport() {
                $.ajax({
                  url: "../api/getTotalReport.php",
                  dataType: "json",
                  type: "get",
                  success: function(data, success) {
                      $("#totalReport").html("<h2> Total Number of Artists: " + data.num + "</h2>");
                  }
                });
            }
            
            
        </script>
    
    </head>
    <body>
        
        <h1> OtterMusic [ADMIN] - Main Page </h1>
        
         <h3>Welcome <?= $_SESSION['adminFullName'] ?> </h3>

          <form action="addRecord.php">
              <input type="submit" value="Add New Song/Album">
          </form>
          
          <form onsubmit = "totalReport()">
              <input type = "submit" name = "totalReport" value = "Artist Number Report">
          </form>
          
          <form onsubmit = "songReport">
              <input type = "submit" name = "songReport" value = "Average Song Length">
          </form>
          
          <form onsubmit = "albumReport()">
              <input type = "submit" name = "albumReport" value = "Average Album Length">
          </form>
          
          <form action="logout.php">
              <input type="submit" value="Logout">
          </form>

           <br><br>
        
        <?= displayAllSongs() ?>
        <?= displayAllAlbums() ?>
        
        <br />
        
        <div id = "totalReport"></div>
        <br />
        
        <div id = "songReport"></div>
        <br />
        
        <div id = "albumReport"></div>
        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Product Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <iframe name="productModal" width="450" height="250"></iframe>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>        
        
        
    </body>
</html>