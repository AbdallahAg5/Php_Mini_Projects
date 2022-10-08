<!DOCTYPE html>
<html lang="en">
<head>
<style>
  h1{
    
  }
.tracking-in-expand{animation:tracking-in-expand 2.7s cubic-bezier(.215,.61,.355,1.000) both}



@keyframes tracking-in-expand{0%{letter-spacing:-.5em;opacity:0}
                              40%{opacity:.6}
                              100%{opacity:1}}

.fade-in{animation:fade-in 3s cubic-bezier(.39,.575,.565,1.000) both}
@keyframes fade-in{0%{opacity:0}100%{opacity:1}}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com/"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"  rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    
    <title>Document</title>
</head>
<body class="fade-in">


<?php



require('./nav.php');
require('cnx.php');
$id=$_GET['id'];
$sql="SELECT * FROM product WHERE id=?";
$sql_statment=$pdo->prepare($sql);
$sql_statment->execute([$id]);
$tab=$sql_statment->fetch(PDO::FETCH_OBJ);
?>
<?php

if ((isset($_POST['btn']))) {
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
   if (empty($product_name) || empty($product_price)){ ?>
      <p>error</p>
 <?php }
  else{
    $sql="UPDATE product SET product_name=?, product_price=? where id=?";
    $sql_statment=$pdo->prepare($sql);
    $sql_statment->execute([$product_name,$product_price,$id]);
    header('location:index.php');
    
  }}?>
  <p class="tracking-in-expand tracking relative text-center font-bold text-blue-700 text-5xl underline underline-offset-4 decoration-sky-500 mt-4 ">Update Product</p>
<div class="frm  sm:w-2/4 container mx-auto">
<form  method="POST" class="text-center mt-8 border-solid border-2 px-8 pb-8 pt-4 bg-orange-400 border-solid border-2 border-black rounded-lg ">
    <label for=""  class="font-bold">Product Name</label><br>
<input type="text" class="mb-4 rounded pl-2 border-solid border-2 border-black" require name="product_name"  value="<?php echo $tab->product_name ?>"><br>
<label for="" class="font-bold">Product Price</label><br>
<input type="text" class=" rounded pl-2 border-solid border-2 border-black" require name="product_price" value="<?php echo $tab->product_price ?>"><br>
<input type="submit" value="Update" class="mt-4 rounded-lg px-2 py-1  bg-black text-white w-32" name='btn'>
</form>
</div>





</body>
</html>