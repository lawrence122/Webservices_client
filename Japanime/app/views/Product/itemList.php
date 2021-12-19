<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="../css
    /core.css">
    <link rel="stylesheet" type="text/css" href="../css
    /userProduct.css">
    <link rel="stylesheet" type="text/css" href="../css
    /adminProduct.css">
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

    <div class="products">
        <ul id="products-list">
            <?php
            if(!is_null($data)) {
                for($i = 0; $i < sizeof($data); $i++) {
                    echo "<li>
                            <div class='product'>
                                <h1 class='title'>".$data[$i]['item_name']."</h1>
                                <p class='price'>".$data[$i]['price']."$</p>
                                <p>".$data[$i]['description']."</p>
                                <p class='line'>Quantity: ".$data[$i]['stock']."</p>
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

<!-- <img src='" . BASE . "/uploads/$item->picture' style='width: 100%;'> -->



