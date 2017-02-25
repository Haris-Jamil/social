<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?=$userData[0]['firstName']." ".$userData[0]['lastName']?></title>	
	<?=link_tag('assets/css/bootstrap.min.css');?>
	<?=link_tag('assets/css/profilecss.css');?>
</head>
<body>

	<?php include 'menubar.php' ?>

	<div id="profile-head" class="container-fluid">
		<div class="row">
			
			<div class="col-sm-2">
				<div id="profile-pic">
					<img class="img-responsive" src="<?php echo base_url($userData[0]['dp']);  ?>">
					<a href=""></a>
				</div>	
			</div>

			<div class="col-sm-10">
				<div id="name">
					<h2><?php echo $userData[0]['firstName']." ".$userData[0]['lastName'] ?></h2>
					<?php if($me == false){
							if(isset($status[0]['status'])){
								if($status[0]['status'] == ''){ 
									$id = base_url("request/sendRequest/".$userData[0]['id']); 
								?>
									<a href="<?=$id?>" class="btn btn-default">Add Friend</a>
						<?php 	}else if($status[0]['status'] == 'pending'){ 
									$id = base_url("request/sendRequest/".$userData[0]['id']); 
								?>
									<a href="#" class="btn btn-default">Request Sent</a>
						<?php		}
							}
							else{ 
								$id = base_url("request/sendRequest/".$userData[0]['id']); 
								?>
								<a href="<?=$id?>" class="btn btn-default">Add Friend</a>
						<?php	}
						  } ?>	
				</div>
			</div>

		</div>
	</div>
 
	
	<?php if($me == true){ ?>
	<div class="container-fluid">
		<div id="post-form" class="col-md-6">
			<?=form_open('post/addPost',['class'=>'form-inline']);?>
			<div class="form-group">
				<?=form_textarea(['name'=>'post','placeholder'=>'What\'s up..', 'cols'=>60, 'rows'=>5,'id'=>'postField','required'=>'required']);?>
			</div>
			<br>
			<div class="form-group">
				<?=form_submit(['name'=>'profilePostAdd', 'value'=>'Post', 'class'=>'btn btn-primary'])?>
			</div>
			<?=form_close();?>	
		</div>	
	</div>
	<?php } ?>
