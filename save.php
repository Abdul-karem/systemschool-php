<?php
include 'process2.php';

if (count($_POST) > 0) {
    if ($_POST['type'] == 1) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role_id = 2; // Set the Role ID to 2
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`name`, `email`, `password`, `role_id`, `effective`)
                VALUES ('$name', '$email', '$password', $role_id, 'No')";
        
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo json_encode(array("statusCode" => 500, "message" => "Error adding data to the database."));
        }

        mysqli_close($conn);
    } elseif ($_POST['type'] == 2) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $effective = $_POST['effective'];

        $sql = "UPDATE `users`
                SET `name`='$name', `email`='$email', `password`='$password', `effective`='$effective'
                WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo json_encode(array("statusCode" => 500, "message" => "Error updating data in the database."));
        }

        mysqli_close($conn);
    } elseif ($_POST['type'] == 3) {
        $id = $_POST['id'];
        $sql = "DELETE FROM `users` WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode" => 200, "id" => $id));
        } else {
            echo json_encode(array("statusCode" => 500, "message" => "Error deleting data from the database."));
        }
        mysqli_close($conn);
    } elseif ($_POST['type'] == 4) {
        $id = $_POST['id'];
        $sql = "DELETE FROM users WHERE id IN ($id)";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode" => 200, "ids" => explode(",", $id)));
        } else {
            echo json_encode(array("statusCode" => 500, "message" => "Error deleting data from the database."));
        }
        mysqli_close($conn);
    }
}
