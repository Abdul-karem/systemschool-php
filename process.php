<!-- Regester connect -->
<?php
$con = mysqli_connect("localhost", "root", "", "sestem-school");

if (!$con) {
    echo "connection error";
}

if (isset($_POST['name'])) {
    $name = htmlspecialchars(trim($_POST['name']));
} else {
    $name = "";
}

if (isset($_POST['email'])) {
    $email = htmlspecialchars(trim($_POST['email']));
} else {
    $email = "";
}

if (isset($_POST['password'])) {
    $pass = htmlspecialchars(trim($_POST['password']));
} else {
    $pass = "";
}

if (!empty($name) || !empty($email) || !empty($pass)) {
    // echo '<div class="alert alert-success">Please fill all required fields</div>';

    $sql = "INSERT INTO users (name, email, password  ) VALUES ('$name','$email','$pass' )";
    if ($res = mysqli_query($con, $sql)) {
        echo '<div class="alert alert-success">Data Successfully Inserted</div>';
    } else {
        echo '<div class="alert alert-warning">Data Not Inserted</div>';
    }
}
?>