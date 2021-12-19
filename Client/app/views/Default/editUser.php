<!DOCTYPE html>
<html>
<head>
    <title>Modify Account</title>
    <link rel="stylesheet" type="text/css" href="../css/core.css">
    <link rel="stylesheet" type="text/css" href="../css/editUser.css">
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
        <div id="buttons">
            <a href='<?= BASE ?>/User/changeEmail/<?= $_SESSION['token'] ?>'>
                <button type="button" class="editBtn">Modify Account</button>
            </a><br>
            <a href='<?= BASE ?>/User/changePassword/<?= $_SESSION['user_id'] ?>'>
                <button type="button" class="editBtn">Change Password</button>
            </a><br>
            <a href='<?= BASE ?>/User/delete/<?= $_SESSION['user_id'] ?>' id="editLink" onclick="return confirm('Are you sure you want to delete your account?');"><p id="deleteText">Delete Account</p></a><br>
        </div>
    </div>

    <footer>
        &copy 2021 Cakes Co., Ltd. - Your number one cake supplier from Canada.
    </footer>
</body>
</html>