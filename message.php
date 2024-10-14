<?php
  
  function getMessage($condation , $mess){
    if($condation){
        echo "<div class='message'>
   <h1 class='text-center'> $mess IS True </h1>
        </div>
        ";
    }else{
        echo "<div class='message'>
        <h1 class='text-center'>$mess IS Fasle </h1></div>";
    }
}



?>