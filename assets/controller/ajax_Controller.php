<?php
require_once __DIR__ . "/sql_functions.php";
header("Content-Type: application/json");

// POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["opt"])) {
        // CREATE
        if ($_POST["opt"] == "create_User")
            echo json_encode(create_User($_POST["email"], $_POST["password"], $_POST["name"], $_POST["surname"]));

        // UPDATE
        elseif ($_POST["opt"] == "update_User")
            echo json_encode(update_User($_POST["id"], $_POST["email"], $_POST["password"], $_POST["name"], $_POST["surname"]));

        // SESSION
        elseif ($_POST["opt"] == "perform_Login_Operation")
            echo json_encode(perform_Login_Operation($_POST["email"], $_POST["password"], $_POST["remember"]));


        // if ($_POST["opt"] == "updateUserInformations") {
        //     if (isset($_FILES["file"])) {
        //         echo json_encode(updateUserInformations($_POST["id"], $_FILES["file"]["tmp_name"]));
        //     } else {
        //         echo json_encode(updateUserInformations($_POST["id"], "no file"));
        //     }
        // }
    }
}
// GET
elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["opt"])) {
        // READ
        if ($_GET["opt"] == "read_All")
            echo json_encode(read_All());

        // READ
        elseif ($_GET["opt"] == "read_Specific")
            echo json_encode(read_Specific($_GET["id"]));

        // DELETE
        elseif ($_GET["opt"] == "delete_User")
            echo json_encode(delete_User($_GET["id"]));

        elseif ($_GET["opt"] == "log_Out")
            echo json_encode(log_Out());

        // elseif ($_GET["opt"] == "read_Joined")
        //     echo json_encode(read_Joined());
    }
}
