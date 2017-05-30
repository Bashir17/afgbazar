<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/afghanbazar/core/init.php');
include('includes/head.php');
$email=((isset($_POST['email']))?sanitize($_POST['email']):'');
$email=trim($email);
$password=((isset($_POST['password']))?sanitize($_POST['password']):'');
$password=trim($password);
$errors=array();
?>
<style >{
  background-image:url("/afghanbazar/images/headerlogo/background.png");
  background-size: 100vw 100vh;
  background-attachment: fixed;
}
</style>
<div id="login-form">
  <div>
    <?php
    if($_POST){
      //form validation
      if (empty($_POST['email'])|| empty($_POST['password'])) {
      $errors[]='you must insert Email or Password';
      }
   //emil validation
   if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     $errors[]='You must enter valid email';
   }
   //Password must be more than 6 character
   if(strlen($password)< 6){
     $errors[]='You must enter more than 6 character password';
   }

     //check if the email exist in the database
     $query=$db->query("SELECT * FROM users WHERE email='$email'");
     $user=mysqli_fetch_assoc($query);
     $usercount=mysqli_num_rows($query);
     if($usercount <1){
       $errors[]='that email doesnt exit in our databse';
     }
     if(!password_verify($password,$user['password'])){
       $errors[]='Your password does not match our records';
     }

    //check for errors
    if(!empty($errors)){
      echo display_errors($errors);
    }else{
      //log user in
      $user_id = $user['id'];
      login($user_id);

    }
    }

    ?>
  </div>
  <h2 class="text-center">Login</h2><hr>
  <form action="login.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email"name="email" id="email" class="form-control"value="<?$email;?>">
    </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password"name="password" id="password" class="form-control"value="<?$password;?>">
     </div>
     <div class="form-group">
       <input type="submit" value="login" class="btn btn-primary">
     </div>
   </form>
   <p class="text-right"><a href="/afghanbazar/index.php" alt="home">visit site</a></p>

 </div>

<?php include'includes/footer.php';?>
