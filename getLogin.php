<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/../rcs/funcs.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../rcs/pdodb.php';

$pdo_object = new PdoDB;
$postData = $_POST;
$res = $pdo_object->getData("SELECT * FROM logins WHERE login = ?", [$postData['login']]);
if(!empty($res)){

  if(password_verify($postData['password'], $res[0]['password'])){
    $_SESSION['login']['login'] = $res[0]['login'];
    ddv('Hello, ' . $_SESSION['login']['login'] .'!', 0);
    echo '<a href="logout.php">Logout</a>';
  }
  else {
    echo 'pass not ok, ';
    echo '<a href="login.php">back to login</a>';
  }
}
else {
  echo 'login not ok, ';
  echo '<a href="login.php">back to login</a>';
}
