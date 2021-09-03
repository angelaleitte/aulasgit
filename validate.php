<?php
//filter_list
echo "<pre>";
print_r(filter_list());
echo "</pre>";
echo "<br><br>";

//VALIDAÇÃO PHP
$email = "angela-leitte@hotmail.com";
$email = filter_input(INPUT_GET, 'email');
echo $email;
echo "<br><br>";

$email = filter_input(INPUT_POST, 'email');
echo $email;
echo "<br><br>";
$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
echo $email;
echo "<br><br>";

$email = "angela-leitte@hotmail.com";
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
   echo "é um email";
}else{
   echo "não é um email";
}
echo "<br><br>";

//VALIDAR SELECT
$prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_VALIDATE_INT, array(
    'options' => array(
        'min_range' => 1,
        'max_range' => 4,
        'default'   => 1
    )
    ));

echo "PRIORIDADE: ".$prioridade;
echo "<br><br>";
?>

<form method="POST">
    <select name="prioridade">
        <option value="1">Prioridade 1</option>
        <option value="2">Prioridade 2</option>
        <option value="3">Prioridade 3</option>
        <option value="4">Prioridade 4</option>
    </select>
    <input type="submit" value="Enviar">
</form>
<?php

echo "PLUGIN DE VER COOKOES NO NAVEGADOR: cookie inspector<br>";
echo "https://developer.chrome.com/docs/devtools/storage/cookies/<br>";

//obter ip  -> $_SERVER['REMOTE_ADDR']
//navegador -> $_SERVER['HTTP_USER_AGENT']

echo "EVITAR SEQUESTRO DE SESSAO VIA COKIE DO NAVEGADOR<br>";
session_start();
if(empty($_SESSION['dono'])){
    $_SESSION['dono'] = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
}

$token = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
if($_SESSION['dono'] != $token){
    exit;
}

echo "MEU SISTEMA...";
PRINT_R($_SESSION);

echo "<br><br>";
echo "<hr>";
echo "Configurações de Sessão: ";

$options = [
    'cost' => 12,
];
echo "<br><br>";
echo "PASSWORD_DEFAULT: ".password_hash("123", PASSWORD_DEFAULT, $options);
echo "<br>";
echo "PASSWORD_BCRYPT: ".password_hash("123", PASSWORD_BCRYPT, $options);//MELHOR PARA SENHAS
echo "<br>";
$hash = '$2y$12$qtpYLW.Q91iscrg4FWIBkuKgRDcgEQEe8KFsVKHcyxIdAcPt9G2bO';//o que está no banco -> 60 caracteres
$senha = '123';//o que o susuaeio digitou
if(password_verify($senha, $hash)){
    echo "Acertou<br>";
}else{
    echo "Errou<br>";
}


echo "<hr>";
echo "<br><br>";
