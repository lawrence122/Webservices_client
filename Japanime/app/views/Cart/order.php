<!DOCTYPE html>
<html>
<head>
    <title>Put in an Order</title>
    <link rel="stylesheet" type="text/css" href="../css/core.css">
    <link rel="stylesheet" type="text/css" href="../css/adminProduct.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
    <header><h1>Welcome to Cakes! Where we have cakes and other cakes.</h1></header>

    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href='<?= BASE ?>/Item/getItems'>Items</a>
                <li><a href='<?= BASE ?>/Item/insert'>Add Item</a>
                <li><a href='<?= BASE ?>/Cart/index'>Put in an order</a>
                <li><a href='<?= BASE ?>/Product/viewFigure'>Cart</a>
            </ul>
        </nav>
    </div>
    <div id="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <div id="form">
                <h1>Make Your Order (??)</h1>
                <!-- <input id="add" type="submit" name="action" value="Submit Your Order"><br><br> -->
                <label>Client's Name: 
                    <input type="text" name="client_id">
                </label><br><br>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Choose an item</option>
                    <?php
                    if(!is_null($data)) {
                        for($i = 0; $i < sizeof($data); $i++) {
                            if ($data[$i]['stock'] != 0) {
                                echo "<option value=' . $data[$i]['item_id'] . '>" . $data[$i]['item_name'] . "</option>";
                            }
                        }
                    }
                ?>
                </select>
                

                <!-- <div class="products">
                    <ul id="products-list">
                        <?php
                        if(!is_null($data)) {
                            for($i = 0; $i < sizeof($data); $i++) {
                                if ($data[$i]['stock'] != 0) {
                                    echo "<li>
                                            <div class='product'>
                                                <h1 class='title'>".$data[$i]['item_name']."</h1>
                                                <p class='price'>".$data[$i]['price']."$</p>
                                                <p>".$data[$i]['description']."</p>
                                                <a href='" . BASE . "/Cart/insert/".$data[$i]['item_id']."'>
                                                        <input id='add' type='submit' name='action' value='Add'>
                                                </a>
                                                <input name='" . $data[$i]['item_id'] . "_amount' data-prefix='x value='0' data-decimals='0' min='0' 
                                                    max='" . $data[$i]['stock'] . "' step='1' type='number' />
                                            </div>
                                            <a href='" . BASE . "/Item/update/".$data[$i]['item_id']."'>
                                                <button class='adminBtn' type='button' id='edit'>Edit</button>
                                            </a>
                                            <a href='" . BASE . "/Item/delete/".$data[$i]['item_id']."'>
                                                <button class='adminBtn' type='button' id='delete'>Delete</button>
                                            </a>";
                                }
                            }
                        }
                        ?>
                    </ul>
                </div> -->
            </div>
        </form>
    </div>
    <!-- <a href='" . BASE . "/Cart/insert/".$data[$i]['item_id']."'>
                                                    <button class='adminBtn' type='button' id='edit'>
                                                        <input id='add' type='submit' name='action' value='Add'>
                                                    </button>
                                                </a> -->
    <footer>
        &copy 2021 Cakes Co., Ltd. - Your number one cake supplier from Canada.
    </footer>
</body>
</html>