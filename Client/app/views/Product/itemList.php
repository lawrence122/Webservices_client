<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="../css/core.css">
    <link rel="stylesheet" type="text/css" href="../css/userProduct.css">
    <link rel="stylesheet" type="text/css" href="../css/adminProduct.css">
</head>
<body>
    
    <header><h1>Welcome to Sugar High! Where we have cakes and other cakes.</h1></header>

    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li class="curr_page"><a href='<?= BASE ?>/Item/getItems'>Items</a>
                <li><a href='<?= BASE ?>/Item/insert'>Add Item</a>
                <li><a href='<?= BASE ?>/Cart/insert'>Place order</a>
                <li><a href='<?= BASE ?>/Cart/index'>Orders</a>
                <!-- <li><a href='<?= BASE ?>/User/register'>Register</a> -->
            </ul>
        </nav>
    </div>

    <div class="products">
        <ul id="products-list">
            <?php
            if(!is_null($data)) {
                for($i = 0; $i < sizeof($data); $i++) {
                    echo "<li>
                            <div class='product'>
                                <div class='image'>
                                    <img src='" . $data[$i]['picture'] . "' style='width: 75%;'>
                                </div>
                                <h1 class='title'>".$data[$i]['item_name']."</h1>
                                <p class='price'>".$data[$i]['price']."$</p>
                                <p>".$data[$i]['description']."</p>
                                <p class='line'>Quantity: ".$data[$i]['stock']."</p><br>
                                <a href='" . BASE . "/Item/update/".$data[$i]['item_id']."'>
                                    <button class='adminBtn' type='button' id='edit'>Edit</button>
                                </a>
                                <a href='" . BASE . "/Item/delete/".$data[$i]['item_id']."'>
                                    <button class='adminBtn' type='button' id='delete'>Delete</button>
                                </a>
                            </div>";
                }
            }
            ?>
        </ul>
    </div>

    <footer>
        &copy 2021 Cakes Co., Ltd. - Your number one cake supplier from Canada.
    </footer>
</body>
</html>