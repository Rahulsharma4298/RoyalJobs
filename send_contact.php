<?php include_once 'config/init.php';
date_default_timezone_set('Asia/Kolkata');

$db = new Database;
if(!isset($_POST['email'])){
	die();
}
else{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$contact_message = $_POST['contact_message'];
	$date = date('Y-m-d H:i:s');
	$ip = getUserIp();
	

	$db->query("INSERT INTO contact (name, email, mobile, message, date, ip) VALUES(:name, :email, :mobile, :message, :date, :ip)");

	$db->bind(':name', $name);
	$db->bind(':email', $email);
	$db->bind(':mobile', $mobile);
	$db->bind(':message', $contact_message);
	$db->bind(':date', $date);
	$db->bind(':ip', $ip);

	if($db->execute()){
			redirect("index.php", "Message Sent!", "success");
		}else{
			echo "<script>alert('Something went wrong')</script>;";
			redirect("index.php");
		}
}



function getUserIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
?>

