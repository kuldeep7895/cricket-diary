<?php

    session_start();
    if (!$_SESSION['index'] or !$_SESSION['player'] or !$_SESSION['match']){
        
        
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        
    }
    if (array_key_exists('back',$_GET)){
            
                echo "<script type='text/javascript'> document.location = 'match.php'; </script>";
                
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
          
         
          .playCard{
              
              
              margin-left: 8px;
              margin-right: 8px;
              margin-top:8px;
              background-color: white;
              border-radius: 20px;
              padding: 15px;
              
          }
          thead{
              border-bottom: 1px solid #909090; 
              margin-top:5px;
          }
          
          table{
              
              table-layout:fixed;
              
          }
          
      
  
        

      </style>
    <title>Runs n Wickets</title>
  </head>
  <body>
  

      <nav class="navbar navbar-expand navbar-light justify-content-center" style="background-color: #2E7D32;">
      
        <?php
          echo '<a class="navbar-brand" href="#"><span style="font-size: 100%;color: white;">'.$_SESSION["hostTeam"].' v/s '.$_SESSION["visitorTeam"].'</span> </a>';
        ?>
        
        
      </nav>
      <?php
        echo '<label for="select"><span  style="margin-top:7px;margin-left:11px;display:inline-block;font-weight:bold;">'.$_SESSION['batteam'].' Batting </span></label>';
    ?>
</div>
      <div class="playCard">
     
     <?php

$myarr = $_SESSION["BAT ".$_SESSION["batteam"]];
echo '<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col" colspan="3">Batsman</th>
      <th scope="col" >R</th>
      <th scope="col" >B</th>
      <th scope="col" >4s</th>
      <th scope="col" >6s</th>
    </tr>
  </thead>
  <tbody>';
$i=0;
while ($i<sizeof($myarr)){
    $array = $myarr[$i];
    echo "<tr>";
    $index = 0;
    foreach($array as $values)
    {
    
        if ($index == 0){
            
            echo '<th scope="col" colspan="3" style="color:forestgreen">'.$values.'</th>';
            
        }

        else{
            echo "<td>".$values."</td>";
        }
        $index=$index+1;
    }
    
    echo "</tr>";
$i = $i + 1;

}

echo '</tbody></table>';

?>

</div>


</div>

 
      <?php
        echo '<label for="select"><span  style="margin-top:7px;margin-left:11px;display:inline-block;font-weight:bold;">'.$_SESSION['bowlteam'].' Bowling </span></label>';
    ?>
      <div class="playCard">
     
     <?php
    

$myarr = $_SESSION["BOWL ".$_SESSION["bowlteam"]];
echo '<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col" colspan="3">Bowler</th>
      <th scope="col" >O</th>
      <th scope="col" >M</th>
      <th scope="col" >R</th>
      <th scope="col" >W</th>
    </tr>
  </thead>
  <tbody>';
$i=0;
while ($i<sizeof($myarr)){
    $array = $myarr[$i];
    echo "<tr>";
    $index = 0;
    foreach($array as $values)
    {
    
        if ($index == 0){
            
            echo '<th scope="col" colspan="3" style="color:forestgreen">'.$values.'</th>';
            
        }

        else{
            echo "<td>".$values."</td>";
        }
        $index=$index+1;
    }
    
    echo "</tr>";
$i = $i + 1;

}

echo '</tbody></table>';

?>

</div>


i     
<?php
        echo '<label for="select"><span  style="margin-top:7px;margin-left:11px;display:inline-block;font-weight:bold;">'.$_SESSION['bowlteam'].' Batting </span></label>';
    ?>
</div>
      <div class="playCard">

     
     <?php
    
    
$myarr = $_SESSION["BAT ".$_SESSION["bowlteam"]];
echo '<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col" colspan="3">Batsman</th>
      <th scope="col" >R</th>
      <th scope="col" >B</th>
      <th scope="col" >4s</th>
      <th scope="col" >6s</th>
    </tr>
  </thead>
  <tbody>';
$i=0;
while ($i<sizeof($myarr)){
    $array = $myarr[$i];
    echo "<tr>";
    $index = 0;
    foreach($array as $values)
    {
    
        if ($index == 0){
            
            echo '<th scope="col" colspan="3" style="color:forestgreen;">'.$values.'</th>';
            
        }

        else{
            echo "<td>".$values."</td>";
        }
        $index=$index+1;
    }
    
    echo "</tr>";
$i = $i + 1;

}

echo '</tbody></table>';

?>

</div>


</div>

 
      <?php
        echo '<label for="select"><span  style="margin-top:7px;margin-left:11px;display:inline-block;font-weight:bold;">'.$_SESSION['batteam'].' Bowling </span></label>';
    ?>
      <div class="playCard">
     
     <?php
    

$myarr = $_SESSION["BOWL ".$_SESSION["batteam"]];
echo '<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col" colspan="3">Bowler</th>
      <th scope="col" >O</th>
      <th scope="col" >M</th>
      <th scope="col" >R</th>
      <th scope="col" >W</th>
    </tr>
  </thead>
  <tbody>';
$i=0;
while ($i<sizeof($myarr)){
    $array = $myarr[$i];
    echo "<tr>";
    $index = 0;
    foreach($array as $values)
    {
    
        if ($index == 0){
            
            echo '<th scope="col" colspan="3" style="color:forestgreen">'.$values.'</th>';
            
        }

        else{
            echo "<td>".$values."</td>";
        }
        $index=$index+1;
    }
    
    echo "</tr>";
$i = $i + 1;

}

echo '</tbody></table>';

?>



</div>
<form>
<button type="submit" name="back" class="btn btn-primary btn-lg btn-block" style="margin-top:5px;margin-bottom:5px;">Back</button>
</form>

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
