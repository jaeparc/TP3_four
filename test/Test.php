<?php

$adress = '192.168.65.87';
$port = '1234';
$buf = "coucou";


$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

socket_connect($socket, $adress, $port);

socket_send($socket, $buf, 6, 0);

$response = socket_read($socket , 6, PHP_BINARY_READ);

echo $response;

socket_close($socket);
?>



<?php
/*$adress = '192.168.65.87';
$srv_port = '22';
$buf = "coucou";
$bufRecv = "";

$socket = socket_create (AF_INET, SOCK_DGRAM, SOL_UDP);

socket_connect($socket, $adress, $srv_port);

$ressutl = socket_bind($socket, $adress, 49392);

socket_send($socket, $buf, 6, 0);

$result = socket_recvfrom($socket, $bufRecv, 6, 0, $adress, $srv_port);

echo $result;

socket_close($socket);
*/
?>