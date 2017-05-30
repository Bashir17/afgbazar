<?php require_once('../core/init.php');
if(!is_logged_in()){
  loggin_error_redirect();
}
     include('includes/head.php');
     include('includes/navigation.php');

 ?>
Admin Home
<?php include('includes/footer.php'); ?>
