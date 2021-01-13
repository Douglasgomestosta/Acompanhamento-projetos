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


//ver status do sistema
function statussistema()
{
    //insira aqui o que você achar necessario para o seu sistema
    //caso tenha algo de errado, faça o return 0, caso contrário. return 1
    return "1";
}
//fim ver status do sistema
?>