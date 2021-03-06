<!DOCTYPE html>
<html>
<head>
	<title>Show token</title>
	<link rel="stylesheet" type="text/css" href="../css/core.css">
    <link rel="stylesheet" type="text/css" href="../css/addProduct.css">
	<script src="../js/registration.js"></script>
</head>
<body>
    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href='<?= BASE ?>/Item/getItems'>Items</a>
                <li><a href='<?= BASE ?>/Item/insert'>Add Item</a>
                <li><a href='<?= BASE ?>/Cart/insert'>Place order</a>
                <li><a href='<?= BASE ?>/Cart/index'>Orders</a>
                <!-- <li class="curr_page"><a href='<?= BASE ?>/User/register'>Register</a> -->
            </ul>
        </nav>
    </div>

	<div id="wrapper">
        <div class="products">
            <ul id="products-list">
                <h1>Here's your API Key: <br><br>
                    <?= $data?></h1>
		        <p>Put it between the <span class="star">""</span> in the .env file.</p>
                <p>It should look like "TOKEN="[YOUR_API_KEY]"</p>
            </ul>
            <br><br>
        </div>
	</div>
</body>
</html>