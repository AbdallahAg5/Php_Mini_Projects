<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php require('./nav.php');
require('./cnx.php');
?>
<div class="container text-center mt-5 col-4">
   <form class="border border-dark p-3 " method='post'>
   <h1 class="bg-dark text-light p-2 mb-3">Form</h1>


<?php
if (isset($_POST['sub'])){
$nome=htmlentities(trim($_POST['nome']));
$secnome=htmlentities(trim($_POST['secnome']));
if (empty($nome) || empty($secnome)){
?>
<div class="alert alert-danger" role="alert">
Empty Fields
</div>

<?php }
else{?>
<div class="alert alert-success" role="alert">
User Added
</div>

<?php

 $requete="INSERT INTO person(`nome`,`secnome`) VALUES ('$nome','$secnome')";
 $query=mysqli_query($cnx,$requete);

 $nome='';
 $secnome='';
}
};


?>

    
  <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name='nome' value='<?php echo (isset($_POST['sub']))? "$nome":  ""; ?>'>
    
  </div>
  <div class="mb-3">
    <label  class="form-label">SecondName</label>
    <input type="text" class="form-control"  name='secnome' value='<?php echo (isset($_POST['sub']))? "$secnome":  ""; ?>'>
  </div>
 <button type="submit" class="btn btn-primary" name='sub'>Submit</button>
</form>
   </div> 
</body>
</html>