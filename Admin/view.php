<?php

require_once __DIR__ . "/../Helpers/DB.php";
require_once __DIR__ . "/../Models/User.php";

$connection = DB::connect();
$users = User::all();


if(isset($_GET['key'])) {
    $event_id = $_GET['key'];
    $sql = "SELECT * FROM eventi WHERE id = $event_id";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->get_result();

        if($result && $result->num_rows > 0) {
            // var_dump($result);
            $event = mysqli_fetch_array($result);
            $event_attendees=explode(",", $event["attendees"]);
        } else {
            DB::disconnect($connection);
            return false;
        }
        
    }
    foreach ($event_attendees as $event_attendee) {
        $sql = "SELECT * FROM utenti WHERE email = '$event_attendee'";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->get_result();
        if($result && $result->num_rows > 0) {
            $attendee = mysqli_fetch_array($result);
            $attendees = [];
            array_push($attendees, $attendee);
        } else{
            var_dump('ahahahah');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/styles/style.css">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

</head>
<body>
    <header class="ps-5 d-flex align-items-center">
        <div id="logo" class="mx-3">
            <img id="logo_img" src="../assets/img/Group_181.png" alt="">
        </div>
    </header>
    <main class="my-3">
        <div class="container">
            <div>
                <h2 class="text-center pb-4"><?= $event['nome_evento']?></h2>
            </div>
            <div class="card p-4 m-3 d-flex flex-row justify-content-around">
                <div>
                    <h3 class="text-center pb-3">Partecipanti</h3>
                    <ol>
                        <?php foreach ($event_attendees as $event_attendees) {?>
                            <li><?= $event_attendees?></li>
                        <?php } ?>
                    </ol>
                </div>
                <div>
                    <div>
                        <h3 class="text-center pb-3">Data e ora evento</h3>
                    </div>
                    <div>
                        <p><?= $event['data_evento']?></p>
                    </div>
                </div>
            </div>
            <div class="text-center my-3">
                <a href="dashboard.php" class="btn btn-secondary py-1 px-2 text-black decoration-none text-uppercase">Torna indietro</a>
            </div>
        </div>
        <div id="ellipse_12">
            <img src="../assets/img/Ellipse 12.png" alt="">
        </div>
        <div id="ellipse_13">
            <img src="../assets/img/Ellipse 13.png" alt="">
        </div>
        <div id="vector_1">
            <img src="../assets/img/Vector 1.png" alt="">
        </div>
        <div id="vector_4">
            <img src="../assets/img/Vector 4.png" alt="">
        </div>
        <div id="vector_5">
            <img src="../assets/img/Vector 5.png" alt="">
        </div>
        <div id="group_201">
            <img src="../assets/img/Group 201.png" alt="">
        </div>
    </main>
</body>
</html>
