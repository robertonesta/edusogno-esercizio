<?php
  require_once __DIR__ . "/../Helpers/DB.php";
  require_once __DIR__ . "/../Models/Event.php";

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
    <title>Admin Dashboard</title>
    <!-- CSS -->
        <link rel="stylesheet" href="../assets/styles/style.css">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="ps-5 d-flex align-items-center">
        <div id="logo" class="mx-3">
            <img id="logo_img" src="../assets/img/Group_181.png" alt="">
        </div>
    </header>
    <main>
        <div id="eventi">
            <div class="container">
                <div id="titolo">
                    <h2 class="text-center pb-4">Tabella Eventi</h2>            
                </div>
                <a href="add.php" class="decoration-none btn py-1 px-2 btn-primary mb-3 text-uppercase"> Aggiungi un nuovo evento</a>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">Nome Evento</th>
                                <th scope="col">Attendees</th>
                                <th scope="col">Data Evento</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($events as $event) { ?>
                                <tr>
                                    <td><?= $event['nome_evento'] ?></td>
                                    <td scope="row"><?= $event['attendees'] ?></td>
                                    <td><?= $event['data_evento'] ?></td>
                                    <td class="d-flex">
                                        <a href="view.php?key=<?= $event['id']?>" class="bg-success btn"><i class="py-1 px-2 fa-solid fa-eye d-block"></i></a>
                                        <a href="edit.php?key=<?= $event['id']?>" class="bg-info btn"><i class="py-1 px-2 fa-solid fa-pencil d-block"></i></a>
                                        <button id="show_modal" data-target="#modal<?= $event['id']?>" class="bg-danger btn py-1 px-2"><i class="fa-solid fa-trash-can d-block"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
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
    <div id="modal" class="d-none card">
        Sicuro/a di voler eliminare <?= $event['nome_evento']?>?
        <div class="d-flex justify-content-around my-3">
            <button id="chiudi" type="" class="btn btn-secondary py-2 px-3">Annulla</button>
            <form action="destroy.php?key=<?= $event['id']?>" method="post">
                <button type="submit" class="btn btn-danger py-2 px-3">Sicuro/a</button>
            </form>
        </div>
    </div>
</main>
<script src="../assets/js/script.js"></script>
</body>
</html>