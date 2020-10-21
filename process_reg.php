<?php

// get database connection
include_once 'config/init.php';
date_default_timezone_set('Asia/Kolkata');
 
$database = new DatabaseAuth();
$db = $database->getConnection();
 
$user = new User($db);
 
// set user property values

$user->first_name = $_POST['first_name'];
$user->last_name = $_POST['last_name'];
$user->email = $_POST['email'];
$user->password = base64_encode($_POST['password']);
$user->city = $_POST['city'];
$user->mobile = $_POST['mobile'];
$user->created = date('Y-m-d H:i:s');
$user->ip = $user->getUserIp();


 
// create the user
if($user->signup()){
    $user_arr=array(
        "status" => true,
        "message" => "Signup Successfull!",
        "id" => $user->uid,
        "email" => $user->email
    );
    redirect('login.php', $user_arr['message'], 'success');
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Email already exists!"
    );
    redirect('register.php', $user_arr['message'], 'error');
}
print_r(json_encode($user_arr));


?>
