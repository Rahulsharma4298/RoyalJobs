<?php
include_once 'config/init.php';
date_default_timezone_set('Asia/Kolkata');

// include database and object files
// get database connection
$database = new DatabaseAuth();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);
// set ID property of user to be edited
$user->email = isset($_POST['email']) ? $_POST['email'] : die();
$user->password = base64_encode(isset($_POST['password']) ? $_POST['password'] : die());
// read the details of user to be edited
$stmt = $user->login();
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $user_arr=array(
        "status" => true,
        "message" => "Login Successfull!",
        "uid" => $row['uid'],
        "email" => $row['email']
    );
    $_SESSION['email'] = $user->email;
    $_SESSION['uid'] = $user_arr['uid'];
    redirect("dashboard.php", $user_arr['message'], "success");
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Invalid Username or Password!",
    );

    redirect("login.php", $user_arr['message'], "error");

}
// make it json format
print_r(json_encode($user_arr));
?>

