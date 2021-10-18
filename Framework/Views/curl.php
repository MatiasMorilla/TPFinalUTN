<?php

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://utn-students-api.herokuapp.com/api/Student");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("x-api-key: 4f3bceed-50ba-4461-a910-518598664c08"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($ch);

    $json = json_decode($respuesta, true);


    var_dump($json);

    curl_close($ch);

?>