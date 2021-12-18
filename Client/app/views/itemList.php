<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="../css
    /core.css">
    <link rel="stylesheet" type="text/css" href="../css
    /userProduct.css">
</head>
<body>
    
    <header><h1>Welcome to Cakes! Where we have cakes and other cakes.</h1></header>

    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href='C:\xampp\htdocs\webservices_client\client\app\controllers\ItemController\getItems'>Items</a>
                <li><a href='C:\xampp\htdocs\webservices_client\client\app\controllers\ItemController\insert'>Add Item</a>
                <li>Cart
            </ul>
        </nav>
    </div>

    <div class="products">
        <ul id="products-list">
            <!-- <?php
                foreach ($data as $item) {
                    echo "<li>
                            <div class='product'>
                                <img src='" . BASE . "/uploads/$item->picture' style='width: 100%;'>
                                <h1 class='title'>$item->item_name</h1>
                                <p class='price'>$item->price$</p>
                                <p>$item->description</p>";
                    if ($item->stock == 0) {
                        echo "<button type='button' class='m_btn' disabled>Add to Cart</button>
                                <p class='line'>Quantity: $item->stock</p>
                            </div>";
                    } else {
                        echo "<a href='" . BASE . "/OrderDetails/add/$item->item_id'><button type='button' class='m_btn'>Add to Cart</button></a>
                                <p class='line'>Quantity: $item->stock</p>
                            </div>";
                    }
                }
            ?> -->
        </ul>
    </div>

    <footer>
        &copy 2021 Cakes Co., Ltd. - Your number one cake supplier from Canada.
    </footer>
</body>
</html>