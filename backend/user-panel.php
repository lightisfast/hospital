<?php ?>

<div class="container">
    <div class="row">
        <div class="col s4">
            <div class="card">
                <?php

                //Database connection
                $sql = "SELECT * FROM doctors WHERE id=1";
                $result = $conn->query($sql);

                //display user information
                if ($result->num_rows > 0) {
                    while ($rows = $results->fetch_assoc()) {
                        echo '<div class="card-image">';
                        echo 'img class="circle" src=""' . $row["profile_picture"] . '">';
                        echo '<h5>' . $row["name"] . '</h5>';
                        echo '</div>';
                    }
                } else {
                    echo "No user found";
                }

                // close database connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <div class="col s8">
        <div class="card">

        </div>
    </div>
</div>