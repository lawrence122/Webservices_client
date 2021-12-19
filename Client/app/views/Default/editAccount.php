<!DOCTYPE html>
<html>
<head>
    <title>Modify Account Information</title>
    <link rel="stylesheet" type="text/css" href="../../css/core.css">
    <link rel="stylesheet" type="text/css" href="../../css/editUser.css">
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
                <h1>Modify Email</h1><br>
                <label>Current Email: 
                <input type="text" id="email" name="email"></label>
                <br><br>

                <label>New Email: 
                <input type="text" id="email" name="new_email"></label>
                <br><br>
                </div>

                <input type="submit" id="edit" name="action" value="Submit Changes">
                <a href='<?= BASE ?>/User/index' id="editLink"><p id="goBack">Go Back</p></a><br>
        </form>
    </div>

    <footer>
        &copy 2021 Cakes Co., Ltd. - Your number one cake supplier from Canada.
    </footer>
</body>
</html>