<?php
   
$adress = '192.168.65.25';
$port = '203';
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

socket_connect($socket, $adress, $port);

$response = socket_read($socket , 6, PHP_BINARY_READ);

socket_close($socket);
    
echo json_encode($response);
    
?>