<?php

    session_start();
    
    if (!$_SESSION['index'] or !$_SESSION['player']){
        
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        
    }
    else{
        
        $_SESSION['match'] = true;
        
    }
    
    if (!isset($_SESSION[$_SESSION["hostTeam"]."runs"])){
        $_SESSION[$_SESSION["hostTeam"]."runs"]=0;
    
    }
    
    if (!isset($_SESSION[$_SESSION["hostTeam"]."wickets"])){
        $_SESSION[$_SESSION["hostTeam"]."wickets"]=0;
    
    }
        
    if (!isset($_SESSION[$_SESSION["visitorTeam"]."over"])){
        $_SESSION[$_SESSION["visitorTeam"]."over"]=0;
    }
    
    if (!isset($_SESSION[$_SESSION["visitorTeam"]."overballs"])){
        $_SESSION[$_SESSION["visitorTeam"]."overballs"]=0;
    }
    
    if (!isset($_SESSION[$_SESSION["visitorTeam"]."runs"])){
    
        $_SESSION[$_SESSION["visitorTeam"]."runs"]=0;
    
    }
    
    if (!isset($_SESSION[$_SESSION["visitorTeam"]."wickets"])){
    
        $_SESSION[$_SESSION["visitorTeam"]."wickets"]=0;
    
    }
    
    if (!isset($_SESSION[$_SESSION["hostTeam"]."over"])){
    
        $_SESSION[$_SESSION["hostTeam"]."over"]=0;
    
    }
    
    if (!isset($_SESSION[$_SESSION["hostTeam"]."overballs"])){
    
        $_SESSION[$_SESSION["hostTeam"]."overballs"]=0;
    
    }
    
    
    if (!isset($_SESSION['strikerindex'])){
    
        $_SESSION['strikerindex']=0;
    
    }
    

    if (!isset($_SESSION['nonstrikerindex'])){
    
        $_SESSION['nonstrikerindex']=1;
    
    }
    
    if (!isset($_SESSION['bowlerindex'])){
    
        $_SESSION['bowlerindex']=0;
    
    }
    
                
           
            $thisover=0;
            if (array_key_exists('new',$_GET)){
            
                session_destroy();

                echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                
            }
            
            if (array_key_exists('retire',$_GET)){
            
                echo "<script type='text/javascript'> document.location = 'retire.php'; </script>";
                
            }
            
            if (array_key_exists('scoreboard',$_GET)){
            
                echo "<script type='text/javascript'> document.location = 'scoreboard.php'; </script>";
                
            }
            
            if (array_key_exists('runs',$_GET)){
                
                if(!($_GET['wicket']== on)){
                    
                    
                $runs = 0;
                
                $runs = $_GET['runs'];
            
                if($_GET['byes']== on or $_GET['legbyes'] == on or $_GET['wide'] == on){
                    
                    if($_GET['wide'] == on ){
                            
                        $_SESSION[$_SESSION["batteam"]."runs"]=$_SESSION[$_SESSION["batteam"]."runs"]+1+$runs;
                        $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3] = $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3]+1+$runs;
                        $thisover=$thisover+1+$runs;
                            
                    }
                        
                    else{
                            
                        $_SESSION[$_SESSION["batteam"]."runs"]=$_SESSION[$_SESSION["batteam"]."runs"]+$runs;
                        $_SESSION[$_SESSION["bowlteam"]."overballs"]=$_SESSION[$_SESSION["bowlteam"]."overballs"]+1;
                        
                        $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][2] = $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][2] +1;
                        $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][1] = $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][1]+0.1;
                        $thisover=$thisover+$runs;
                    }
                    
            }
                
                else {


                    if($_GET['noball'] == on ){

                        $_SESSION[$_SESSION["batteam"]."runs"]=$_SESSION[$_SESSION["batteam"]."runs"]+1+$runs;
                        $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3] = $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3]+1+$runs;

                        $thisover=$thisover+1+$runs;

                    }

                    else{

                        $_SESSION[$_SESSION["batteam"]."runs"]=$_SESSION[$_SESSION["batteam"]."runs"]+$runs;
                        $_SESSION[$_SESSION["bowlteam"]."overballs"]=$_SESSION[$_SESSION["bowlteam"]."overballs"]+1;
                        $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][2] = $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][2] +1;
                        $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][1] = $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][1]+0.1;
                        $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3] = $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3]+$runs;
                        $thisover=$thisover+$runs;
                        if ($runs==4){
                            
                            $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][3] = $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][3] +1;

                            
                        }
                        
                        if ($runs==6){
                            
                            $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][4] = $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][4] +1;

                            
                        }

                    }

                    $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][1] = $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][1] +$runs;
                    

                }
            
                   
                if ($runs%2!=0){
                    

                    list($_SESSION['strikerindex'],$_SESSION['nonstrikerindex'])=array($_SESSION['nonstrikerindex'],$_SESSION['strikerindex']);
                    

                }
                
                
                
                
                if ($_SESSION[$_SESSION["bowlteam"]."overballs"]==6){
                    
                    
                            $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][1] = round($_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][1]);
                            
                            if ($thisover==0){
                                
                                $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][2] = $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][2]+1;
            
                                
                            }
                            $a=$_SESSION[$_SESSION["bowlteam"]."over"];
                            $b=$_SESSION[$_SESSION["bowlteam"]."overballs"];
                            
                            if ((round($a.".".$b) == $_SESSION['over'])){
                             
                                if ($_SESSION['inning']=="2"){
            
                                    if ($_SESSION[$_SESSION["batteam"]."runs"]<($_SESSION[$_SESSION["bowlteam"]."runs"])){
                                        
                                        echo '<script>alert("hi")</script>';
                                        echo '<script>alert("Congrats Team '.$_SESSION["batteam"].'\nYou won the match")</script>';
                                        session_destroy();
                                        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                                    }
                                    
                                    if ($_SESSION[$_SESSION["batteam"]."runs"]==($_SESSION[$_SESSION["bowlteam"]."runs"])){
                                        
                                        echo '<script>alert("Match Tied")</script>';
                                        session_destroy();
                                        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                                        
                                    }
                                    
                                }
                                
                            }
                            
                            if ((round($a.".".$b) == $_SESSION['over']) and $_SESSION['inning']=="1"){
                                
                                echo '<script type="text/javascript">alert(kjbkj"' . $msg . '")</script>';

                                list($_SESSION['batteam'],$_SESSION['bowlteam'])=array($_SESSION['bowlteam'],$_SESSION['batteam']);
                                    $_SESSION['strikerindex'] = 0;
                                    $_SESSION['nonstrikerindex'] = 1;
                                    $_SESSION['bowlerindex'] = 0;
                                    $_SESSION['inning'] = "2";
                                                    echo "<script type='text/javascript'> document.location = 'player.php'; </script>";

                            }
                            else{
                             
                                echo "<script type='text/javascript'> document.location = 'bowler.php'; </script>";
                            
                                
                            }
            
                    
                }
            
            
            
            
                
            }
            
            
            
            else{
                
                if($_GET['wide'] == on ){
                 
                        $_SESSION[$_SESSION["batteam"]."runs"]=$_SESSION[$_SESSION["batteam"]."runs"]+1;
                        $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3] = $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3]+1;
                        $thisover=$thisover+1;
                    
                }
    
                else{
                    
                    $_SESSION[$_SESSION["bowlteam"]."overballs"]=$_SESSION[$_SESSION["bowlteam"]."overballs"]+1;
                    $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][2] = $_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][2] +1;
                    $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][1] = $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][1]+0.1;

                if ($_SESSION[$_SESSION["bowlteam"]."overballs"]==6){
                    
                $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][1] = round($_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][1]);
                if ($thisover==0){
                    
                $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][2] = $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][2]+1;

                    
                }
                
                            $a=$_SESSION[$_SESSION["bowlteam"]."over"];
                            $b=$_SESSION[$_SESSION["bowlteam"]."overballs"];
                            if ((round($a.".".$b) == $_SESSION['over'])){
                             
                                if ($_SESSION['inning']=="2"){
            
                                    if ($_SESSION[$_SESSION["batteam"]."runs"]<($_SESSION[$_SESSION["bowlteam"]."runs"])){
                                        
                                        echo '<script>alert("hi")</script>';
                                        echo '<script>alert("Congrats Team '.$_SESSION["batteam"].'\nYou won the match")</script>';
                                        session_destroy();
                                        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                                        
                                    }
                                    
                                    if ($_SESSION[$_SESSION["batteam"]."runs"]==($_SESSION[$_SESSION["bowlteam"]."runs"])){
                                        
                                        echo '<script>alert("Match Tied")</script>';
                                        session_destroy();
                                        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                                        
                                    }
                                    
                                }
                                
                            }
                            
                            if ((round($a.".".$b) == $_SESSION['over']) and $_SESSION['inning']=="1"){
                                
                                //echo "<script>alert('hi')</script>";
                                list($_SESSION['batteam'],$_SESSION['bowlteam'])=array($_SESSION['bowlteam'],$_SESSION['batteam']);
                                    $_SESSION['strikerindex'] = 0;
                                    $_SESSION['nonstrikerindex'] = 1;
                                    $_SESSION['bowlerindex'] = 0;
                                    $_SESSION['inning'] = "2";
                                                    echo "<script type='text/javascript'> document.location = 'player.php'; </script>";

                            }   

            }
            
                }
                
                $_SESSION["ballrun"] = $_GET['runs'];
                
                header("LOCATION: wicket.php");
                
            }
                
            }
                
            
            
        if ($_SESSION['inning']=="2"){
            
            if ($_SESSION[$_SESSION["batteam"]."runs"]>=($_SESSION[$_SESSION["bowlteam"]."runs"]+1)){
                
                echo '<script>alert("Congrats Team '.$_SESSION["batteam"].'\nYou won the match")</script>';
                session_destroy();
                echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                
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
          
          .scoreboard{
              
              margin-left: 8px;
              margin-right: 8px;
              margin-top:8px;
              background-color: white;
              height: 70px;
              border-radius: 15px;
              padding: 15px;
              padding-top:0px;
          }

          ::placeholder{
              
              color: #D3D3D3;
              
          }
          .col-4{
              
              float:left;
              
              
          }
          #playCard{
              
              
              margin-left: 8px;
              margin-right: 8px;
              margin-top:8px;
              background-color: white;
              height: 200px;
              border-radius: 20px;
              padding: 15px;
              padding-top:0px;
              
          }
          thead{
              border-bottom: 1px solid #909090; 
              margin-top:5px;
          }
          
          table{
              
              table-layout:fixed;
              
          }
          
          #this-over{
              
              margin-left: 8px;
              margin-right: 8px;
              margin-top:8px;
              background-color: white;
              height: 40px;
              border-radius: 20px;
              padding: 15px;
              padding-top:6px;
              
          }
          
          #options{
              
              margin-left: 8px;
              margin-right: 8px;
              margin-top:8px;
              background-color: white;
              border-radius: 20px;
              padding: 15px;
        
              
          }
          .menu{
              
              margin-left: 8px;
              margin-right: 8px;
              margin-top:8px;
              background-color: white;
              border-radius: 20px;
              padding: 15px;
              height:135px;
              
          }
          
          
          #runscored{
              
              margin-left: 8px;
              margin-right: 8px;
              margin-top:8px;
              background-color: white;
              border-radius: 20px;

              padding: 15px;
            float:left;
              
              
          }
          
          .custom-checkbox .custom-control-input:checked~.custom-control-label::before{
                 background-color:green;
            }
            
            
            
        

      </style>
    <title>My Match</title>
  </head>
  <body>
  

      <nav class="navbar navbar-expand navbar-light justify-content-center" style="background-color: #2E7D32;">
      
        <?php
          echo '<a class="navbar-brand" href="#"><span style="font-size: 100%;color: white;">'.$_SESSION["hostTeam"].' v/s '.$_SESSION["visitorTeam"].'</span> </a>';
        ?>
        
        
      </nav>
      
      <div class="scoreboard row">
     

            <?php
            if ($_SESSION['inning']=='2'){
             echo '<div id="runs" <div class="col-6">';
                
            }
            else{
                echo '<div id="runs" <div class="col-8">';
            }
                        
                        echo $_SESSION["batteam"].'<br>';
                        echo '<span id="batteamruns" style="font-size:250%;position:relative;top:-5px;">'.$_SESSION[$_SESSION["batteam"]."runs"].' - '.$_SESSION[$_SESSION["batteam"]."wickets"].'</span> <span style="position:relative;top:-5px;color:#909090">('.$_SESSION[$_SESSION["bowlteam"]."over"].'.'.$_SESSION[$_SESSION["bowlteam"]."overballs"].')</span>';
                        
            
                
            echo '</div>';
            ?>
            <?php
            if ($_SESSION['inning']=='2'){
             echo '<div class="col-2">';
                
            }
            else{
                echo '<div class="col-4">';
            }

                        if ($_SESSION[$_SESSION["bowlteam"]."over"]!=0 or $_SESSION[$_SESSION["bowlteam"]."overballs"]!=0){
                            echo '<span style="position:relative;top:0px;color:#909090">CRR<br><br>'.round(((6*$_SESSION[$_SESSION["batteam"]."runs"])/($_SESSION[$_SESSION["bowlteam"]."over"]*6+$_SESSION[$_SESSION["bowlteam"]."overballs"])),2).'</span>';
                        }
                        else{
                            
                            echo '<span style="position:relative;color:#909090">CRR<br> <span style="position:relative;top:20px">0.00</span></span>';
                            
                        }
            
            echo '</div>';
            ?>
            <?php
            if ($_SESSION['inning']=='2'){
             echo '<div class="col-2">';
                            
                            echo '<span style="position:relative;color:#909090">Target<br> <span style="position:relative;top:20px">'.($_SESSION[$_SESSION["bowlteam"]."runs"]+1).'</span></span>';
                        
                
            echo '</div>';
            }
            
            ?>
            <?php
            if ($_SESSION['inning']=='2'){
             echo '<div class="col-2">';
                
            
                            echo '<span style="position:relative;color:#909090">RR<br> <span style="position:relative;top:20px">'.round(((6*($_SESSION[$_SESSION["bowlteam"]."runs"]+1))/((6*$_SESSION['over'])-$_SESSION[$_SESSION["bowlteam"]."over"]*6+$_SESSION[$_SESSION["bowlteam"]."overballs"])),2).'</span></span>';
    
                            //echo '<span style="position:relative;top:0px;color:#909090">RR<br><br>'.round(((6*($_SESSION[$_SESSION["bowlteam"]."runs"]+1))/((6*$_SESSION['over'])-$_SESSION[$_SESSION["bowlteam"]."over"]*6+$_SESSION[$_SESSION["bowlteam"]."overballs"])),2).'</span>';
                    
                
                
            echo '</div>';
            }
            
            ?>
     
      </div>
      
      
      <div id="playCard">
         <?php
         
    list($int,$dec)=explode(".", $_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][1]);

    echo ' 
          <table class="table table-sm table-borderless">
  <thead>
    <tr style="color:#909090">
      <th scope="col" colspan="3">Batsman</th>
      <th scope="col">R</th>
      <th scope="col">B</th>
      <th scope="col">4s</th>
      <th scope="col">6s</th>
      <th scope="col">SR</th>
    </tr>
  </thead>
  <tbody>
  
    <tr>
    
      <th scope="row" colspan="3" style="color:forestgreen">'.$_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][0].'</th>
      <td>'.$_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][1].'</td>
      <td>'.$_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][2].'</td>
      <td>'.$_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][3].'</td>
      <td>'.$_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][4].'</td>
      <td>'.round(($_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][1]*100)/$_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['strikerindex']][2]).'</td>
      
    </tr>
    
    <tr>
      <th scope="row" colspan="3" style="color:forestgreen">'.$_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['nonstrikerindex']][0].'</th>
      <td>'.$_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['nonstrikerindex']][1].'</td>
      <td>'.$_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['nonstrikerindex']][2].'</td>
      <td>'.$_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['nonstrikerindex']][3].'</td>
      <td>'.$_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['nonstrikerindex']][4].'</td>
      <td>'.round(($_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['nonstrikerindex']][1]*100)/$_SESSION["BAT ".$_SESSION["batteam"]][$_SESSION['nonstrikerindex']][2]).'</td>
    </tr>
  </tbody>
</table>
<table class="table table-sm table-borderless">
  <thead>
    <tr style="color:#909090">
      <th scope="col" colspan="3">Bowler</th>
      <th scope="col" >O</th>
      <th scope="col" >M</th>
      <th scope="col">R</th>
      <th scope="col">W</th>
      <th scope="col">ER</th>
      
    </tr>
    
  </thead>
  <tbody>
    <tr>
    
      <th scope="row" colspan="3" style="color:forestgreen">'.$_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][0].'</th>
      <td >'.$_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][1].'</td>
      <td>'.$_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][2].'</td>
      <td>'.$_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3].'</td>
      <td>'.$_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][4].'</td>
      <td>'.round((($_SESSION["BOWL ".$_SESSION["bowlteam"]][$_SESSION['bowlerindex']][3]*6)/(6*$int+$dec)),2).'</td>
    </tr>
  </tbody>
</table>
';
?>
          
      </div>
      
      <div id="this-over">
          
          This Over:
          
      </div>
      
      <div id="options">
   
        <form>
        <div class="custom-control custom-checkbox custom-control-inline">
            
          <input type="checkbox" name="wide" class="custom-control-input" id="wide">
          <label class="custom-control-label" for="wide">Wide</label>
        </div>
        
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" name="noball" class="custom-control-input" id="noball">
          <label class="custom-control-label" for="noball">No Ball</label>
        </div>
        
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" name="byes" class="custom-control-input" id="byes">
          <label class="custom-control-label" for="byes">Byes</label>
        </div>
        
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" name="legbyes" class="custom-control-input" id="legbyes">
          <label class="custom-control-label" for="legbyes">Leg Byes</label>
        </div>
        
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" name="wicket" class="custom-control-input" id="wicket">
          <label class="custom-control-label" for="wicket">Wicket</label>
        </div>
      </div>
      
      
          <div class="row align-items-start">
              
            <div class="col-5 menu">
            <button type="submit" class="btn btn-light" style="background-color: #2E7D32;color:white;width:100%" name="retire">Retire</button><br>
            <button type="submit" class="btn btn-light" style="background-color: #2E7D32;color:white;width:100%" name="scoreboard">Scoreboard</button><br>
            <button type="button" class="btn btn-light" style="background-color: #2E7D32;color:white;width:100%">Extras</button>
            </div>
            
            
            <div class="col menu">

            
               <button type="submit" name="runs" class="btn btn-light run-btn" style="border-radius:50%;border:2px solid green;margin-right:4px;margin-bottom:3px" value=0>0</button>
               <button type="submit" name="runs" class="btn btn-light run-btn" style="border-radius:50%;border:2px solid green;margin-right:4px;margin-bottom:3px" value=1>1</button>
               <button type="submit" name="runs" class="btn btn-light run-btn" style="border-radius:50%;border:2px solid green;margin-right:4px;margin-bottom:3px" value=2>2</button>
               <button type="submit" name="runs" class="btn btn-light run-btn" style="border-radius:50%;border:2px solid green;margin-right:4px;margin-bottom:3px" value=3>3</button>
               <button type="submit" name="runs" class="btn btn-light run-btn" style="border-radius:50%;border:2px solid green;margin-right:4px;margin-bottom:3px" value=4>4</button>
               <button type="submit" name="runs" class="btn btn-light run-btn" style="border-radius:50%;border:2px solid green;margin-right:4px;margin-bottom:3px" value=5>5</button>
               <button type="submit" name="runs" class="btn btn-light run-btn" style="border-radius:50%;border:2px solid green;margin-right:4px;margin-bottom:3px" value=6>6</button>
                </form>
            </div>
            </div>
 <div style="clear:both;"></div>

              <form>
        <button type="submit" name="new" class="btn btn-primary btn-lg btn-block" style="margin-top:15px;margin-bottom:5px;">New Match</button>
        </form>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      
      <script type="text/javascript">
          
      
            $(".run-btn").click(function(){
            

            })
          
          
   
      
      </script>
  </body>
</html>
