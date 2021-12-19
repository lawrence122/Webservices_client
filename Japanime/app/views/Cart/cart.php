<!DOCTYPE html>
<html>
<head>
    <title>View Orders</title>
    <link rel="stylesheet" type="text/css" href="../css/core.css">
    <link rel="stylesheet" type="text/css" href="../css/cart.css">
</head>
<body>
    
    <header><h1>Welcome to Cakes! Where we have cakes and other cakes.</h1></header>

    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href='<?= BASE ?>/Item/getItems'>Items</a>
                <li><a href='<?= BASE ?>/Item/insert'>Add Item</a>
                <li><a href='<?= BASE ?>/Cart/index'>Put in an order</a>
                <li><a href='<?= BASE ?>/Cart/index'>Orders</a>
            </ul>
        </nav>
    </div>

    <div class="shopping-cart">
        <div class="title">
            Client Orders
        </div>
        <?php
            $index = 0;
            foreach ($data['products'] as $product) {
                echo "<div class='item'>
                        <div class='buttons'>
                            <span class='delete-btn'>
                                <a href='" . BASE . "/OrderDetails/delete/$product->product_id'>
                                    <img src='../img/delete.png'>
                                </a>
                            </span>
                        </div>

                        <div class='image'>
                            <img src='" . BASE . "/uploads/$product->filename' style='width: 40%;'>
                        </div>
     
                        <div class='description'>
                            <span>$product->product_name</span>
                        </div>
                        <div class='quantity'>
                            <a href='" . BASE . "/OrderDetails/addQty/$product->product_id'>
                                <button class='plus-btn' type='button' name='button'>
                                    <img src='../img/plus.png'>
                                </button>
                            </a>
                            <input type='text' name='name' value='" . $data['quantities'][$index]->product_quantity . "'>
                            <a href='" . BASE . "/OrderDetails/removeQty/$product->product_id'>
                            <button class='minus-btn' type='button' name='button'>
                                <img src='../img/minus.png'>
                            </button>
                        </a>
                    </div>
                    <div class='total-price'>" . $data['prices'][$index]->total_item_price . "$</div>
                    </div>";
                $index++;
            }
        ?>
    </div>

    <div class="line"></div>

    <div id="totalPrice">
        <label id="priceLabel">Total Price: </label>
            <label id="totalPriceLabel" name="total_price">
                <?php
                    $total_price = 0;

                    foreach ($data['prices'] as $price) {
                        $total_price += $price->total_item_price;
                    }

                    echo "$total_price$";
                ?>
            </label>
    </div>

    <div id="next-btn">
        <a href="<?=BASE?>/Default/home"><button id="continue-shopping">Continue Shopping</button></a>

        <?php
            if ($data['order_id'] != null) {
                echo "<a href='" . BASE . "/Order/update/" . $data['order_id'] . "'><button id='checkout'>Checkout</button></a>";
            } else {
                echo "<button id='checkout' disabled>Checkout</button>";
            }

        ?>
    </div>

    <footer>
        &copy 2021 Cakes Co., Ltd. - Your number one cake supplier from Canada.
    </footer>
</body>
</html>