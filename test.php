<?php
require 'db.php';

$db = new db('config.json');
//echo date('Y-m-d');
$date = date('Y-m-d');
//$date = date_format($date, 'm/d/Y');
/*$sql = 'INSERT INTO users (firstname, lastname, email, password, created_at)
VALUES ("aade","ljhal","abula3003@gmail.com","abula", CURDATE())';
$result = $db->insert($sql);*/
//echo $result;
$sql = 'SELECT * FROM users';

$row = $db->select($sql);
//echo json_encode($row);
foreach ($row as  $value) {
	echo json_encode($value);
}
//echo "test";