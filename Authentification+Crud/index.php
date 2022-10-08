<!DOCTYPE html>
<html lang="en">
<head>
    <style>
   
.tracking-in-expand{animation:tracking-in-expand 2.7s cubic-bezier(.215,.61,.355,1.000) both}
@keyframes tracking-in-expand{0%{letter-spacing:-.5em;opacity:0}
                              40%{opacity:.6}
                              100%{opacity:1}}

.wobble-hor-bottom{animation:wobble-hor-bottom 1s both}
@keyframes wobble-hor-bottom{0%,
                             100%{transform:translateX(0);transform-origin:50% 50%}
                             15%{transform:translateX(-30px) rotate(-6deg)}30%{transform:translateX(15px) rotate(6deg)}
                             45%{transform:translateX(-15px) rotate(-3.6deg)}60%{transform:translateX(9px) rotate(2.4deg)}
                             75%{transform:translateX(-6px) rotate(-1.2deg)}}

.fade-in{animation:fade-in 3s cubic-bezier(.39,.575,.565,1.000) both}
@keyframes fade-in{0%{opacity:0}100%{opacity:1}}

        @media (max-width:640px) {
            .frm{
                width:600px;
                display:flex;
                justify-content:center;
            }

           .div{
            width:300px
           }

           img{
            width:250px
           }

           
            
        }

        @media (max-width:290px) {
          

           .div{
            width:200px
           }

           img{
            width:150px
           }
            
        }

        
        
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com/"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"  rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
   
    <title>Document</title>
</head>
<?php




    

    if(isset($_POST['search'])){
     $key=$_POST['key'];
      $sql_statment = $pdo->prepare("SELECT * FROM product WHERE product_name like :keyword ORDER BY product_name");
      $sql_statment->bindValue(':keyword','%'.$key.'%',PDO::PARAM_STR);
      $sql_statment->execute();
      $result=$sql_statment->fetchAll();
   

       }
   
   ?> 

<body class="fade-in bg-[#ddb05e] ">
    <?php require('./nav.php'); 
      ?>
    
<h1 class="tracking-in-expand text text-center font-bold text-blue-700 text-5xl underline underline-offset-4 decoration-sky-500 mt-4 ">Add Product</h1>
   <div class="frm  sm:w-2/4 container mx-auto">
   <form method="POST" enctype="multipart/form-data" class="wobble-hor-bottom text-center mt-8 border-solid border-2 px-8 pb-8 pt-4 bg-orange-400 border-solid border-2 border-black rounded-lg ">
    
   <?php
   require('./cnx.php');
 if ((isset($_POST['btn']))){
       
       $product_name=$_POST['product_name'];
       $product_price=$_POST['product_price'];
      
       $img=$_FILES['image']['name'];
       $img = filter_var($img, FILTER_SANITIZE_STRING);
       $img_tmp_name = $_FILES['image']['tmp_name'];
       $img_folder = 'uploaded_img/'.$img;
       
            if (empty($product_name) || empty($product_price) || empty($img)) { ?>
                    <h1 class="wobble-hor-bottom text-red-900 text-center font-bold text-xl  ">Empty Fields</h1>
                  
           <?php } else {
            $sql="INSERT INTO product VALUES(null,?,?,?)";
            $sql_statment=$pdo->prepare($sql);
            $sql_statment->execute([$product_name,$product_price,$img]);
            move_uploaded_file($img_tmp_name, $img_folder);
            }
            
         
 }?>

<?php
    

      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql_statment = $pdo->prepare("DELETE FROM product WHERE id = ?");
        $sql_statment->execute([$id]);
         }
     
     ?>
       <input class="mt-2 rounded pl-2 border-solid border-2 border-black" require type="text" placeholder="Product Name" name="product_name"><br>
       <input class="mt-2 rounded pl-2 border-solid border-2 border-black" require type="text" placeholder="Product Price" name="product_price"><br>
       <input class="file mt-2 w-44 rounded  border-solid border-2 border-black" require type="file"  name="image" accept="image/jpg, image/jpeg, image/png"><br>
        <input class="mt-4 rounded-lg px-2 py-1  bg-black text-white w-32" value="Add Product"  type="submit" name="btn">

    </form>
   </div>
   <div class="border-solid border-4 border-black mt-14 "></div>
    <div>
        <form  class="float-right">
        <i class="fa-solid fa-magnifying-glass pr-1 bg-black text-white w-6 h-6 text-center flex justify-center py-1 pl-1"></i><input type="search" name="key" class="mt-2 rounded pl-2 border-solid border-2 border-black  ">
        <a class="text-center text-white font-bold bg-blue-700 border-solid border-2 border-black p-1 px-2  rounded-lg ml-2 mr-8 cursor-pointer" name="search">Search</a>
        </form>
    </div>
      <section class="grid grid-cols-1 lg:grid-cols-4 sm:grid-cols-2 mt-16">

   <?php
      $sql_statment = $pdo->prepare("SELECT * FROM product");
      $sql_statment->execute();
      if($sql_statment->rowCount() > 0){
       while($tab = $sql_statment->fetch(PDO::FETCH_ASSOC)){  
   ?>
    <div class="div p-2 m-2 bg-white mx-auto lg:mx-4 border-solid border-2 border-black ">
       <div class="absolute font-bold  bg-red-700 w-10 text-center rounded-lg ">$<?= $tab['product_price']; ?></div>
        <img class="md:w-64 sm:w-52 mx-auto h-52" src="uploaded_img/<?= $tab['img']; ?>" alt="">
        <div class="text-center font-bold my-2 "><?= $tab['product_name']; ?></div>
        <div class="border-solid border-2 border-black w-3/4 mx-auto " ></div>
   <div class="mt-2 flex justify-center mr-2  ">
      <a class="text-center text-white font-bold bg-green-700 border-solid border-2 border-black p-1 px-2  rounded-lg ml-2" href="update.php?id=<?= $tab['id']; ?>" >Update</a>
      <a class="text-center text-white font-bold bg-red-700  border-solid border-2 border-black p-1 px-2 rounded-lg ml-2" href="index.php?id=<?= $tab['id']; ?>" onclick="return confirm('delete this product?');">Delete</a>
   </div>
    </div>

  <?php  }}
  else {?>
           <div class="   bg-orange-500 mt-4 py-4 rounded-lg col-span-4 container mx-auto border-solid border-4 border-red-700">
                  <p class="text-center font-bold">No products added yet!</p>
           </div>
   <?php } ?>


 
</section>

  
  



</body>
</html>