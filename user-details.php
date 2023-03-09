<?php

$page_roles = array('admin');

require_once 'login.php';
require_once  'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$id = $_GET['id'];
$query = "SELECT * FROM user where id=$id ";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	<a href='user-add.php'>Add User</a>
	ID: $row[id]
	Username: $row[username]
	Forename: $row[forename]
	Surname: $row[surname]
	Password: $row[password]	
	</pre>
	
_END;

}

echo "<pre><a href='user-logout.php'>Logout</a></pre>";

$conn->close();



?>