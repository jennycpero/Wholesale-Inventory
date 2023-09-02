<?php 
    session_start();
?>
<html>
    <head>
        <title>Pero Wholesale - Results</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <div id="titlebar">
            <h1>Pero Wholesale</h1>
        </div>
        <div class="container">
            <h2>Results</h2>
            <div id="bigunderline"></div>
            
            <?php
            mysqli_report(MYSQLI_REPORT_OFF);
            $conn = new mysqli("localhost", "id20554322_jpero","+zzCcI9ksKttgH&c","id20554322_cs697aqdb");
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $_SESSION["pName"] = $_GET["pName"];
            $_SESSION["wCity"] = $_GET["wCity"];
            $_SESSION["minQty"] = $_GET["minQuantity"];
            $_SESSION["maxQty"] = $_GET["maxQuantity"];
            $_SESSION["minPrice"] = $_GET["minPrice"];
            $_SESSION["maxPrice"] = $_GET["maxPrice"];
            
            
            $mainQuery = "SELECT * FROM products WHERE 1=1"; // WHERE 1=1 turns it into normal select * when no parameters
            $pNameQuery = "pname LIKE \"%{$_SESSION["pName"]}%\"";
            $wCityQuery = "city LIKE \"%{$_SESSION["wCity"]}%\"";
            $minQtyQuery = "quantity >= {$_SESSION["minQty"]}";
            $maxQtyQuery = "quantity <= {$_SESSION["maxQty"]}";
            $minPriceQuery = "price >= {$_SESSION["minPrice"]}";
            $maxPriceQuery = "price <= {$_SESSION["maxPrice"]}";
            
            // .= appends string to another string
            if ($_SESSION["pName"] != "") {
                $mainQuery .= " AND $pNameQuery";
            }
            if ($_SESSION["wCity"] != "") {
                $mainQuery .= " AND $wCityQuery";
            }
            if ($_SESSION["minQty"] != "") {
                $mainQuery .= " AND $minQtyQuery";
            }
            if ($_SESSION["maxQty"] != "") {
                $mainQuery .= " AND $maxQtyQuery";
            }
            if ($_SESSION["minPrice"] != "") {
                $mainQuery .= " AND $minPriceQuery";
            }
            if ($_SESSION["maxPrice"] != "") {
                $mainQuery .= " AND $maxPriceQuery";
            }
            
            $query = mysqli_query($conn,$mainQuery);
            mysqli_close($conn);

            if (mysqli_num_rows($query) > 0) {
                echo "<table style='margin-left:5%'>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>Quantity</th>
                <th>Price</th>
                </tr>";
                
                while($row = mysqli_fetch_array($query))
                {
                    echo "<tr>";
                    echo "<td>" . $row['pid'] . "</td>";
                    echo "<td>" . $row['pname'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else {
                echo "<h3 style='color:red; margin-left:4%'>We couldn't find any products that match the search criteria.</h3>";
            }
            ?>

            <button onclick="location.href='index.php'" class="btn" id="results-btn" type="button">Perform Another Search</button>
        </div>
    </body>
</html>


