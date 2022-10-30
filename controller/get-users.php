<?php

function get_users(){
    $curl = curl_init();
    // Configura
    curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://awsnet.tk/view/accounts'
    ]);
    // Envio e armazenamento da resposta
    $response = curl_exec($curl);
    // Fecha e limpa recursos
    curl_close($curl);
    return $response;
    
}


?>