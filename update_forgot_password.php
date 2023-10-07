<?php
if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
{
    require_once __DIR__ . "/Helpers/DB.php";
    $connection = DB::connect();
   
    $emailId = $_POST['email'];
 
    $token = $_POST['reset_link_token'];
   
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM `utenti` WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'";
    $statement = $connection->prepare($sql);
    $statement -> execute();
    $result = $statement->get_result(); 

    $row =  mysqli_fetch_array($result);
 
   if($result->num_rows > 0){
 
       $query = "UPDATE utenti set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $emailId . "'";
       $statement = $connection->prepare($query);
       $statement -> execute();
           header('Location: index.php');
       }else{
          echo "<p>Something goes wrong. Please try again</p>";
          DB::disconnect($connection);
       }
   } else{
    echo "<p>No result</p>";
    DB::disconnect($connection);
   }
?>