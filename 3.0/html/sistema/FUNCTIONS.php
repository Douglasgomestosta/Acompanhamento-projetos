<?php
//anti sql injection
function sqlinjection($texto) {
    $texto = str_replace(';', '', $texto);
    $texto = str_replace("'", '', $texto);
    $texto = str_replace('*', '', $texto);
    $texto = str_replace('`', '', $texto);
    $texto = str_replace('=', '', $texto);
    $texto = str_replace(',', '', $texto);
    $texto = str_replace('"', '', $texto);

    return $texto;
}
//fim anti sql injection

//pegar ip real
function ipreal()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
//fim pegar ip real

//comparar a diferença de horas entre duas datas no formato ano-mes-dia hora:minuto:segundo
function compararhoras($datainicio, $datafim){
// Calcula a diferença em segundos entre as datas
$diferenca = strtotime($datafim) - strtotime($datainicio);
//converte de segundos para horas e arredonda
$horas = floor($diferenca / (60 * 60));

return $horas;

}
?>