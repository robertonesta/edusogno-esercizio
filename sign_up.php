<?php
  require_once __DIR__ . "/Models/User.php";

  if(session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  if(isset($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["password"]) && $_POST["nome"] != "" && $_POST["cognome"] != "" && $_POST["email"] != "" && $_POST["password"] != "") {

    $result = User::create($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["password"]);
    $_SESSION["email"] = $_POST['email'];

      // var_dump(DIR);
      header('Location: dashboard.php');
  }
  session_write_close();