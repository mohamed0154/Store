
<?php 
	include("header.php"); 
	include("DB/settings.php");
	include("message.php"); 
	include("delete_department.php"); 
	include ("helperFun.php"); 
    auth(1);
?>
<?php 


	if (isset($_GET['special']) &&  $_GET['special'] != 0) {
		$depart_id= $_GET['special'];
		$selected = "SELECT  id,department_id,price, discound,name,photo  FROM products where department_id = $depart_id";
		$productsData = mysqli_query($connect, $selected);
		
	}else{
		$selected = "SELECT  id,department_id,price, discound,name,photo  FROM products";
	    $productsData = mysqli_query($connect, $selected);

	}
	

  if (isset($_GET['delete'])) {
	$id= $_GET['delete'];
	$delete = "DELETE FROM products WHERE id = $id";
	$del= mysqli_query($connect, $delete);
	getMessage($del,"Delete Product");
	
  }

  

  
?>

	<section class="show_products">
       <table class="table1">
		<tr>
			<td>Product Id</td>
			<td >image</td>
			<td >name</td>
			<td >price</td>
			<td >discound</td>
			<td >Action</td>
		</tr>

		<?php foreach ($productsData as  $product) { ?>
			<tr>
				<td><?php echo $product['id']  ?></td>
				<td>
					<img src="images/<?=$product['photo']?>" alt="Product Image">
				</td>
				<td><strong> <?php  echo $product['name'];?></strong></td>
				<td><strong> <?php  echo $product['price'];?></strong></td>
				<td><strong> <?php  echo $product['discound'] . '%';?></strong></td>
				<td>
					<a class="action" style="background-color:red;" href="products.php?delete=<?php echo $product['id']?>"><strong>Delete</strong></a>
					<a class="action"style="background-color:blue;" href="/final_project/add_product.php?edit=<?php echo $product['id']?>" >Edit </a> 
			    </td>
			</tr>
		<?php }?>
	   </table>
	</section>

	
<?php include("bar.php")?>
<?php include("footer.php") ?>