<?php


    session_start();

    $error="";
    if(array_key_exists("submit",$_GET)){
        
        if(!$_GET['batsman']){
        
            $error.="Batsman field is empty.<br>";
            
        }
        
        if(!$error){
            
                $batsman = $_GET['batsman'];
                $a = $_SESSION["BAT ".$_SESSION["batteam"]];

                if($_GET['select'] == 'bowled' or $_GET['select'] == 'stump' or $_GET['select'] == 'lbw' or $_GET['select'] == 'hit'){
                        
                        $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][4]=$_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][4]+1;
                        array_push($_SESSION["BAT ".$_SESSION['batteam']],[$batsman,0,0,0,0]);
                        $_SESSION['strikerindex'] = sizeof($_SESSION["BAT ".$_SESSION['batteam']])-1; 
                        

                        
                    
                    
                }
                
                else if($_GET['select'] == 'striker'){
                    
                        $_SESSION[$_SESSION["batteam"]."runs"]=$_SESSION[$_SESSION["batteam"]."runs"]+$_SESSION['ballrun'];
                        $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3] = $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3]+$_SESSION['ballrun'];
                        $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][1] = $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][1] +$_SESSION['ballrun'];                    
                    if ($_SESSION['ballrun']%2==0){
                    

                        
                   
                        array_push($_SESSION["BAT ".$_SESSION['batteam']],[$batsman,0,0,0,0]);
                        $_SESSION['nonstrikerindex'] = sizeof($_SESSION["BAT ".$_SESSION['batteam']])-1;

                   
                    }
                    else{
                        
                        list($_SESSION['strikerindex'],$_SESSION['nonstrikerindex'])=array($_SESSION['nonstrikerindex'],$_SESSION['strikerindex']);
                        array_push($_SESSION["BAT ".$_SESSION['batteam']],[$batsman,0,0,0,0]);
                        $_SESSION['strikerindex'] = sizeof($_SESSION["BAT ".$_SESSION['batteam']])-1; 

                    }
                        
                    
                }
                
                else if($_GET['select'] == 'nonstriker'){
                    
                        $_SESSION[$_SESSION["batteam"]."runs"]=$_SESSION[$_SESSION["batteam"]."runs"]+$_SESSION['ballrun'];
                        $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3] = $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3]+$_SESSION['ballrun'];
                        $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][1] = $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][1] +$_SESSION['ballrun'];
                        if ($_SESSION['ballrun']%2==0){
                    

                        list($_SESSION['strikerindex'],$_SESSION['nonstrikerindex'])=array($_SESSION['nonstrikerindex'],$_SESSION['strikerindex']);
                        array_push($_SESSION["BAT ".$_SESSION['batteam']],[$batsman,0,0,0,0]);
                        $_SESSION['strikerindex'] = sizeof($_SESSION["BAT ".$_SESSION['batteam']])-1; 
                        

                   
                    }
                    else{
                        
                        array_push($_SESSION["BAT ".$_SESSION['batteam']],[$batsman,0,0,0,0]);
                        $_SESSION['nonstrikerindex'] = sizeof($_SESSION["BAT ".$_SESSION['batteam']])-1; 

                        
                    }
                    
                }
                
                else if($_GET['select'] == 'catch'){
                        $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][4]=$_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][4]+1;
                    
                    if ($_GET['crossed']== on){
                        
                            list($_SESSION['strikerindex'],$_SESSION['nonstrikerindex'])=array($_SESSION['nonstrikerindex'],$_SESSION['strikerindex']);
                            array_push($_SESSION["BAT ".$_SESSION['batteam']],[$batsman,0,0,0,0]);
                            $_SESSION['nonstrikerindex'] = sizeof($_SESSION["BAT ".$_SESSION['batteam']])-1;
                        
                    }
                    
                    else{
                        
                        array_push($_SESSION["BAT ".$_SESSION['batteam']],[$batsman,0,0,0,0]);
                        $_SESSION['strikerindex'] = sizeof($_SESSION["BAT ".$_SESSION['batteam']])-1; 
                        
                    }
                    
                    
                }
                                    $_SESSION[$_SESSION["batteam"]."wickets"]=$_SESSION[$_SESSION["batteam"]."wickets"]+1;

                if ($_SESSION[$_SESSION["batteam"]."wickets"]==$_SESSION['players']-1){
                                
                                if ($_SESSION['inning']=="2"){
                                    
                                    if ($_SESSION[$_SESSION["batteam"]."runs"]>=($_SESSION[$_SESSION["bowlteam"]."runs"]+1)){
                
                                        echo '<script>alert("Congrats Team '.$_SESSION["bowlteam"].'\nYou won the match")</script>';
                                        session_destroy();
                                        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                                        
                                    }
            
                                    if ($_SESSION[$_SESSION["batteam"]."runs"]<($_SESSION[$_SESSION["bowlteam"]."runs"])){
                                        
                                        echo '<script>alert("Congrats Team '.$_SESSION["bowlteam"].'\nYou won the match")</script>';
                                        session_destroy();
                                        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                                    }
                                    
                                    if ($_SESSION[$_SESSION["batteam"]."runs"]==($_SESSION[$_SESSION["bowlteam"]."runs"])){
                                        
                                        echo '<script>alert("Match Tied")</script>';
                                        session_destroy();
                                        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                                        
                                    }
                                    
                                }
                                
                                list($_SESSION['batteam'],$_SESSION['bowlteam'])=array($_SESSION['bowlteam'],$_SESSION['batteam']);
                                    $_SESSION['strikerindex'] = 0;
                                    $_SESSION['nonstrikerindex'] = 1;
                                    $_SESSION['bowlerindex'] = 0;
                                    $_SESSION['inning'] = "2";
                                    echo "<script type='text/javascript'> document.location = 'player.php'; </script>";

                            }
                else{
                
                if ($_SESSION[$_SESSION["bowlteam"]."overballs"]==6){
                            
                                echo "<script type='text/javascript'> document.location = 'bowler.php'; </script>";
                
                        }
                else{
                    echo "<script type='text/javascript'> document.location = 'match.php'; </script>";

                }
                
                
                }
                    
                }
            
            
        
        
        else{
            
            $error="You had following errors:<br>".$error;
            
            
        }
    }
        
    
    
        print_r($_SESSION);


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
          
          .players{
              
              margin-left: 8px;
              margin-right: 8px;
              background-color: white;
              height: 250px;
              border-radius: 15px;
              padding: 15px;
              padding-top:0px;
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
      
      <form>
      <div class="players">
            <label for="select"><span  style="margin-top:5px;display:inline-block;color: forestgreen;">How wicket fall?</span></label>
            <select class="custom-select" name="select" id="select" style="border:none;width: 100%;outline: none;margin-bottom: 15px;margin-top: 15px;padding:0px"> 
                  <option selected value="bowled">Bowled</option>
                  <option value="catch">Catch Out</option>
                  <option value="striker">Run out striker</option>
                  <option value="nonstriker">Run Out non-striker</option>
                  <option value="stump">Stumping</option>
                  <option value="lbw">LBW</option>
                  <option value="hit">Hit Wicket</option>
            </select>
            <div id="checkbox"></div>
            <label for="batsman"><span  style="color: forestgreen;">Select a new batsman</span></label>
          <input type="text" style="border-top: none;border-right: none; border-left: none; border-bottom: 1px solid black;width: 100%;outline: none;margin-bottom: 15px;margin-top: 15px" placeholder="Player Name" id="batsman" name="batsman">

            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Done</button>



        </form>
      </div>
      


      
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      
      <script type="text/javascript">
     
       
        $("#select").change(function(){
            if ($("#select").val()=="catch"){
                 var check = $('<div class="custom-control custom-checkbox custom-control-inline" id="dynamic"><input type="checkbox" name="crossed" class="custom-control-input" id="crossed"><label class="custom-control-label" for="crossed">Did Batsman Crossed?</label></div>');
                 check.appendTo('#checkbox');

            }
            else{
            
                $("#dynamic").remove();
                
            }
        });
   
      

   
      
      </script>
  </body>
</html>
