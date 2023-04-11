<?php
// Open connection to the database
$conn = mysqli_connect('localhost','andrew','password','hospital_db');

// check if connection is established
if(!$conn) {
    echo "connection error: " . mysqli_connect_error();
}

?>