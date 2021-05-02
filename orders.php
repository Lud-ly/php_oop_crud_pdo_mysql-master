<!-- File: src/Template/Posts/index.ctp -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
  .users-content{padding:50px}
  table tr th, table tr td{font-size: 1.2rem;}
  .row{ margin:20px 20px 20px 20px;width: 100%;}
  .glyphicon{font-size: 20px;}
  .glyphicon-plus{float: right;color:green!important}
  a.glyphicon{text-decoration: none;color:black}
  a.glyphicon-trash{margin-left: 10px;color:red}
  p.statusMsg{text-align:center;font-size:50px;color:green;}
</style>

<h1 class="text-center">Orders</h1>
<div class="col text-center">
    <button class="btn btn default center"><a href="index.php">Customers</a></button>
    <button class="btn btn default center"><a href="orders.php">Orders</a></button>
    <button class="btn btn default center"><a href="products.php">Products</a></button>
    <button class="btn btn default center"><a href="reviews.php">Reviews</a></button>
</div>

<?php
session_start();
if(!empty($_SESSION['statusMsg'])){
    echo '<p class="statusMsg">'.$_SESSION['statusMsg'].'</p>';
    unset($_SESSION['statusMsg']);
}
?>

<div class="row text-center user-list">
    <div class="panel panel-success users-content">
        <div class="panel-heading">Orders <a href="add.php" class="glyphicon glyphicon-plus"></a></div>
        <table class="table">
            <tr>
                <th width="30%">#</th>
                <th width="30%">Custumer</th>
                <th width="30%">Product</th>
            </tr>
            <?php
            include 'dbclass.php';
            $db = new DB();
            $orders = $db->getRows('orders',array('order_by'=>'id DESC'));
            if(!empty($orders)){ $count = 0; foreach($orders as $order){ $count++;?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $order['customer']; ?></td>
                <td><?php echo $order['product']; ?></td>
                <td>
                    <a href="edit-orders.php?id=<?php echo $order['id']; ?>" class="glyphicon glyphicon-edit"></a>
                    <a href="action.php?action_type=delete&id=<?php echo $order['id']; ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure?');"></a>
                </td>
            </tr>
            <?php } }else{ ?>
            <tr><td colspan="4">No order(s) found......</td>
            <?php } ?>
        </table>
    </div>
</div>
