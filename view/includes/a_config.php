<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/k1818793/CourseWork/controller/matches.php":
			$CURRENT_PAGE = "Matches"; 
			$PAGE_TITLE = "Marauders | Club Matches";
			break;
		case "/k1818793/CourseWork/controller/change_password.php":
			$CURRENT_PAGE = "Change_Password";
			$PAGE_TITLE = "Change Password";
			break;
		case "/k1818793/CourseWork/controller/tickets.php":
			$CURRENT_PAGE = "Tickets"; 
			$PAGE_TITLE = "Marauders | Match Tickets";
			break;
		case "/k1818793/CourseWork/controller/profile.php":
			$CURRENT_PAGE = "Profile"; 
			$PAGE_TITLE = "Marauders | User Profile";
            break;
        case "/k1818793/CourseWork/controller/cart.php":
            $CURRENT_PAGE = "Cart"; 
            $PAGE_TITLE = "Marauders | My Cart";
			break;
		case "/k1818793/CourseWork/controller/register.php":
			$CURRENT_PAGE = "Register"; 
			$PAGE_TITLE = "Marauders | Register";
			break;
		case "/k1818793/CourseWork/controller/login.php":
			$CURRENT_PAGE = "Login"; 
			$PAGE_TITLE = "Marauders | Login";
			break;
		case "/k1818793/CourseWork/controller/checkout.php":
			$CURRENT_PAGE = "Checkout"; 
			$PAGE_TITLE = "Marauders | Checkout";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Marauders | Home";
	}
?>
