<?php


    session_start();

    if (!$_SESSION['index'] or !$_SESSION['player'] or !$_SESSION['match']){
        
        
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        
    }

    $error="";
    if(array_key_exists("submit",$_GET)){
        
        if(!$_GET['bowler']){
        
            $error.="Bowler field is empty.<br>";
            
        }
        
        if(!$error){
            
                $bowler = trim($_GET['bowler']);
                $a = $_SESSION["BOWL ".$_SESSION["bowlteam"]];
                  
                $status = false;
                
                $i=0;
                
                while ($i<sizeof($a)){
                
                  if ($a[$i][0]==$bowler){
                    
                      $status = true;
                      break;
                      
                    }
                  $i+=1;
                  
                }
                
                if ($status){
                    
                    $_SESSION['bowlerindex']=$i;
                    
                }
                
                else{
                    
                    $_SESSION['bowlerindex']=sizeof($a);
                    array_push($_SESSION["BOWL ".$_SESSION['bowlteam']],[$bowler,0,0,0,0]);
                    
                }

                $_SESSION[$_SESSION["bowlteam"]."overballs"]=0;
                $_SESSION[$_SESSION["bowlteam"]."over"] = $_SESSION[$_SESSION["bowlteam"]."over"]+1;
                list($_SESSION['strikerindex'],$_SESSION['nonstrikerindex'])=array($_SESSION['nonstrikerindex'],$_SESSION['strikerindex']);

                echo "<script type='text/javascript'> document.location = 'match.php'; </script>";

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
          
          .players{
              
              margin-left: 8px;
              margin-right: 8px;
              background-color: white;
              height: 150px;
              border-radius: 15px;
              padding: 15px;
              padding-top:0px;
          }

          ::placeholder{
              
              color: #D3D3D3;
              
          }
          
      </style>
    <title>New Bowler</title>
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
            <label for="bowler"><span  style="color: forestgreen;">Select a new bowler</span></label>
          <input type="text" style="border-top: none;border-right: none; border-left: none; border-bottom: 1px solid black;width: 100%;outline: 0;margin-bottom: 15px;margin-top: 15px" placeholder="Player Name" id="bowler" name="bowler">

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
          
      
          
          
   
      
      </script>
  </body>
</html>
