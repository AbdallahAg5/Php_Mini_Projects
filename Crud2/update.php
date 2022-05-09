<!DOCTYPE html>
<html lang="en">


<?php
       
       include('cnx.php');
       include('nav.php');
       
        ?>  
<body>

  
               
<?php 
$query = 'SELECT * FROM person
              WHERE
            id ='.$_GET['id'];
            $result = mysqli_query($cnx, $query) or die(mysqli_error($cnx));
              while($row = mysqli_fetch_array($result))
              {   
             
                $i= $row['nome'];
                $a=$row['secnome'];
                
             
              }
              
              $id = $_GET['id'];
              
?>

<?php

if (isset($_POST['sub'])){
$fname = $_POST['nome'];
$lname = $_POST['secnome'];
$id = $_GET['id'];

   include('cnx.php');
$query = 'UPDATE person set nome ="'.$fname.'",
secnome ="'.$lname.'" WHERE
id ="'.$id.'"';
$result = mysqli_query($cnx, $query) or die(mysqli_error($cnx));
header('location: ./index.php');
}
?>

<div class="container text-center mt-5 col-4">
   <form class="border border-dark p-3 " method='post'>
   <h1 class="bg-dark text-light p-2 mb-3">Form</h1>
<div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name='nome' value="<?php echo $i; ?>">
    
  </div>
  <div class="mb-3">
    <label  class="form-label">SecondName</label>
    <input type="text" class="form-control"  name='secnome' value="<?php echo $a; ?>">
  </div>
 <button type="submit" class="btn btn-primary" name='sub'>Submit</button>
</form>
   </div> 
              
  

</body>

</html>