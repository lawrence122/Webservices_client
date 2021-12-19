<!DOCTYPE html>
<html>
<head>
    <title>Edit an Order</title>
    <link rel="stylesheet" type="text/css" href="../../css/core.css">
    <link rel="stylesheet" type="text/css" href="../../css/addProduct.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
    <header><h1>Welcome to Cakes! Where we have cakes and other cakes.</h1></header>

    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href='<?= BASE ?>/Cart/index'>Cancel</a>
            </ul>
        </nav>
    </div>
    <div id="wrapper">
        <!-- <?php
        var_dump($data);
        ?> -->
        <form action="" method="post" enctype="multipart/form-data">
            <div id="form">
                <h1>Add to Your Order</h1>
                <label>Client Name: <?= $data['cart']['client_id']?>
                    <!-- <input type="text" name="client_id" value="<?= $data['cart']['client_id']?>"> -->
                </label><br><br>
                <div class="products">
                    <ul id="products-list">
                        <label>Choose an item
                            <select name="item_ordered" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected>Choose an item</option>
                                <?php
                                if(!is_null($data['items'])) {
                                    for($i = 0; $i < sizeof($data['items']); $i++) {
                                        if ($data['items'][$i]['stock'] != 0) {
                                            echo "<option value='" . $data['items'][$i]['item_id'] . "'>" . $data['items'][$i]['item_name'] . "</option>";
                                        }
                                    }
                                }
                            ?>
                            </select>
                            <input name='amount' data-prefix='x' value='0' data-decimals='0' min='0' max='10' step='1' type='number' />
                        </label>
                </ul>
            </div>
            <input id="add" type="submit" name="action" value="Add to Cart"><br><br>
    </div>

    <footer>
        &copy 2021 Cakes Co., Ltd. - Your number one cake supplier from Canada.
    </footer>
</body>
</html>