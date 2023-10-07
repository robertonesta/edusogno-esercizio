<?php
  require_once __DIR__ . "/Helpers/DB.php";
  require_once __DIR__ . "/Models/Event.php";

  if(session_status() === PHP_SESSION_NONE) {
    session_start();
  }


if(isset($_SESSION["email"])){
    $connection = DB::connect();
    $email = $_SESSION["email"];

    $sql = "SELECT * FROM `utenti` WHERE `email` = '$email'";
    $statement = $connection -> prepare($sql);
    $statement -> execute();
    $result = $statement->get_result();
    $events = Event::find($email);

    if($result && $result->num_rows > 0) {
        $user = mysqli_fetch_array($result);
        //var_dump($user['nome']);
    } else{
        DB::disconnect($connection);   
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        <div id="saluto">
            <h2 class="text-center pb-4">Ciao <span class="text-uppercase"> <?= $user['nome'] ?> </span>  ecco i tuoi eventi</h2>          
        </div>
        <div id="eventi">
            <div class="dashboard_container">
                <div class="row flex-wrap">
                    <?php foreach ($events as $event) { ?>
                        <div class="col-4">
                            <div class="card px-3m py-4 m-4">
                                <h2 class="mb-2 text-black"><?= $event['nome_evento']?></h3>
                                <p id="date_time" class="text-secondary mb-2"><?= $event['data_evento'] ?></p>
                                <div class="text-center d-flex justify-content-center">
                                    <button type="submit" class="btn w-100 mt-2 py-2 text-uppercase btn_font"><strong>join</strong></button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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