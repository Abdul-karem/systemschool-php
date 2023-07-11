<!-- Admin Dashbord -->

<?php
include 'process2.php';
?>

<?php
session_start();

// Check user permissions
// if (!checkUserPermissions()) {
//     header("Location: login.php");
//     exit();
// }

function checkUserPermissions()
{
    if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) {
        return true;
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="style.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="index.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
</head>

<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="home.html"><img src="https://www.adobe.com/express/create/media_114db2401080d263d7338e6fab6589ca67f85274c.jpeg?width=400&format=jpeg&optimize=medium" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="https://www.adobe.com/express/create/media_114db2401080d263d7338e6fab6589ca67f85274c.jpeg?width=400&format=jpeg&optimize=medium" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi" style="height: 100vh; ">
                    <ul>
                        <!-- <li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm"></span></a></li> -->
                        <!-- <li><a href="student.php" onclick="redirectToStudentPage()"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">courses</span></a></li> -->
                        <!-- <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm"></span></a></li>
                        <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar">iii</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <div class="search hidden-xs hidden-sm">
                                <input type="text" placeholder="Search" id="search">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#add_project">Add supject</a></li>
                                    <li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#supject"> Supject</a></li>
                                    <!-- <button class="btn btn-primary" id="displayDataBtn"    id="supject-content"  >Display Data</button> -->
                                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                    <li>
                                        <a href="#" class="icon-info">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <span class="label label-primary">3</span>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="https://www.adobe.com/express/create/media_114db2401080d263d7338e6fab6589ca67f85274c.jpeg?width=400&format=jpeg&optimize=medium" alt="user">
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <span>JS Krishna</span>
                                                    <p class="text-muted small">
                                                        me@jskrishna.com
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <a href="#" class="view btn-sm active">View Profile</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="container">
                    <p id="success"></p>
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Manage <b>Users</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New User</span></a>
                                    <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Delete</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="selectAll">
                                            <label for="selectAll"></label>
                                        </span>
                                    </th>
                                    <th>SL NO</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <!-- <th>Password</th> -->
                                    <th>effective</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM users ");
                                $i = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr id="<?php echo $row["id"]; ?>">
                                        <td>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
                                                <label for="checkbox2"></label>
                                            </span>
                                        </td>

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>

                                        <td><?php echo $row["effective"]; ?></td>
                                        <td>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                                <i class="material-icons update" data-toggle="tooltip" data-id="<?php echo $row["id"]; ?>" data-name="<?php echo $row["name"]; ?>" data-email="<?php echo $row["email"]; ?>" data-phone="<?php echo $row["password"]; ?>" title="Edit"></i>
                                            </a>
                                            <a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- Add Modal HTML -->
                <div id="addEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="user_form">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Full NAME</label>
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>EMAIL</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" id="phone" name="phone" class="form-control" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" value="1" name="type">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <button type="button" class="btn btn-success" id="btn-add">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal HTML -->
                <div id="editEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="update_form">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="id_u" name="id" class="form-control" required>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" id="name_u" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" id="email_u" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" id="phone_u" name="phone" class="form-control" required>
                                    </div>
                                    <label>
                                        <input type="checkbox" name="effective" value="Yes">effective
                                    </label>
                                    <label>
                                        <input type="checkbox" name="effective" value="No"> Not effective
                                    </label>

                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" value="2" name="type">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <button type="button" class="btn btn-info" id="update">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Delete Modal HTML -->
                <div id="deleteEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form>

                                <div class="modal-header">
                                    <h4 class="modal-title">Delete User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="id_d" name="id" class="form-control">
                                    <p>Are you sure you want to delete these Records?</p>
                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <button type="button" class="btn btn-danger" id="delete">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>

    <!-- Modal -->
    <div id="add_project" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Supject</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="submit.php">
                        <input type="text" placeholder="Subject Name :" name="Subject_Name">
                        <input type="text" placeholder="description	" name="description">
                        <input type="text" placeholder="result" name="result">
                </div>
                <div class="modal-footer">
                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                    <button type="button" class="add-project" data-dismiss="modal" id="save-project" type="submit" value="Submit">Save</button>

                    <!-- <button type="button" class="add-project" data-dismiss="modal">Save</button> -->
                </div>
                </form>
            </div>


        </div>
    </div>
    <!-- start php supject -->
    <?php
    include 'process2.php';

    // Check if form is submitted
    if (count($_POST) > 0) {
        if ($_POST['type'] == 1) {
            // Get the values from the form
            $subjectName = $_POST['subject_name'];
            $description = $_POST['description'];
            $result = $_POST['result'];

            // Prepare the SQL query
            $sql = "INSERT INTO `supjects`(`Subject_Name`, `description`, `result`) 
                VALUES ('$subjectName', '$description', '$result')";

            // Execute the query
            if (mysqli_query($conn, $sql)) {
                echo json_encode(array("statusCode" => 200));
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
    }

    // Retrieve the data from the table
    $sql = "SELECT * FROM `supjects`";
    $result = mysqli_query($conn, $sql);
    ?>


    <!-- end php supject -->

    <!-- Modal  supject -->
    <div id="supject" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <!-- <h4 class="modal-title">Add Supject</h4> -->
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Description</th>
                                <th>Mark of Success</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch and display the data
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['Subject_Name'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>" . $row['result'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="add-project" data-dismiss="modal" id="save-project">Save</button> -->

                    <!-- <button type="button" class="add-project" data-dismiss="modal">Save</button> -->
                </div>
            </div>


        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>

    <script>
        function redirectToStudentPage() {
            event.preventDefault();
            window.location.href = "student.php";
        }
        // modalform2
        document.getElementById("save-project").addEventListener("click", function() {
            var name = document.querySelector("#add_project input[name='Subject_Name']").value;
            var description = document.querySelector("#add_project input[name='description']").value;
            var result = document.querySelector("#add_project input[name='result']").value;

            // قم بإنشاء كائن FormData وتعبئته بالقيم المدخلة في الحقول
            var formData = new FormData();
            formData.append("Subject_Name", name);
            formData.append("description", description);
            formData.append("result", result);

            // قم بإرسال البيانات عبر AJAX إلى صفحة المعالجة
            var xhttp = new XMLHttpRequest();
            //   xhttp.onreadystatechange = function() {
            //     if (this.readyState === 4 && this.status === 200) {
            //       // عملية الحفظ تكتمل هنا، يمكنك إجراء أي إجراءات إضافية بعد الحفظ
            //       console.log("Data saved successfully!");
            //     }
            //   };
            xhttp.open("POST", "save_project.php", true);
            xhttp.send(formData);
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState === 4 && xhttp.status === 200) {
                    var response = xhttp.responseText;
                    if (response === "success") {
                        console.log("Data saved!");
                    } else {
                        console.log("Data not saved!");
                    }
                }
            };



        });
    </script>

</body>

</html>