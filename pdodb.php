<?php

/**
 * This class gives access to rcs database
 */
class PdoDB
{

  private $dbhost = 'mysql:host=localhost;dbname=';
  private $dbname = 'rcs';
  private $dbuser = 'rcsuser';
  private $dbpass = 'userRcs01';

  private $writeLoginSQL = "INSERT INTO logins (`login`, `password`) VALUES (?, ?)";

  public function __construct()
  {
    try{
      $this->db = new PDO($this->dbhost . $this->dbname, $this->dbuser, $this->dbpass);
    } catch(PDOException $e){
      $this->db = null;
    }
  }

  public function getData ($query, $fields, $fetch_type = 2) {
    $res = [];
    if($this->db){
      $stmt = $this->db->prepare($query);
      if ($stmt->execute($fields)) {
        while ($row = $stmt->fetch($fetch_type)) {
          $res[] = $row;
        }
      }
      return $res;
    }
      return null;
  }

  public function writeLogin($login, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $this->db->prepare($this->writeLoginSQL);
    if($stmt->execute([$login, $password])) {
      return true;
    }
    return false;
  }
}