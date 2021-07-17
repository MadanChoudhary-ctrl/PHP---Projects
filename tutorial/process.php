<?php
    session_start();
    $link = mysqli_connect("localhost","root","","demo");
    if(!$link) {
        die("Could not connect to db.");
    }

    if(isset($_POST['submit'])) {
        $first = $_POST['firstname'];
        $last = $_POST['lastname'];
        $query = "INSERT INTO students (firstname,lastname) VALUES ('$first','$last')";

        $result = mysqli_query($link,$query);
        if(!$result) {
            die("Could not run query");
        } else {
            echo "Success";
        }
        $_SESSION['message'] = "1 data has been added";
        $_SESSION['msg_type'] = "info";
        header("location: index.php");
    }

    if(isset($_GET['delete'])) {
        $query = "DELETE FROM students WHERE id = '$_GET[delete]'";

        $result = mysqli_query($link,$query);
        if(!$result) {
            die("Could not run query");
        } else {
            echo "Success";
        }
        $_SESSION['message'] = "1 data has been removed";
        $_SESSION['msg_type'] = "danger";
        header("location: index.php");
    }

    mysqli_close($link);
?>
