<?php
include 'dbconnection.php';

// Initialize the session
session_start();


 
// Check if the user is logged in, if not then redirect him to login page
if( $_SESSION["staff"] !== "Yes"){
    header("location: staff-login.php");
    exit;
}
$check;
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $item = $_POST["item_name"];
        $desc =  $_POST["desc"];
        $quantity = $_POST["quan"];
        $price = $_POST["price"];
        $image = $_FILES['image']['tmp_name'];
        $img = file_get_contents($image);

        $category = $_POST['category'];
        switch ($category) {
            case 'Book':
                $check = $category;
                break;
            case 'Stationery':
              $check = $category;
                break;
            case 'Service':
              $check = $category;
                break;

            }
//     // Validate credentials
        // Prepare a select statement
        $sql = "INSERT INTO items (item_name, descript, category, in_stock, price, img) VALUES (?,?,?,?,?,?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssiis", $item_n,$d,$check,$quan,$prices,$img);
            $item_n = $item;
            $d = $desc;
            $categ = $check;
            $quan = $quantity;
            $prices = $price;
            echo"inserted";
            mysqli_stmt_execute($stmt);
        }
        else{
            echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);
        }
            // Attempt to execute the prepared statement
   
            // Close statement
            mysqli_stmt_close($stmt);
    // Close connection
    mysqli_close($conn);
}

?>
 
<!DOCTYPE html>
<meta charset="UTF-8">
    <script src="functions.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="table.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Items</title>
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<div class = "top">
<hr id = "topline" style="height:10px;border-width:0;color:gray;background-color:#A00000;">
<div class = "logo">
<a href="homepage.php">
    <img src="Logo.png" width=" 154" height="60">
</a>
</div>
<div class="navbarAdmin">
<a id = "navA" href = "/addItem.php" id = "add" >Add Item</a>
  <a id = "navA"href = "/orders.php" id = "order" >Awaiting Orders</a>
    <hr id = "line" style="height:1px;border-width:0;color:gray;background-color:gray;">
  </div>
  <form action="logout.php" method="POST">
  <input id ="logoutBut" type="submit" name="destroySession" id = "exit" value="Logout" />
  </form>
</div>


<body>
<div class="sidebar" style="width:50%">
  <a href = "#addItem" id = "add" onclick = "staffPage('add')" >Add Item</a>
  <a href = "#orders" id = "order" onclick = "StaffPage('order')" >Awaiting Orders</a>

</div>
  <div id="adminOptions">
  </div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
<div class = "insertItem">
<label for="category">Category:</label><br>
<select id="category" name="category">
    <option value="Book">Book</option>
    <option value="Stationery">Stationery</option>
    <option value="Service">Service</option>
  </select>

<br><label for="item_name">Item name:</label><br>
<input type="text" id="item_name" name="item_name" value=""><br>

<label for="desc">Description:</label><br>
<input type="text" id="desc" name="desc" value=""><br>

<label for="quan">Quantity:</label><br>
<input type="number" id="quan" name="quan" value=""><br>

<label for="price">Price:</label><br>
<input type="number" id="price" name="price" value=""><br>

<label for="img">Image upload:</label><br>
<input type="file" id="img" name="image" value=""><br>
<br> 
<input class="btn btn-primary" id ="entBut" type="submit" name="insert" value="Add Item" />
</div>
</form>
<div class = "itemList">
  <h2> Items into Database </h2>
<?php
include 'dbconnection.php';

   $sql = "SELECT * FROM items"; //You don't need a ; like you do in SQL
   $result = $conn->query($sql);
   echo "<table id = 'table2'>"; // start a table tag in the HTML
   echo "<tr>
     <th>Item</th>
     <th>Description</th>
     <th>Category</th> 
     <th>Quantity</th>
     <th>Price</th>
     <th>Image</th>
   </tr>";
   while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
   echo " <tr>
   <td>" . $row['item_name'] . "</td>
   <td>" . $row['descript'] . "</td>
   <td>" . $row['category'] . "</td>
   <td>" . $row['in_stock'] . "</td>
   <td>" . $row['price'] . "</td>";
   echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" width= "100" height="150"/></td>';
echo"
   </tr>";

   }
   
   echo "</table>"; //Close the table in HTML
   

   mysqli_close($conn);
?>
</div>
</body>
</html>