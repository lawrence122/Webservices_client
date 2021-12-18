<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
</head>
<body>

	<header><h1>Welcome to Cakes! Where we have cakes and other cakes.</h1></header>

	<div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li class="curr_page">Items
                <li>Cart
            </ul>
        </nav>
    </div>

    <?php var_dump($_SESSION['token']) ?>
    
<form>
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname">
</form>

<footer>
        &copy 2021 Cakes Co., Ltd. - Your number one cake supplier from Canada.
</footer>
    
</body>
</html>