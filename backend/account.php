<?php
    include('config/db_connection.php');
    $name = $contact = $work = '';
    $errors = array('name' => '', 'contact' => '', 'work' => '');
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $work = $_POST['work'];
        //check if the name field is empty
        if (empty($name)) {
            $errors['name'] = 'a name is required';
        } else {
            // check if the name field is correct
            if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
                $errors['name'] = 'the name must be a valid';
            }
        }
        //check if the contact field is empty
        if (empty($contact)) {
            $errors['contact'] = 'a name is required';
        } else {
            // check if the contact field is correct
            if (!preg_match('/^[0-9]+$/', $contact)) {
                $errors['contact'] = 'the contact must be a valid';
            }
        }
        //check if the work field is empty
        if (empty($work)) {
            $errors['work'] = 'a work place is required';
        } else {
            // check if the work field is correct
            if (!preg_match('/^[a-zA-Z\s]+$/', $work)) {
                $errors['work'] = 'the work place must be a valid';
            }
        }

        if(!array_filter($errors)) {
            $name = mysqli_real_escape_string($conn, $name);
            $contact = mysqli_real_escape_string($conn, $contact);
            $work = mysqli_real_escape_string($conn, $work);

            // create a new sql variable to insert data to the database
            $sql = "INSERT INTO doctors(name_of_doctor, contact, work_place) VALUES ('$name', '$contact', '$work')";
            
            // save to the database and check
            if (!mysqli_query($conn, $sql)) {
                // failure
                echo 'query error: ' . mysqli_error($conn);
            } else {
                // success
                header('location: index.php');
            }
        }
    }


?>

<html lang="en">
<title>Hospital | account</title>
<?php include('templates/header.php')?>

<section class="container grey-text">
    <h4 class="center">login</h4>
    <form action="account.php" class="white" method="POST">
        <!--name-->
        <label for="name">Enter your name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <div class="red-text"><?php echo $errors['name'];?></div>
        <!--contact-->
        <label for="contact">Enter your contact:</label>
        <input type="text" name="contact" value="<?php echo $contact; ?>">
        <div class="red-text"><?php echo $errors['contact']; ?></div>
        <!--workplace-->
        <label for="name">Enter the name of hospital (you work for):</label>
        <input type="text" name="work" value="<?php echo $work; ?>">
        <div class="red-text"><?php echo $errors['work']; ?></div>
        <!-- submit button-->
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand">
        </div>
    </form>
</section>


</html>