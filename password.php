 <?php
function showForm($error="LOGIN"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
                      "DTD/xhtml1-transitional.dtd">
<html>
<body>
  <?php echo $error; ?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="pwd">
    Password:
     <table>
       <tr>
         <td><input name="passwd" type="password"/></td>
       </tr>
       <tr>
         <td align="center"><br/>
          <input type="submit" name="submit_pwd" value="Login"/>
         </td>
       </tr>
     </table>  
   </form>
</body>       
<?php   
}
?> 
 <?php
$Password = '01082017iet'; // Set your password here

if (isset($_POST['submit_pwd'])){
   $pass = isset($_POST['passwd']) ? $_POST['passwd'] : '';
     
   if ($pass != $Password) {
      showForm("Wrong password");
      exit();     
   }
} else {
   showForm();
   exit();
}
?> 