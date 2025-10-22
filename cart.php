<?php
error_reporting(0);
session_start();
	$mail=$_SESSION['alogin'];
	$id=$_SESSION['pid'];
?>
<?php
$con=mysqli_connect("localhost","root","","organic_shop")or die ("Couldn't connect");
$cart_total=0;
$viewbrand1="Select * from tbl_product where pid=$id ";
$d_seller_brand1=mysqli_query($con,$viewbrand1);
$viewbrand="Select * from cart inner join tbl_product on cart.pid=tbl_product.pid  inner join tbl_registration on tbl_registration.email=cart.email where cart.pid=$id and cart.email='$mail'";
$d_seller_brand=mysqli_query($con,$viewbrand);
$countp=mysqli_num_rows($d_seller_brand);
$rowp=mysqli_fetch_array($d_seller_brand1);
$rd=$rowp['rid'];
$price=$rowp['price'];
$cart_item_qty=$_POST['qt'];
$cart_total=$cart_item_qty * $price;
$old_stock=$rowp['qunty'];
$flag=0;
if($countp>=1)	
	{
		echo "<script type='text/javascript'>				
			alert(' Item already added to cart'); 
				window.location='cart_view.php';
				</script>";
	}
	else
	{
$q_ins1="INSERT INTO `cart` (`email`, `pid`, `cart_qunty`, `amount`,old_stock) VALUES ('$mail', $id, '$cart_item_qty', '$cart_total','$old_stock')";	
	$ins=mysqli_query($con,$q_ins1);	
if($ins)
{	
		echo "<script type='text/javascript'>
				
				alert('Item added to cart successfully'); 
				window.location='cart_view.php';
				</script>";
}
else
{	
	echo "<script type='text/javascript'>				
alert('Failed'); 
               window.location='cart_view.php';
					
				</script>";
}
		
	}				
					?>
