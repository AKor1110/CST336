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
            
            .carousel-control-prev-icon,
            .carousel-control-next-icon {
              height: 100px;
              width: 100px;
              outline: black;
              background-size: 100%, 100%;
              border-radius: 50%;
              border: 1px solid black;
              background-image: none;
            }
            
            .carousel-control-next-icon:after
            {
              content: '>';
              font-size: 55px;
              color: red;
            }
            
            .carousel-control-prev-icon:after {
              content: '<';
              font-size: 55px;
              color: red;
            }
            
            .carousel-item {
              height: 500px;
            }
            
            .carousel-indicators li {
                display: inline-block;
                width: 48px;
                height: 48px;
                margin: 10px;
                text-indent: 0;
                cursor: pointer;
                border: none;
                border-radius: 50%;
                background-color: #0000ff;
                box-shadow: inset 1px 1px 1px 1px rgba(0,0,0,0.5);    
            }
            
            .carousel-indicators .active {
                width: 48px;
                height: 48px;
                margin: 10px;
                background-color: #ffff99;
            }
        </style>
   
    </head>
    <body>
        
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
          <a class = "navbar-brand" href = "#">CSUMB</a>
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adoptions.php">Adoptions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
          </ul>
        
        </nav>
                
        
        <div class="jumbotron">
          <h1> CSUMB Animal Shelter</h1>
          <h2> The "official" animal adoption website of CSUMB </h2>
        </div>
        
        <br />
        
        <?php
          include "inc/carousel.php";
          
          carousel();
        ?>
        
        <button id = "adoptNow" onclick = ""> Adopt Now! </button>