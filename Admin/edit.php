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
        } else {
            DB::disconnect($connection);
            return false;
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
            <div id="titolo">
                <h2 class="text-center pb-4">Modifica evento</h2>            
            </div>
            <div id="complete_form" class="p-4">
                <form class="my-3" action="update.php?key=<?=$event_id?>" method="post">
                    <div class="attendees my-3">
                        <label for="attendees"><strong>Partecipanti</strong></label>
                        <div class="my-2">
                            <?php foreach ($users as $user) {?>
                                <div class="form-check d-flex my-2">
                                    <?php if (str_contains($event["attendees"], $user["email"])) {?>
                                    <input class="form-check-input" type="checkbox" value="<?= $user["email"] ?>" id="<?= $user["email"] ?>" name="attendees[]" checked>
                                    <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" value="<?= $user["email"] ?>" id="<?= $user["email"] ?>" name="attendees[]">
                                    <?php } ?>
                                    <label class="form-check-label" for="<?= $user["email"] ?>"><?= $user["email"] ?> </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="mb-4 d-flex flex-column">
                        <label for="nome_evento" class="form-label"><strong>Nome evento</strong></label>
                        <input type="text" class="form-control" id="nome_evento" required name="nome_evento" value="<?= $event["nome_evento"]?>">
                    </div>
                    <div class="mb-4 d-flex flex-column">
                        <label for="data_evento" class="form-label"><strong>Data Evento</strong></label>
                        <input type="datetime-local" class="form-control" id="data_evento" required name="data_evento" value="<?= $event["data_evento"]?>">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success py-1 px-2 text-uppercase">Conferma</button>
                    </div>
                </form>
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