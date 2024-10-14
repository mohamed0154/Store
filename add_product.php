<?php include("DB/settings.php")?>
<?php include("header.php")?>
<?php include("message.php") ?>
<?php include("delete_department.php");?>



<?php 
$selected = "SELECT  id,name  FROM departments";
$departments = mysqli_query($connect, $selected);
   


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $targetDir = "images/";
   $fileName = basename($_FILES["file"]["name"]);
   $targetFilePath = $targetDir . $fileName;
   $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf','webp');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
                $dep_id=$_POST["department_id"];
                $price=$_POST["price"];
                $name=$_POST["product_name"];
                $discound=$_POST["discound"];
                // $insert ="INSERT INTO `products` VALUES ( , $dep  , $price,$name,'".$fileName."' , NULL)";
               $ins= $connect->query("INSERT into products VALUES ( NULL,'$dep_id'  , '$price','$discound','$name','".$fileName."',NULL )");
                getMessage($ins,"Inserted");
        }
    }

   }


   if (isset($_GET['edit'])) {
    $edit =true;
    $id = $_GET['edit'];
    $selected = "SELECT * FROM products where id = $id";
    $productData =  mysqli_query($connect, $selected);
    $productRow = mysqli_fetch_assoc($productData);

    $name = $productRow['name'];
    $filedId=$productRow['id'];
    $department_id=$productRow['department_id'];
    $discound=$productRow['discound'];
    $image=$productRow['photo'];
    $price=$productRow['price'];

    if (isset($_POST['update']) ) {
        $targetDir = "images/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $allowTypes = array('jpg','png','jpeg','gif','pdf','webp');
        if($fileName != NULL){
            $image= $fileName;
            $name = $_POST['product_name'];
            $depart_id = $_POST['department_id'];
            $discound = $_POST['discound'];
            $price = $_POST['price'];
            
            $update ="UPDATE `products` SET name= '$name' , department_id = $depart_id,discound = $discound,price =  $price, photo = '".$fileName."'  where id = $id";
            $up =  mysqli_query($connect, $update);
            getMessage($up, "Updated");
        }else{
            $name = $_POST['product_name'];
            $depart_id = $_POST['department_id'];
            $discound = $_POST['discound'];
            $price = $_POST['price'];

            $update ="UPDATE `products` SET name= '$name' , department_id = $depart_id,discound = $discound,price =  $price  where id = $id";
            $up =  mysqli_query($connect, $update);
            getMessage($up, "Updated");
        }
    }
}

?>


	<div id="section">
    
		<form class="add_product" action="" method="POST" enctype="multipart/form-data">
            <div class="inp">
                <label><?php if(isset($edit)){ echo "Update Department";}else{echo "Choose Department";} ?></label>
                    <select class="select" name="department_id">
                        <?php foreach ($departments as  $dep){?>
                            <option <?php if(isset($edit) && $dep['id'] == $department_id){echo "selected";}?> value="<?php echo $dep['id'];?>"><?php echo $dep['name']; ?></option>
                        <?php }?>
                    </select>
               
            </div>
            <div class="inp">
                <label><?php if(isset($edit)){ echo "Update Product";}else{echo "Add Product";} ?></label>
                <input  type="text" value="<?php if(isset($edit)){ echo $name;}else{echo "";} ?>" name="product_name" placeholder="Add Product">
            </div>
            <div class="inp">
                <label><?php if(isset($edit)){ echo "Update Price";}else{echo "The Price";} ?></label>
                <input  type="number" value="<?php if(isset($edit)){ echo $price;}else{echo "";}?>" name="price" placeholder="The Price">
            </div>
            <div class="inp">
                <label><?php if(isset($edit)){ echo "Update Discound";}else{echo "The Discound";} ?></label>
                <input  type="number" value="<?php if(isset($edit)){ echo $discound;}else{echo "0";}?>" name="discound" placeholder="The Discound">
            </div>
            <?php  if (isset($edit)) :?>
                <img class="img_update" src="images/<?php echo $image?>">
            <?php else: ?>
            <?php endif;?>
            <div class="upload">
                <label><?php if(isset($edit)){ echo "Update Image";}else{echo "Image";} ?></label>
                <input  type="file" name="file">
            </div>
            <?php  if (isset($edit)) :?>
                <button name="update" > Update</button>
                <?php else: ?>
                    <button  name="submit" >Add</button>
                <?php endif;?>
			
        </form>   
	</div>

<?php include("bar.php")?>
<?php include("footer.php")?>

