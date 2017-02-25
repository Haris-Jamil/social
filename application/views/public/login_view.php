<!DOCTYPE html>
<html>
<head>
	<title>Social</title>

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<?php echo link_tag('assets/css/bootstrap.min.css'); ?>
	<?php echo link_tag('assets/css/mystyle.css'); ?>

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lobster">

</head>
<body>
	<!-- ////////////////////////////////////////////////////////////////////////////////////// -->
	<div id="loginHead" class="container-fluid">

		<div class="row">
			<div class="col-md-6 col-xs-12 text-center">
				<h1 id="logo">United</h1>
			</div>

			<div class="col-md-6 col-xs-12 text-center">
				<div class="innerDiv">
					<?=form_open('validate/signIn', ['class'=>'form-inline']); ?>
					<div class="form-group">
						<label for="username">Username:</label><br>
						<?=form_input(['name'=>'username', 'maxlength'=>'25', 'id'=>'username', 'required'=>'required']);?>
					</div>

					<div class="form-group">
						<label for="password">Password:</label><br>
						<?=form_password(['name'=>'password', 'maxlength'=>'25', 'id'=>'password', 'required'=>'required']);?>
					</div>

					<div class="form-group">
						<br>
						<?=form_submit(['name'=>'submitSignin', 'value'=>'Sign in', 'class'=>'btn btn-info btn-sm'])?>
					</div>			
					<?=form_close();?>	
					<br>
					<div>
					<?php 
						if(isset($wrongUser)){
							echo "<p class='error'>$wrongUser</p>";
						}
					?>
					</div>
				</div>
				
			</div>	
		</div>
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////// -->
	<div id="loginCenter" class="container-fluid">
		<div class="row">
			
			<div class="text-center">
				
				<div class="innerDiv">

					<?=form_open('validate/signUp', ['class'=>'form-inline']);?>

					<div class="form-group">
						<label for="fname">First name:</label><br>
						<?=form_input(['name'=>'fname', 'maxlength'=>'25', 'id'=>'fname',
						'value'=>set_value('fname')]);?>
					</div>

					<div class="form-group">
						<label for="lname">Last name:</label><br>
						<?=form_input(['name'=>'lname', 'maxlength'=>'25', 'id'=>'lname',
						'value'=>set_value('lname')]); ?>
					</div>
					<br>

					<div class="form-group">
						<label for="username2">Username:</label><br>
						<?=form_input(['name'=>'username2', 'maxlength'=>'25', 'id'=>'username2',
						'value'=>set_value('username2')]);?>
						<?php 
						if(isset($uesrnameNotAvailable)){
							echo "<p class='error'>$uesrnameNotAvailable</p>";
						}
						?>
					</div>
					<br>

					<div class="form-group">
						<label for="password2">Password:</label><br>
						<?=form_password(['name'=>'password2', 'maxlength'=>'25', 'id'=>'password2',
						'value'=>set_value('password2')]);?>
					</div>
					<br>

					<div class="form-group">
						<label>Gender:</label><br>

						<label for='male'>Male</label> 
						<?=form_radio(['name'=>'gender', 'value'=>'male', 'id'=>'male']);?>

						<label for='female'>Female</label>
						<?=form_radio(['name'=>'gender', 'value'=>'female', 'id'=>'female']);?>

					</div>
					<br>

					<div class="form-group">
						<br>
						<?=form_submit(['name'=>'submitSignup', 'value'=>'Sign up', 'class'=>'btn btn-info btn-md'])?>
					</div>

					<?=form_close();?>
				</div>

			</div>

		</div>
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////// -->
	
	<!-- ////////////////////////////////////////////////////////////////////////////////////// -->

</body>
</html>