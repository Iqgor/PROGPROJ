<?php 

$sName = "rdbms.strato.de";
$uName = "dbu623335";
$pass = "Dz7tPyNYi9@vhG";
$db_name = "dbs10498148";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}