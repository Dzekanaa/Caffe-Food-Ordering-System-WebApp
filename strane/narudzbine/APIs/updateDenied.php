<?php

include_once("../../../db.php");

$status = "odbijena";
$sql = "UPDATE `narudzbine` SET `status`=\"$status\" WHERE `id`= " . $_REQUEST['id'];

if ($conn->query($sql) === TRUE) {
    $row_successfully_updated = true;
}
else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();

if ($row_successfully_updated)
    echo "updated";