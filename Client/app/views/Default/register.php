<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="../css/core.css">
	<link rel="stylesheet" type="text/css" href="../css/addProduct.css">
	<link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>
	<?php
		if(isset($_GET['error'])) {
			echo "<script type='text/javascript'> alert('$_GET[error]'); </script>";
		}
	?>
    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href='<?= BASE ?>/Item/getItems'>Items</a>
                <li><a href='<?= BASE ?>/Item/insert'>Add Item</a>
                <li><a href='<?= BASE ?>/Cart/insert'>Place order</a>
                <li><a href='<?= BASE ?>/Cart/index'>Orders</a>
                <li class="curr_page"><a href='<?= BASE ?>/User/register'>Register</a>
            </ul>
        </nav>
    </div>

	<div id="wrapper">
		<form name="register" action="" method="POST">
			<h1>Register your shop below!</h1>
			<p>Fields indicated by <span class="star">*</span> are obligatory.</p>

			<div id="form">
				<label><span class="star">*</span>Email: </label>
				<input type="text" id="email" name="email" required><br><br>

				<label><span class="star">*</span>Select a password: </label>
				<input type="password" id="pswd" name="password" required><span class="tooltiptext">

				<br><br>

				<label><span class="star">*</span>Confirm password: </label>
				<input type="password" name="password_confirm" id="validPswd" required>
			</div>
			<br>

            <input type="submit" id="register" name="action" value="Register">
		</form>
	</div>
</body>
</html>