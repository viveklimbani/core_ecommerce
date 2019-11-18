<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
  if(!empty($_SESSION["shopping_cart"])) {
   foreach($_SESSION["shopping_cart"] as $key => $value) {
    if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
    }
    if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
  }		
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
      $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
      }
    }
    
  }
  ?>
  <html>
  <head>
    <title>Purchase Product</title>
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
  </head>
  <style>
   #logout{
    float:right;
    background-color:blue;
    color:white;
    margin-right:30px;
  }
  #back{
    float:right;
    background-color:blue;
    color:white;
    margin-right:30px;
  }
</style>
<body>
  <h1 style="background:black; color: white"><center>Product View</center></h1>
  <button class="btn" id="logout" name="logout">Log Out</a></button>
  <a href='product_view.php'>
    <button class="btn btn-primary" id="back" name="back">Back</button></a>
  </div></h1>
  <div style="width:700px; margin:100 auto; border:2px solid black;">

    <h2 style="margin-left: 10px;">View Added Product</h2>   

    <?php
    if(!empty($_SESSION["shopping_cart"])) {
      $cart_count = count(array_keys($_SESSION["shopping_cart"]));
      ?>
      <div class="cart_div">
        <a href="cart.php" style="margin-right: 10px;">
          <img src="cart-icon.png" / style="margin-right: 10px;"> Cart
          <span><?php echo $cart_count; ?></span></a>
        </div>
        <?php
      }
      ?>

      <div class="cart">
        <?php
        if(isset($_SESSION["shopping_cart"])){
          $total_price = 0;
          ?>	
          <table class="table">
            <tbody>
              <tr>
                <td></td>
                <td>ITEM NAME</td>
                <td>QUANTITY</td>
                <td>UNIT PRICE</td>
                <td>ITEMS TOTAL</td>
              </tr>	
              <?php		
              foreach ($_SESSION["shopping_cart"] as $product){
                ?>
                <tr>
                  <td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
                  <td><?php echo $product["name"]; ?><br />
                    <form method='post' action=''>
                      <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                      <input type='hidden' name='action' value="remove" />
                      <button type='submit' class='remove'>Remove Item</button>
                    </form>
                  </td>
                  <td>
                    <form method='post' action=''>
                      <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                      <input type='hidden' name='action' value="change" />
                      <select name='quantity' class='quantity' onchange="this.form.submit()">
                        <option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
                        <option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
                        <option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
                        <option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
                        <option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
                      </select>
                    </form>
                  </td>
                  <td><?php echo "Rs/-".$product["price"]; ?></td>
                  <td><?php echo "Rs/-".$product["price"]*$product["quantity"]; ?></td>
                </tr>
                <?php
                $total_price += ($product["price"]*$product["quantity"]);
              }
              ?>
              <tr>
                <td colspan="5" align="right">
                  <strong>TOTAL: <?php echo "Rs/-".$total_price; ?></strong>
                </td>
              </tr>
            </tbody>
          </table>		
          <?php
        }else{
         echo "<h3>Your cart is empty!</h3>";
       }
       ?>
     </div>

     <div style="clear:both;"></div>

     <div class="message_box" style="margin:10px 0px;">
      <?php echo $status; ?>
    </div>
  </div>
</body>
</html>