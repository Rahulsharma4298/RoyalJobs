<?php
	//Redirect to Page
	function redirect($page = FALSE, $message = NULL, $message_type = NULL){
		if(is_string($page)){
			$location = $page;
		}else{
			$location = $_SERVER['SCRIPT_NAME'];
		}

		//Check for Message
		if($message != NULL){
			//Set Message
			$_SESSION['message'] = $message;
		}
		//Check for Type
		if($message_type != NULL){
			//Set Message Type
			$_SESSION['message_type'] = $message_type;
		}

		//Redirect
		header ('Location: '.$location);
		exit;
}

	//Display Message
function displayMessage(){
	if(!empty($_SESSION['message'])){

			//Assign Message Var
		$message = $_SESSION['message'];

		if(!empty($_SESSION['message_type'])){
				//Assign Type Variable
			$message_type = $_SESSION['message_type'];
				//Create Object
			if($message_type == 'error') {
				if($message == 'Invalid Username or Password!'){
					echo '<script>swal("Login Error!", "Invalid Username or Password", "error");</script>';
				}

				elseif ($message == "You must login first!") {
						echo '<script>swal("You must login first!", "Please Login to continue", "error");</script>';
					}

				elseif ($message == "Old Password is not correct!") {
						echo '<script>swal("Old Password is not correct!", "Please type correct old password", "error");</script>';
					}	



				else{
					if($message == 'Email already exists!'){
					echo '<script>swal("Signup Error!", "Email already exists", "error");</script>';
				}

				}
				
							
			} else {
				if($message == 'Login Successfull!'){
					echo '<script>swal("Login Successfull!", "Welcome", "success");</script>';
				}
				else{
					if($message == 'Signup Successfull!'){
						echo '<script>swal("Signup Successfull!", "You can now login", "success");</script>';
				}
					elseif ($message == 'Message Sent!') {
						echo '<script>swal("Message Sent Successfully!", "We will look into it soon", "success");</script>';
				}

					elseif ($message == "Logout Successfull!") {
						echo '<script>swal("Logout Successfull!", "Good Bye!", "success");</script>';
					}

					elseif ($message == "Profile Updated Successfully!") {
						echo '<script>swal("Profile Updated Successfully!", "Information Updated", "success");</script>';
					}

					elseif ($message == "Password Changed Successfully!") {
						echo '<script>swal("Password Changed Successfully!", "Always Choose Secure Password", "success");</script>';
					}

					elseif ($message == "Successfully Applied for this Job!") {
						echo '<script>swal("Successfully Applied for this Job!", "Good Luck!", "success");</script>';
					}
						

					else{
						echo '';
					}
				}
				
							
			}

		}
		//Unset Message
		unset($_SESSION['message'] );
		unset($_SESSION['message_type'] );
	}else {
		echo '';
	}
}