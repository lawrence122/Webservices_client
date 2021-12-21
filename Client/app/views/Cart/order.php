<!DOCTYPE html>
<html>
<head>
    <title>Put in an Order</title>
    <link rel="stylesheet" type="text/css" href="../css/core.css">
    <link rel="stylesheet" type="text/css" href="../css/addProduct.css">
</head>
<body>
    <header><h1>Welcome to Sugar High! Where we have cakes and other cakes.</h1></header>

    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href='<?= BASE ?>/Item/getItems'>Items</a>
                <li><a href='<?= BASE ?>/Item/insert'>Add Item</a>
                <li class="curr_page"><a href='<?= BASE ?>/Cart/insert'>Place order</a>
                <li><a href='<?= BASE ?>/Cart/index'>Orders</a>
                <!-- <li><a href='<?= BASE ?>/User/register'>Register</a> -->
            </ul>
        </nav>
    </div>

    <div id="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <div id="form2">
                <h1>Place Your Order</h1>
                <label>Client Name: 
                    <input type="text" name="client_id">
                </label><br><br>
                <div class="products">
                    <ul id="products-list">
                        <label>Choose an item
                            <select name="item_ordered" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected>Choose an item</option>
                                <?php
                                if (!is_null($data)) {
                                    for ($i = 0; $i < sizeof($data); $i++) {
                                        if ($data[$i]['stock'] != 0) {
                                            echo "<option value='" . $data[$i]['item_id'] . "'>" . $data[$i]['item_name'] . "</option>";
                                        }
                                    }
                                }
                            ?>
                            <input name='amount' data-prefix='x' value='0' data-decimals='0' min='0' max='100' step='1' type='number' />
                            </select>
                        </label>
                    </ul>
                    <br><br>
                    <input id="add" type="submit" name="action" value="Add to Cart"><br><br>
                </div>
                
            </div>
        </form>
    </div>

    <footer>
        &copy 2021 Cakes Co., Ltd. - Your number one cake supplier from Canada.
    </footer>
</body>
</html>