<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .nav{
            position: absolute;
            z-index: 1000;
        }
    </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com/"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"  rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Document</title>
</head>
<body>
    
<?php 

 session_start(); 
 if (!isset($_SESSION['data']['first_name'])) {
    header('location: login.php');
}
?>
<section class=" bg-[#ddb05e] md:h-screen">
    <nav class="flex  mx-auto w-full ">
        <div class="container mx-auto flex">
       <h1 class="container mx-auto text-xl bold font-bold  mt-2 px-3">Welcome <?php echo $_SESSION['data']['first_name'] ?> 👋</h1>
        <i id="icon" class="cursor-pointer mt-3 px-8 fa-solid fa-bars text-lg"></i>
        </div>
        <div class="nav w-full">
            
            <ul id="ul1" class="w-full pt-10 text-center font-bold  bg-black h-screen pt-44 text-3xl text-white  opacity-90 ">
                <i id="icon1" class="cursor-pointer mt-3 px-8 fa-solid fa-xmark  text-lg"></i>
                <li class="py-8 "><a href="./index.php">Home</a></li>
                <li><a href="./logout.php">LogOut</a></li>
         </ul>
        </div>
     </nav>


 <script>
     $(document).ready(function(){
        $('#ul1').hide()
        $('#icon').click(function(){
        $('#ul1').slideDown()})

     $('#icon1').click(function(){
        $('#ul1').slideUp()
     })})
            
</script>
</body>
</html>