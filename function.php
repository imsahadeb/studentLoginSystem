<?php

function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

?>


<?php
	
	
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}
        
        function logged_in_as_admin() {
		return isset($_SESSION['admin_user_id']);
	}
	
	function confirm_logged_in_as_admin() {
		if (!logged_in_as_admin()) {
			redirect_to("admin_login.php");
		}
	}
?>
 
