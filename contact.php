<?php require("DB/settings.php") ?>
<?php require("header.php") ?>
<?php include("message.php") ?>
<?php include("delete_department.php") ?>
<?php 

    if(isset($_POST['submit'])){
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		
		$sql = "INSERT INTO requests VALUES (NULL,'$first_name', '$last_name', '$email', '$phone', '$subject', '$message',NULL)";

		if (mysqli_query($connect, $sql)) {
		    getMessage($sql,"Send Message");
		} else {
		    getMessage($sql,"Send Message");
		}
		mysqli_close($connect);

	}
 ?>
	<div id="body">
		<div class="contact_content">
			<!-- <img src="images/telephone.jpg" alt=""> -->
			<h2>Send us a message</h2>
			<form action="" class="contact" method="POST">
				<label for="firstName"> <span>first name*</span></label>
				<input type="text" name="first_name" id="firstName">

				<label for="lastName"> <span>last name*</span></label>
				<input type="text" name="last_name" id="lastName">

				<label for="email"> <span>email*</span></label>
				<input type="text" name="email" id="email">

				<label for="phoneNumber"> <span>Phone Number</span></label>
				<input type="text" name="phone" id="phoneNumber">

				<label for="subject"> <span>subject*</span></label>
				<input type="text" name="subject" id="subject">

				<label for="message"> <span>message</span></label>
				<textarea name="message" id="message" cols="30" rows="10"></textarea>
				<input type="submit"  class="submit" name="submit" value="submit" id="submit">
			</form>

<?php include("bar.php")?>
<?php  include("footer.php")?>