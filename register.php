<?php include("DB/settings.php")?>
<?php include("header.php") ?>
<?php include("message.php") ?>
<?php include("sidebar_login.php") ?>
<?php 

        if(isset($_POST["submit"]) ){
   
                $first_name=$_POST["first_name"];
                $last_name=$_POST["last_name"];
                $email=$_POST["email"];
                $phone=$_POST["phone"];
                $password=$_POST["password"];
                $c_password=$_POST["c_password"];
                $country=$_POST["country"];
                if(isset($password) && $password == $c_password){
                    $ins= $connect->query("INSERT into customers VALUES ( NULL,'$first_name'  , '$last_name','$email','$phone','$password','$c_password','$country' )");
                    header("Location: login.php");
                }
        }

?>
<form class="contact"  method="POST">
        <div>
            <label>First Name</label>
            <input class="st" type="text" name="first_name" placeholder="First name">
        </div>
        <div>
            <label>last Name</label>
            <input  type="text" name="last_name" placeholder="Last name">
        </div>
        <div>
            <label>Email</label>
            <input  type="email" name="email" placeholder="Email">
        </div>
        <div>
            <label>Phone</label>
            <input  type="tel" name="phone" placeholder="Phone">
        </div>
        <div>
            <label>Password</label>
            <input  type="password" name="password" placeholder="Password">
        </div>
        <div>
            <label>Confirm Password</label>
            <input  type="password" name="c_password" placeholder="Confirm Password">
        </div>
        <div >
            <label id="sel_lable">Country</label>
            <select class="select_reg" name="country">
                <option>Egypt</option>
                <option>America</option>
                <option>Maroco</option>
            </select>
        </div>
       
        <button class="submit" name="submit" value="submit" id="submit">Register</button>
    </form> 
    <?php include("footer.php") ?>