<?php include_once "inc/header.php"; ?>
    <?php


    // include_once 'classes/Login.php';

    if (isset($_POST['log'])) {
        if($_POST['password'] != $_POST['confirm_password']){
            echo "Password and Confirm Password does not match";
            exit();
        }
        unset($_POST['confirm_password']);
        unset($_POST['log']);
        $_POST['role'] = 'admin';
        $data = $_POST;

        $admin = new AdminTable();
    
        if ($admin->insert('admin',$data)) {
            header("Location: show_admin.php");
        } else {
            echo "Something went wrong";
        }
    }


    ?>


    <center>
        <h2>Add Admin</h2><br>
        <div class="login">
            <form id="login" method="post" action="">
                <label for="name"><b>Name
                    </b>
                </label>
                <input type="text" name="name" id="name" placeholder="Name">
                <br><br>
                <label for="username"><b>Username
                    </b>
                </label>
                <input type="text" name="username" id="username" placeholder="Username">
                <br><br>
                <label for="email"><b>Email
                    </b>
                </label>
                <input type="email" name="email" id="email" placeholder="email">
                <br><br>
                <label for="phone"><b>phone
                    </b>
                </label>
                <input type="text" id="phone" name="phone" pattern="^01[3456789]\d{8}$" placeholder="01XXXXXXXXX" title="Bangladesh phone number: 01XXXXXXXXX">
                <br><br>

                <label for="password"><b>password
                    </b>
                </label>
                <input type="password" name="password" id="password" placeholder="password">
                <br><br>

                <label for="confirm_password"><b>Confirm Password
                    </b>
                </label>
                <input type="Password" name="confirm_password" id="confirm_password" placeholder="Confirm password">
                <br><br>
                <input type="submit" name="log" id="log" value="Create Admin">


              
            </form>
        </div>
    </center>
</body>

</html>