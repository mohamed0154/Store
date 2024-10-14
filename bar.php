<?php include("DB/settings.php")?>

<?php 
  $selected = "SELECT  id, name FROM departments";
  $departments = mysqli_query($connect, $selected);

  
?>
	<aside>
	    <h2>Departments</h2>
		<ul class="elem_side">
		<?php foreach ($departments as  $dep) { ?>
			<li>
				<a class="depart_s"  href="products.php?special=<?php echo $dep['id']?>"><?php echo $dep['name']?></a>
				<div class="edit_del">
				<a href="/final_project/add_department.php?edit_department=<?php echo $dep['id']?>" class="edit_depart">Edit</a>
				<a href="?delete_department=<?php echo $dep['id']?>" class="del_depart">Del</a>
		        </div>
			</li>
			<?php } ?>
			<li>
				<a href="login.php" class="del_depart" style="border-radius: 10px;
                         color: black;
                         background-color: white;
                         font-weight: bold;">Logout
				</a>
			</li>
		</ul>
	</aside>