     
<?php
	// print_r($userData);
	// die;
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
<div class="row">
<div class="col-sm-4">

</div>

<div class="col-sm-4">
<h2>Change Password</h2>
</div>
<div class="col-sm-4">

</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<!-- <p class="text-center">Use the form below to change your password. Your password cannot be the same as your username.</p> -->
 <form action-attr="userforgotPasswordnew" id="user_forgot_newgepass"  enctype="multipart/form-data" novalidate="" autocomplete="off">
<input type="password" class="input-lg form-control" name="password" id="npassword" placeholder="New Password" autocomplete="off">
<input type="hidden" name="userdata" value="<?php echo $userData?>">
<input type="password" class="input-lg form-control" name="cpassword" id="cpassword" placeholder="Repeat Password" autocomplete="off">

<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg"  value="Change Password">
</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>


<?php
include('custom.php');
?>