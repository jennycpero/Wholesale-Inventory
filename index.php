<?php
    session_start();
?>
<html>
    <head>
        <title>Pero Wholesale - Search</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <div id="titlebar">
            <h1>Pero Wholesale</h1>
        </div>
        <div class="container">
            <h2>Find what you need</h2>

            <form id="productsForm" action="search.php" target="_blank">
                <label for ='pName'>Product Name:</label>
                <input type="text" id="pName" name="pName" value="<?php if (isset($_SESSION['pName'])) { echo $_SESSION['pName']; } ?>"><br><br>
                
                <label for ='wCity'>Warehouse City:</label>
                <input type="text" id="wCity" name="wCity" value="<?php if (isset($_SESSION['wCity'])) { echo $_SESSION['wCity']; } ?>"; ?><br><br>

                <div id="quantity-entries">
                    <label for ='minQuantity'>Minimum Quantity:</label>
                    <input type="text" id="minQuantity" name="minQuantity" value="<?php if (isset($_SESSION['minQty'])) { echo $_SESSION['minQty']; } ?>">
                </div>

                <div id="quantity-entries">
                    <label for ='maxQuantity'>Maximum Quantity:</label>
                    <input type="text" id="maxQuantity" name="maxQuantity" value="<?php if (isset($_SESSION['maxQty'])) { echo $_SESSION['maxQty']; } ?>">
                </div><br><br>

                <div id="price-entries">
                    <label for ='minPrice'>Minimum Price:</label>
                    <input type="text" id="minPrice" name="minPrice" value="<?php if (isset($_SESSION['minPrice'])) { echo $_SESSION['minPrice']; } ?>"> 
                </div>

                <div id="price-entries">
                    <label for ='maxPrice'>Maximum Price:</label>
                    <input type="text" id="maxPrice" name="maxPrice" value="<?php if (isset($_SESSION['maxPrice'])) { echo $_SESSION['maxPrice']; } ?>">
                </div>
                <br><br>
                <button class="btn" type="submit" id="search-btn">Search Products</button>
                <button class="btn" type="button" id="clear-btn" onclick=clearForm()>Clear Form</button>
            </form>
        </div>
    </body>
</html>