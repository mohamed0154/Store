<?php include("DB/settings.php")?>
<?php include("header.php") ?>
<?php include("sidebar_login.php") ?>
<?php 

        if(isset($_POST["submit"]) ){
           
            $selected = "SELECT  email,password  FROM customers";
            $customerData = mysqli_query($connect, $selected);

            $selected = "SELECT  email,password  FROM admin";
            $adminData = mysqli_query($connect, $selected);
            foreach($adminData as $admin){
                
                $adminEmail=$admin['email'];
                $adminPassword=$admin['password'];
            }
           

                $email=$_POST["email"];
                $password=$_POST["password"];
               foreach($customerData as $customer){
              
                  if($customer['password'] == $password && $customer['email'] == $email){
                    header("Location: index.php");
                  }elseif($password == $adminPassword && $email == $adminEmail){
                    header("Location: index.php");
                  }
               }         
        }

?>

<form class="contact" action=""  method="POST">
    
        <div>
            <label>Email</label>
            <input  type="email" name="email" placeholder="Email">
        </div>
       
        <div>
            <label>Password</label>
            <input  type="password" name="password" placeholder="Password">
        </div>
        <button class="submit" name="submit" value="submit" id="submit">Login</button>
    </form> 
    <?php include("footer.php") ?>