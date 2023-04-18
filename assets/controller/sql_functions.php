<?php
require_once __DIR__ . "/../database/DatabaseConnection.php";
session_start();

// $str = filter_var($str, FILTER_SANITIZE_FULL_SPECIAL_CHARS);


// CREATE -------------------------------------------------------------------------------------------------------------------
function create_User($name, $surname, $bdate, $age)
{
    // if everyone can create new user so that shouldn't validated.
    validate_Session_Direct_Login();

    global $db;

    try {
        $sql = "insert into user (name, surname, bdate, age) values (:name, :surname, :bdate, :age)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":code", $bdate, PDO::PARAM_STR);
        $stmt->bindValue(":age", $age, PDO::PARAM_INT);
        $stmt->execute();
        $lastInsertedId = $db->lastInsertId();
    } catch (PDOException $ex) {
        die("<p>Insert Error : " . $ex->getMessage());
        return false;
    }

    return true;
}

// READ -------------------------------------------------------------------------------------------------------------------
function read_All()
{
    validate_Session_Direct_Login();

    global $db;

    try {
        $sql = "select * from user";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $stmt->rowCount();
    } catch (Exception $ex) {
        die("Query Error : " . $ex->getMessage());
        return false;
    }

    return $rows;
}

function read_Joined()
{

    validate_Session_Direct_Login();

    global $db;

    try {
        $sql = "select project.id as id, name, description, photo, start_date, end_date,
        TIMEDIFF(end_date, current_timestamp()) as due, progress, department_id, state_id
        from project 
        inner join project_state 
        ON project.state_id = project_state.id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $stmt->rowCount();
    } catch (Exception $ex) {
        die("Query Error : " . $ex->getMessage());
    }

    return $rows;
}

function read_Specific($id)
{
    validate_Session_Direct_Login();

    global $db;

    try {
        $sql = "select id, email, name, surname
        from user
        where id = :id";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        // $stmt->rowCount();
    } catch (Exception $ex) {
        die("Query Error : " . $ex->getMessage());
        return false;
    }

    return $user;
}

// DELETE -------------------------------------------------------------------------------------------------------------------
function delete_User($id)
{
    validate_Session_Direct_Login();

    global $db;

    try {
        $sql = "delete from user where id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        // $deletedRowCount = $stmt->rowCount();
    } catch (PDOException $ex) {
        return false;
        die("<p>Update Error : " . $ex->getMessage());
    }

    return true;
}

// UPDATE -------------------------------------------------------------------------------------------------------------------
function update_User($id, $name, $surname)
{
    validate_Session_Direct_Login();

    global $db;

    try {
        $sql = "update user
                set name = :name, surname = :surname
                where id = :id
        ";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":surname", $surname, PDO::PARAM_INT);
        $stmt->execute();
        // $updatedRowCount = $stmt->rowCount();
    } catch (PDOException $ex) {
        die("Insert Error : " . $ex->getMessage());
        return false;
    }

    return true;
}

// SESSION -------------------------------------------------------------------------------------------------------------------

function validate_Session_Direct_Login()
{
    // 2 direct method not to create loop
    if (!has_Valid_Session()) {
        header("Location: ./../../index.php");
        exit;
    }
}

function validate_Session_Direct_Main()
{
    if (has_Valid_Session()) {
        header("Location: ./assets/views/main.php");
        exit;
    }
}

function perform_Login_Operation($email, $password, $remember)
{
    global $db;

    $password = sha1($password . "SOCI");

    try {
        $sql = "select email, name, surname from user where email = :email and password = :password";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        die("Query Error : " . $ex->getMessage());
    }

    if ($row == false)
        return false;
    else {
        // correct login, form session
        $_SESSION["user"] = $row;
        if ($remember == "true") {
            setcookie(session_name(), session_id(), time() + 60 * 60 * 24 * 7, "/");
        }

        return true;
    }
}

function has_Valid_Session()
{
    if (isset($_SESSION["user"])) {
        return true;
    }
    return false;
}

function log_Out()
{
    $_SESSION = [];

    // delete cookie
    setcookie(session_name(), "", 1, "/"); // delete memory cookie 

    // delete session file from tmp
    session_destroy();

    // header("Location:http://localhost/AhmetOguzErgin/Web/project_manager/");
}

function get_Session()
{
    return $_SESSION["user"];
}

// FILE -------------------------------------------------------------------------------------------------------------------
function create_Photo($tempLocation, $fileName, $targetLocation)
{
    if (move_uploaded_file($tempLocation, $targetLocation . $fileName)) {
        return true;
    }

    // if ($oldIcon["icon"] != "default_icon.png")
    //     unlink("../images/company/{$oldIcon["icon"]}");

    return false;
}
