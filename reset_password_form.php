<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>New Password</title>
       <!-- CSS -->
     <link rel="stylesheet" href="assets/styles/style.css">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
   </head>

   <body>
     <header class="ps-5 d-flex align-items-center">
          <div id="logo" class="mx-3">
              <img id="logo_img" src="assets/img/Group_181.png" alt="">
          </div>
      </header>
      <main>
        <div class="container">
          <h2 class="text-center pb-4">Aggiorna la password</h2>
            <div class="card p-3">
              <?php
                 if($_GET['key'] && $_GET['token'])
                 {
                   require_once __DIR__ . "/Helpers/DB.php";
     
                   $connection = DB::connect();     
                   if(session_status() === PHP_SESSION_NONE) {
                    session_start();
                 } 
                 $token = $_GET['token'];
                 $email = $_GET['key'];
                 $sql = "SELECT * FROM `utenti` WHERE `reset_link_token`='".$token."' and `email`='".$email."';";
                 $statement = $connection -> prepare($sql);
                 $statement -> execute();
                 $result = $statement->get_result();      
      
                   $curDate = date("Y-m-d H:i:s");
                 $row = mysqli_fetch_array($result);
      
                 if ($result->num_rows > 0 && $row['exp_date'] >= $curDate) {
      
              ?>
                   <form action="update_forgot_password.php" method="post">
                     <input type="hidden" name="email" value="<?php echo $email;?>">
                     <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
                     <div class="form-group d-flex flex-column">
                       <label for="exampleInputEmail1"><strong>Password</strong></label>
                       <input type="password" name='password' class="form-control">
                     </div>                
      
                     <div class="form-group d-flex flex-column">
                       <label for="exampleInputEmail1"><strong>Conferma Password</strong></label>
                       <input type="password" name='password' class="form-control">
                     </div>
                     <div class="text-center my-3">
                       <input type="submit" name="new-password" class="mt-3 py-1 px-2 text-uppercase btn btn-primary">
                     </div>
                   </form>
              <?php
                 } else {?>
                 <p>This forget password link has been expired</p>
              <?php
               DB::disconnect($connection); }}
              ?>
                 </div>
               </div>
           </div>
        </div>
        <div id="ellipse_12">
            <img src="assets/img/Ellipse 12.png" alt="">
        </div>
        <div id="ellipse_13">
            <img src="assets/img/Ellipse 13.png" alt="">
        </div>
        <div id="vector_1">
            <img src="assets/img/Vector 1.png" alt="">
        </div>
        <div id="vector_4">
            <img src="assets/img/Vector 4.png" alt="">
        </div>
        <div id="vector_5">
            <img src="assets/img/Vector 5.png" alt="">
        </div>
        <div id="group_201">
            <img src="assets/img/Group 201.png" alt="">
        </div>
      </main>
   </body>
</html>