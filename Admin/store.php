<?php

    require_once __DIR__ . "/../Models/Event.php";
    require_once __DIR__ . "/../Helpers/DB.php";

    if(isset($_POST['nome_evento'],$_POST['data_evento'], $_POST['attendees'])){
    $connection = DB::connect();

    $attendees = implode(',', $_POST['attendees']);
    $nome_evento = $_POST['nome_evento'];
    $data_evento = $_POST['data_evento'];
    $new_Event = Event::create($nome_evento, $data_evento, $attendees);
    header('Location: dashboard.php');

}

?>
