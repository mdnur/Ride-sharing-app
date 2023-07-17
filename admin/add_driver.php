<?php include_once "inc/header.php"; ?>
    <?php


    // include_once 'classes/Login.php';

    if (isset($_POST['log'])) {
        if($_POST['password'] != $_POST['confirm_password']){
            echo "Password and Confirm Password does not match";
            exit();
        }
        // print_r($_POST);
        unset($_POST['confirm_password']);
        unset($_POST['log']);
    

        // print_r($_POST);
        $_POST['created_at'] = date("Y-m-d H:i:s", time());
        $_POST['role'] = 'driver';
        $driverData = $_POST;
        $driver = new DriverTable();
    
        if ($driver->insert('driver',$driverData)) {
            header("Location: show_driver.php");
        } else {
            echo "Something went wrong";
        }
    }


    ?>
    <center>
        <h2>Add Driver</h2><br>
        <div class="login">
            <form id="login" method="post" action="">
                <label for="name"><b>Name
                    </b>
                </label>
                <input type="text" name="name" id="name" placeholder="Name" required>
                <br><br>
                <label for="username"><b>Username
                    </b>
                </label>
                <input type="text" name="username" id="username" placeholder="Username" required>
                <br><br>
                <label for="email"><b>Email
                    </b>
                </label>
                <input type="email" name="email" id="email" placeholder="email" required>
                <br><br>
                <label for="phone"><b>phone
                    </b>
                </label>    
                <input type="text" id="phone" name="phone" pattern="^01[3456789]\d{8}$" placeholder="01XXXXXXXXX" title="Bangladesh phone number: 01XXXXXXXXX" required>
                <br><br>

                <label for="salary"><b>salary
                    </b>
                </label>
                <input type="number" name="salary" id="salary" placeholder="amount" required>
                <br><br>


                <label for="password"><b>password
                    </b>
                </label>
                <input type="password" name="password" id="password" placeholder="password" required>
                <br><br>

                <label for="confirm_password"><b>Confirm Password
                    </b>
                </label>
                <input type="Password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
                <br><br>
                <input type="submit" name="log" id="log" value="Create Driver">
                <br><br>
            </form>
        </div>
    </center>
<?php include_once "inc/footer.php"; ?>
