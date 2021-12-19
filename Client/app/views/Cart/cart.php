<!DOCTYPE html>
<html>
<head>
    <title>View Orders</title>
    <link rel="stylesheet" type="text/css" href="../css/core.css">
    <link rel="stylesheet" type="text/css" href="../css/cart.css">
    <link rel="stylesheet" type="text/css" href="../css/adminProduct.css">
</head>
<body>
    
    <header><h1>Welcome to Cakes! Where we have cakes and other cakes.</h1></header>

    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href='<?= BASE ?>/Item/getItems'>Items</a>
                <li><a href='<?= BASE ?>/Item/insert'>Add Item</a>
                <li><a href='<?= BASE ?>/Cart/insert'>Place order</a>
                <li class="curr_page"><a href='<?= BASE ?>/Cart/index'>Orders</a>
            </ul>
        </nav>
    </div>

    <div class="shopping-cart">
        <div class="title">
            Client Orders
        </div>
        <?php
            for ($i = 0; $i < sizeof($data); $i++) {
                if ($data[$i]['cart_status'] != "Completed" && $data[$i]['cart_status'] != "Cancelled") {
                    echo "<div class='item'>
                            <div class='buttons'>
                                <span class='delete-btn'>
                                    <a href='" . BASE . "/Cart/cancel/".$data[$i]['cart_id']."'>
                                        <img src='../img/delete.png'>
                                    </a>
                                </span>
                            </div>
         
                            <div class='description'>
                                <span id='client'>".$data[$i]['client_id']."</span>
                            </div>
                            <div class='description'>
                                Item Name<span>".$data[$i]['items'][0]['item_name']."</span>
                            </div>
                            <div class='quantity'>
                                <a href='" . BASE . "/Cart/update/".$data[$i]['cart_id']."'>
                                    <button class='adminBtn' type='button' id='edit'>Completed</button>
                                </a>
                                <a href='" . BASE . "/Cart/edit/".$data[$i]['cart_id']."'>
                                    <button class='adminBtn' type='button' id='edit'>Add to Order</button>
                                </a>
                            </div>
                        <div class='total-price'>".$data[$i]['items'][0]['amount']."$</div>
                        </div>";
                }
            }
        ?>
    </div>

    <footer>
        &copy 2021 Cakes Co., Ltd. - Your number one cake supplier from Canada.
    </footer>
</body>
</html>