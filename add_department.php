<?php include("DB/settings.php")?>
<?php include("header.php") ?>
<?php include("message.php") ?>
<?php include("delete_department.php") ?>

    <?php 

   
if(isset($_POST["submit"])){    
        if($_POST["department"] != NULL){
                $dep=$_POST["department"];
               $ins= $connect->query("INSERT into departments VALUES(NULL,'$dep',NULL)");
               getMessage($ins,"Inserted");
        }
   }

   if(isset($_GET['edit_department'])){
        $id = $_GET['edit_department'];
        $selected = "SELECT * FROM departments where id = $id";
        $departmentData =  mysqli_query($connect, $selected);
        $departmentRow = mysqli_fetch_assoc($departmentData);
        $department_name=$departmentRow['name'];
        if (isset($_POST['update']) ) {
               
                $department = $_POST['department'];
                $update ="UPDATE `departments` SET name= '$department' where id = $id";
                $up =  mysqli_query($connect, $update);
                getMessage($up, "Updated");
        }
   }

?>
	<div id="section">
		<form class="add_product" method="POST">
            <div class="inp">
                <label><?php if(isset($_GET['edit_department'])){echo "Update Department";}else{echo "Add Department";}?></label>
                <input  type="text" value="<?php if(isset($_GET['edit_department'])){echo $department_name;}?>" name="department" placeholder="Add Department">
            </div>
			
            <?php  if (isset($_GET['edit_department'])) :?>
                <button name="update" > Update</button>
                <?php else: ?>
                    <button  name="submit" >Add</button>
                <?php endif;?>
        </form>   
	</div>

<?php include("bar.php")?>
<?php include("footer.php")?>