<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <link rel="stylesheet" type="text/css" href="../css/core.css">
    <link rel="stylesheet" type="text/css" href="../css/addProduct.css">
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
        <form action="" method="post" enctype="multipart/form-data">
            <div id="form">
                <h1>Add Item</h1><br>
                <label>Item Name: 
                    <input type="text" name="product_name">
                </label><br><br>

                <label>Select an image file to upload: <br>
                    <input type="file" name="myImage">
                </label><br><br>

                <label>Description: </label><br>
                    <textarea name="description"></textarea>
                <br><br>

                <label>Price: 
                    <input type="text" name="price">
                </label><br><br>

                <label>Quantity: 
                    <input type="text" name="quantity">
                </label><br><br>
            </div>

            <input id="add" type="submit" name="action" value="Add Product"><br><br>
        </form>
    </div>

    <footer>
        &copy 2021 Cakes Co., Ltd. - Your number one cake supplier from Canada.
    </footer>
</body>
</html>