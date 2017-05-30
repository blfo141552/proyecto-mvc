<?php
require_once 'Database.php';
class Client{
  public $name;
  public $direction;
  public $phone;

  public function __construct($name, $direction, $phone){
    $this->name = $name;
    $this->direction = $direction;
    $this->phone = $phone;
  }
  //return rows
  public function save(){
    $db = new Database();
    $sql = "INSERT INTO
            cliente(nombre,direccion,telefono)
            VALUES
            ('".$this->name."',
            '".$this->direction."',
            '".$this->phone."')
            ";
      $db->query($sql);
      $lastId = (int)$db->mysqli->insert_id;
  		echo $lastId;
  		$db->close();
  		return true;

  }
  static function get(){
    $sql = " SELECT
		 						*
							FROM
								cliente
						";
		$db = new Database();
		if($rows = $db->query($sql)) {
			return $rows;
		}
		return false;
  }
}
