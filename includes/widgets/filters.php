<?php
	$cat_id = ((isset($_REQUEST['cat']))?checkInput($_REQUEST['cat']):'');
	$price_sort = ((isset($_REQUEST['price_sort']))?checkInput($_REQUEST['price_sort']):'');
	$min_price = ((isset($_REQUEST['min_price']))?checkInput($_REQUEST['min_price']):'');
	$max_price = ((isset($_REQUEST['max_price']))?checkInput($_REQUEST['max_price']):'');
	$b = ((isset($_REQUEST['brand']))?checkInput($_REQUEST['brand']):'');
	$brandQ = $db->query("SELECT * FROM brand ORDER BY brand");
?>
<br>
<br>
<h4 class="text-center">Search By:</h4>
<h5 class="text-center">Price</h5>
<form action="search.php" method="post">
	<input type="hidden" name="cat" value="<?php echo $cat_id; ?>">
	<input type="hidden" name="price_sort" value="0">
	<input type="radio" name="price_sort" value="low"<?php echo (($price_sort == 'low')?' checked':'');?>>Low to High<br>
	<input type="radio" name="price_sort" value="high"<?php echo (($price_sort == 'high')?' checked':'');?>>High to Low<br><br>
	<input type="text" name="min_price" class="price-range" placeholder="Min $" value="<?php echo $min_price;?>">To
	<input type="text" name="max_price" class="price-range" placeholder="Max $" value="<?php echo $max_price;?>"><br><br>
	<h4 class="text-center">Brand</h4>
	<input type="radio" name="brand" value=""<?php echo (($b == '')?' checked':''); ?>>All<br>
	<?php while($brand = mysqli_fetch_assoc($brandQ)): ?>
		<input type="radio" name="brand" value="<?php echo $brand['id']; ?>"<?php echo (($b == $brand['id'])?' checked':'');?>><?php echo $brand['brand']; ?><br>
	<?php endwhile; ?>
	<br>
	<input type="submit" value="Search" class="btn btn-xs ghost-button">
</form>