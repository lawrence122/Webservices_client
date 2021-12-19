<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="../../css/core.css">
    <link rel="stylesheet" type="text/css" href="../../css/editUser.css">
</head>
<body>
    <header><h1>Welcome to Cakes! Where we have cakes and other cakes.</h1></header>

    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href='<?= BASE ?>/Item/getItems'>Items</a>
                <li><a href='<?= BASE ?>/Item/insert'>Add Item</a>
                <li><a href='<?= BASE ?>/Cart/insert'>Place order</a>
                <li><a href='<?= BASE ?>/Cart/index'>Orders</a>
            </ul>
        </nav>
    </div>

    <div id="wrapper">
        <form action="" method="POST">
            <div id="form">
                <h1>Change Password</h1><br>
                <label>New Password: </label>
                    <input type="password" id="pswd" name="password">
                <br><br>

                <label>Confirm Password: </label>
                <input type="password" name="password_confirm" id="validPswd">
            </div>
            <br><br>

            <input type="submit" id="edit" name="action" value="Submit Changes">
            <a href='<?= BASE ?>/User/index' id="editLink"><p id="goBack">Go Back</p></a><br>
        </form>
    </div>

    <footer>
        &copy 2021 Cakes Co., Ltd. - Your number one cake supplier from Canada.
    </footer>
</body>
</html>