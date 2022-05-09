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
<?php require('./nav.php') ;
      require('./cnx.php');
   
?>
<form action="./form.php"><input type="submit" class='btn bg-info text-light m-5' value='Add User'></form>
<table class="table container text-center">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">SecondName</th>
      <th scope="col">Operation</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
         # display all data #
        
        
         $requete="SELECT * FROM people.person";
         $query=mysqli_query($cnx,$requete);
         while ($row=mysqli_fetch_assoc($query)){
             $id=$row['id']; 
             
             ?>
         <tr>
         <td><?php echo $row['id'] ?></td>
         <td><?php echo $row['nome'] ?></td>
         <td><?php echo $row['secnome'] ?></td>
         
         <td><a href='./del.php?id=<?php echo $id ;?>'><input type="submit" value="Delete" class="btn bg-danger text-light"></a>
         <a href='./update.php?id=<?php echo $id ;?>'><input type="submit" value="UpDate" class="btn bg-success text-light"></a>
        </td>
         
         </tr>
         
         
         <?php
         }
         ?>

  </tbody>
</table>

</body>
</html>