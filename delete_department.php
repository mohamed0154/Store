<?php

if (isset($_GET['delete_department'])) {
	$department_id= $_GET['delete_department'];
	$delete = "DELETE FROM products WHERE department_id = $department_id";
	$del= mysqli_query($connect, $delete);

	$del_department = "DELETE FROM departments WHERE id = $department_id";
	$dell= mysqli_query($connect, $del_department);
	getMessage($dell,"Delete Department");
  }
?>