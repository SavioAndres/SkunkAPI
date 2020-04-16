<?php  
     if(!isset($_POST) || empty($_POST)) { 
     ?> 
        <form enctype="multipart/form-data" name="form1" method="post" action=""> 
          <input type="text" name="textfield"><br />
          <input type="file" name="arq"/><br/>
          <input type="submit" name="Submit" value="submit"> 
        </form> 
   <?php  
        } else { 
        $example = file_get_contents("php://input");
        var_dump($example);  
        echo "<br>-----------------------------<br>";
        var_dump($_FILES);
    
    }  
   ?>