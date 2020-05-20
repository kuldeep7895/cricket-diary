<?php

    session_start();
    $error="";
    if(array_key_exists("submit",$_GET)){
     
        if(!$_GET['hostTeam']){
        
            $error.="Host Team is reaquired.<br>";
            
        }
        
        if(!$_GET['visitorTeam']){
        
            $error.="Visitor Team is reaquired.<br>";
            
        }
        if(!$_GET['tosswon']){
        
            $error.="Toss should take place.<br>";
            
        }
        if(!$_GET['batobowl']){
        
            $error.="Bat or Bowl must be choosen.<br>";
            
        }
        if(!$_GET['overs']){
        
            $error.="Overs are required.<br>";
            
        }
        
        if(!$error){
            
            $_SESSION["hostTeam"] = $_GET['hostTeam'];
            $_SESSION["visitorTeam"] = $_GET['visitorTeam'];
            $_SESSION["tosswon"] = $_GET['tosswon'];
            $_SESSION["batobowl"] = $_GET['batobowl'];
            $_SESSION["over"] = $_GET['overs'];
            $_SESSION["players"] = $_GET["players"];
            header("Location: player.php");
            
        }
        
        else{
            
            $error="You had following errors:<br>".$error;
        }
    
        
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

      <style type="text/css">
          
          body{
              
              background-color: #F8F9FA;
            
              
          }
          
          .teams{
              
              margin-left: 8px;
              margin-right: 8px;
              margin-top: 5px;
              background-color: white;
              height: 100px;
              border-radius: 15px;
              padding: 15px;
          }
          
          .toss{
              
              margin-left: 8px;
              margin-right: 8px;
              margin-top: 5px;
              background-color: white;
              height: 50px;
              border-radius: 15px;
              padding: 15px;
          }
          
          
          .batobowl{
              
              margin-left: 8px;
              margin-right: 8px;
              margin-top: 5px;
              background-color: white;
              height: 50px;
              border-radius: 15px;
              padding: 15px;
          }
          
          .overs{
              
              margin-left: 8px;
              margin-right: 8px;
              margin-top: 5px;
              background-color: white;
              height: 50px;
              border-radius: 15px;
              padding: 15px;
              padding-bottom:30px; 
          }
          
          ::placeholder{
              
              color: #D3D3D3;
              
          }
          
      </style>
    <title>Hello, world!</title>
  </head>
  <body>
      
      <div id="error"<?php
      
      if($error){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'.$error.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
      }
      ?>
      </div>

      <nav class="navbar navbar-expand navbar-light" style="background-color: #2E7D32;">
      
          <a class="navbar-brand" href="#"><span style="font-weight: bold;font-size: 130%;color: white">Cricket</span> <span style="color: white">scorer</span></a>

      </nav>
      
      <p style="color: forestgreen;margin-left: 8px;margin-top: 5px;">Teams</p>
      
      <form>
      <div class="teams">
      
          <input type="text" style="border-top: none;border-right: none; border-left: none; border-bottom: 1px solid black;width: 100%;outline: 0;margin-bottom: 10px" placeholder="Host Team" id="hostteam" name="hostTeam">
          
          <input type="text" style="border-top: none;border-right: none; border-left: none; border-bottom: 1px solid black;width: 100%;outline: 0" placeholder="Visitor Team" id="visitorteam" name="visitorTeam">
      
      </div>
      
      <p style="color: forestgreen;margin-left: 8px;margin-top: 5px;">Toss won by?</p>
      
    <div class="toss">
        
        <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="team1" name="tosswon" value="team1" class="custom-control-input" checked>
  <label class="custom-control-label" for="team1" id="tossTeam1">Host Team</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="team2" name="tosswon" value="team2" class="custom-control-input">
  <label class="custom-control-label" for="team2" id="tossTeam2">Visitor Team</label>
</div>
          
      
      </div>
      
      <p style="color: forestgreen;margin-left: 8px;margin-top: 5px;">Opted to?</p>
       <div class="batobowl">
        
        <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="bat" value="bat" name="batobowl" class="custom-control-input" checked>
  <label class="custom-control-label" for="bat">Bat</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="bowl" value="bowl" name="batobowl" class="custom-control-input">
  <label class="custom-control-label" for="bowl">Bowl</label>
</div>
      </div>
      
      
       <p style="color: forestgreen;margin-left: 8px;margin-top: 5px;">Overs</p>
          <div class="overs">
      
          <input type="text" style="border-top: none;border-right: none; border-left: none; border-bottom: 1px solid black;width: 100%;outline: 0;margin-bottom: 10px" placeholder="16" name="overs">
      
      </div>
      
      <p style="color: forestgreen;margin-left: 8px;margin-top: 5px;">Players</p>
          <div class="overs">
      
          <input type="text" style="border-top: none;border-right: none; border-left: none; border-bottom: 1px solid black;width: 100%;outline: 0;margin-bottom: 10px" placeholder="11" name="players">
      
      </div>
      <button type="submit" class="btn btn-success" style="float: right;margin-right: 8px;margin-top: 8px; border-radius: 8px" name="submit">Start Match</button>
      </form>
      
      
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      
      <script type="text/javascript">
          
          $("#hostteam").keyup(function(){
              
                if($("#hostteam").val()!=""){
                    $("#tossTeam1").html($("#hostteam").val());
                }
              else{
                  
                  $("#tossTeam1").html('Host Team');
                  
              }
              
          })
          
          
          $("#visitorteam").keyup(function(){
              
              if($("#visitorteam").val()!=""){
                    $("#tossTeam2").html($("#visitorteam").val());
              }
              
              else{
                  
                   $("#tossTeam2").html('Visitor Team');
                  
              }
              
          })
      
      </script>
  </body>
</html>
