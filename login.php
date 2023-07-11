<!-- login rolles -->

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            height: 300px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 200px;
            border-radius: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group .alert {
            margin-top: 10px;
            padding: 8px;
            border-radius: 4px;
        }

        .form-group .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .form-group .alert-warning {
            background-color: #f8d7da;
            color: #721c24;
        }

        .form-group .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .form-group .alert.alert-danger ul {
            list-style-type: none;
            padding-left: 0;
            margin-top: 5px;
        }

        .form-group .alert.alert-danger ul li {
            margin-bottom: 5px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #1a81d1;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input {
            width: 80%;
            height: 27px;

        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name_or_email">Name or Email:</label>
                <input class="form-control" type="text" id="name_or_email" name="name_or_email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Login</button>
            </div>
            <?php
            $con = mysqli_connect("localhost", "root", "", "sestem-school");

            if (!$con) {
                echo '<div class="form-group"><div class="alert alert-danger">Connection Error</div></div>';
            }

            if (isset($_POST['name_or_email']) && isset($_POST['password'])) {
                $nameOrEmail = htmlspecialchars(trim($_POST['name_or_email']));
                $password = htmlspecialchars(trim($_POST['password']));

                // Check if the entered name or email and password match the database
                $sql = "SELECT * FROM users WHERE (name = '$nameOrEmail' OR email = '$nameOrEmail') AND password = '$password'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $role_id = $row['role_id'];
                    $effectivef = $row['effective'];
                    // Successful login
                    if ($role_id == 1) {
                        $returnUrl = isset($_POST['return_url']) ? $_POST['return_url'] : 'index2.php';
                        header("Location: $returnUrl");
                        exit();
                    } else {

                        if ($effectivef == "no") {

                            echo '<div class="form-group"><div class="alert alert-warning"> NOt effective </div></div>';
                        } else {

                            $returnUrl = isset($_POST['return_url']) ? $_POST['return_url'] : 'student.php';
                            header("Location: $returnUrl");
                        }
                    }
                } else {
                    // Invalid credentials
                    echo '<div class="form-group"><div class="alert alert-warning">Invalid Credentials</div></div>';
                }
            }

            mysqli_close($con);
            ?>
        </form>
    </div>
</body>

</html>