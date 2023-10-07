<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <main class="my-3">
        <div class="container">
            <h2 class="text-center pb-4">Hai già un account?</h2>
            <div id="complete_form" class="py-4 px-4">
            <form action="login.php" method="post">
                <div class="mb-4 d-flex flex-column">
                    <label for="email" class="mb-3 input-lable"><strong>Inserisci l'email</strong></label>
                    <input type="email" class="form-control input-font" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@example.it" required name="email">
                </div>
                <div class="mb-4 d-flex flex-column">
                    <label for="password" class="mb-3 input-lable"><strong>Inserisci la password</strong></label>
                    <input type="password" class="form-control input-font" id="password" required name="password" placeholder="Scrivila qui">
                </div>
                <div id="password-reset" class="text-center bg-dark mt-3 text-light">
                    <a href="forget_password.php">Password dimenticata?</a>
                </div>
                <div class="text-center d-flex justify-content-center">
                    <button type="submit" class="btn w-100 p-3 my-4 text-uppercase btn_font"><strong>Accedi</strong></button>
                </div>
            </form>
            <div class="text-center bg-dark mt-3 text-light">
                <a href="register.php">Non hai ancora un profilo? <strong>Registrati</strong></a></p>
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