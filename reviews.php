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

<h1 class="text-center">Reviews</h1>
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
        <div class="panel-heading">Reviews <a href="add.php" class="glyphicon glyphicon-plus"></a></div>
        <table class="table">
            <tr>
                <th width="5%">#</th>
                <th width="15%">Title</th>
                <th width="30%">body</th>
                <th width="15%">Customers</th>
                <th width="12%">product</th>
                <th width="13%">Date</th>
                <th width="3%">Note</th>
            </tr>
            <?php
            include 'dbclass.php';
            $db = new DB();
            $reviews = $db->getRows('reviews',array('order_by'=>'id DESC'));
            if(!empty($reviews)){ $count = 0; foreach($reviews as $reviews){ $count++;?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $reviews['title']; ?></td>
                <td><?php echo $reviews['body']; ?></td>
                <td><?php echo $reviews['customer']; ?></td>
                <td><?php echo $reviews['product']; ?></td>
                <td><?php echo $reviews['review_date']; ?></td>
                <td><?php echo $reviews['rating']; ?></td>
                <td>
                    <a href="edit-reviews.php?id=<?php echo $reviews['id']; ?>" class="glyphicon glyphicon-edit"></a>
                    <a href="action.php?action_type=delete&id=<?php echo $reviews['id']; ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure?');"></a>
                </td>
            </tr>
            <?php } }else{ ?>
            <tr><td colspan="4">No reviews(s) found......</td>
            <?php } ?>
        </table>
    </div>
</div>
