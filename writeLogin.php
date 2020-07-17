<?php

error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/../rcs/funcs.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../rcs/pdodb.php';

$pdo_object = new PdoDB;
$postData = $_POST;

if(isset($postData['login']) && isset($postData['password'])) {
  // ddv($postData);
  // admin | $2y$10$IBj8b29WYywrt0n0jJ0j5eESd642bxl.6BabBHArj/uZVNkoAZmlm

  $pdo_object->writeLogin($postData['login'], $postData['password']);
}
