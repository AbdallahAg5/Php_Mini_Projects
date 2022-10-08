<!DOCTYPE html>
<html lang="en">
<head>
    <style>
.tracking{animation:tracking 1.5s cubic-bezier(.215,.61,.355,1.000) both}   
@keyframes tracking{0%{letter-spacing:-.5em;opacity:0}40%{opacity:.4}100%{opacity:1}}

  
.wobble-hor-bottom{animation:wobble-hor-bottom .8s both}
@keyframes wobble-hor-bottom{0%,
                             100%{transform:translateX(0);transform-origin:50% 50%}
                             15%{transform:translateX(-30px) rotate(-6deg)}30%{transform:translateX(15px) rotate(6deg)}
                             45%{transform:translateX(-15px) rotate(-3.6deg)}60%{transform:translateX(9px) rotate(2.4deg)}
                             75%{transform:translateX(-6px) rotate(-1.2deg)}}

 
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
<body class="fade-in bg-orange-200 ">
<h1 class="tracking text text-center font-bold text-5xl underline underline-offset-4 decoration-sky-500 mt-4 ">LogIn Page</h1>
   <div class="flex justify-center">
   <form method="POST" class="text-center mt-32 border-solid border-2 px-8 pb-8 pt-4 bg-orange-400 border-solid border-2 border-black rounded-lg ">
    
   <?php
require('cnx.php');
if ((isset($_POST['btn']))) {
    $email=$_POST['email'];
    $password=$_POST['pass'];

    if(empty($email) || empty($password)){ ?>
        <h1 class="wobble-hor-bottom text-red-900 text-center font-bold text-xl  ">Empty Fields</h1>
     <?php }
     else{
          $sql="SELECT * FROM user WHERE email=? AND pass=?";
          $sql_statment=$pdo->prepare($sql);
          $sql_statment->execute([$email,$password]);
          $count=$sql_statment->rowCount();
          if($count>0){
            session_start();
            $_SESSION['data']=$sql_statment->fetch(PDO::FETCH_ASSOC);
            header('location: index.php');
          }
          else{?>
            <h1 class="wobble-hor-bottom text-red-900 text-center font-bold text-xl  ">Unknown User</h1>
         <?php }

     }
} ?>
  

       <input class="mt-2 rounded pl-2 border-solid border-2 border-black"  type="text" placeholder="Email" name="email"><br>
       <input class="mt-2 rounded pl-2 border-solid border-2 border-black"  type="text" placeholder="PassWord" name="pass"><br>
       <input class="mt-4 rounded-lg px-2 py-1  bg-black text-white w-32" value="LogIn Now"  type="submit" name="btn"><br>
       <h2 class="mt-6 font-bold text-sm">You don't have an account? <a href="./signup.php"><span class="text-sky-50 underline underline-offset-2 decoration-sky-50">Register Now</span></a></h2>

    </form>
   </div>
</body>
</html>