<?php 
include('../db.php');

$sql = mysqli_query($conn, "SELECT * FROM (SELECT * FROM registracija ORDER BY id DESC LIMIT 6) sub ORDER BY id ASC");
$data = array();
while ($row = mysqli_fetch_object($sql))
{
    array_push($data, $row);
}
echo json_encode($data);
exit();