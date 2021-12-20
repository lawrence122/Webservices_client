<?php
namespace App\controllers;

class UserController extends \App\core\Controller {

	function index() {
		$this->view('Default/showToken');
	}

	function register() {
		if (isset($_POST["action"])) {
			if ($_POST['password'] == $_POST['password_confirm']) {
				$user = new \App\models\User();
				$user->email = $_POST["email"];
				$user->password = $_POST["password"];
				$token = $user->insert();
				if (!$token || is_null($token)) {
					header('location:'.BASE.'/User/register?error=Client not inserted!');
				} else {
					$this->view('Default/showToken', $token);
					// header("location:".BASE."/User/index");
				}
            } else {
                header('location:'.BASE.'/User/register?error=Passwords do not match!');
            }
		} else {
			$this->view('Default/register');
		}
	}

	// function changeEmail() {
	// 	$user = new \App\models\User();

	// 	if (isset($_POST["action"])) {
	// 		$user->email = $_POST["email"];
	// 		$user->updateEmail($_SESSION['token'], $_POST["new_email"]);
	// 		header("location:".BASE."/Default/home");
	// 	} else {
	// 		$this->view('Default/editAccount');
	// 	}
	// }

	// function changePassword($user_id) {
	// 	$user = new \App\models\User();
	// 	// $user = $user->find($_SESSION['user_id']);

	// 	if (isset($_POST['action'])) {
	// 		if ($_POST['password'] == $_POST['password_confirm']) {
	//             $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
	//             // $user->updatePassword();
	//             header('location:'.BASE.'/Default/home');
	// 		}
    //     } else {
    //         $this->view('Default/changePassword', $user);
    //     }
	// }
}
?>