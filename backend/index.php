<?php
include('config/db_connection.php');
// set variable to hold the query string
$sql = "SELECT name_of_doctor, contact, work_place FROM doctors";

//make query to the database & get results
$results = mysqli_query($conn, $sql);

//fetch the results from the database in an array
$doctor = mysqli_fetch_all($results, MYSQLI_ASSOC);

// free the results from the memory
mysqli_free_result($results);

//close the connection
mysqli_close($conn);
?>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php include('user-panel.php'); ?>

<?php include('templates/footer.php'); ?>

</html>