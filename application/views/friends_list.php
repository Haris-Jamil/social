<!DOCTYPE html>
<html>
<head>
	<title>Friends</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<?=link_tag('assets/css/bootstrap.min.css');?>
	<?=link_tag('assets/css/profilecss.css');?>

</head>
<body style="background-color: white;">

	<?php include "menubar.php" ?>

	<div class="col-md-4">

		<h2>All Friends</h2>

		<?php if(isset($friends)): ?>
			<?php foreach($friends as $friend): ?>	
				<div style="padding: 20px;">
					<?php $imgUrl = base_url($friend['dp']); ?>
					<img src="<?=$imgUrl?>" class="small-dp">
					<h5><?php echo $friend['firstName'] . " " . $friend['lastName']; ?></h5>
						<a href="" class="btn btn-info btn-sm">unfriend</a>
				</div>
			<?php endforeach; ?>
		<?php  endif; ?>

	</div>

	<div class="col-md-4">

		<h2>Requests Recieved</h2>

		<?php if(isset($incomingRequest)): ?>
			<?php foreach($incomingRequest as $inRequest): ?>	
				<div style="padding: 20px;">
					<?php $imgUrl = base_url($inRequest['dp']); ?>
					<img src="<?=$imgUrl?>" class="small-dp">
					<h5><?php echo $inRequest['firstName'] . " " . $inRequest['lastName']; ?></h5>

					<?php if($inRequest['status'] == 'pending'): ?>
						<?php $acceptrequest = base_url('request/acceptrequest/'. $inRequest['from_id']); ?>
						<a href="<?=$acceptrequest?>" class="btn btn-info btn-sm">Accept Request</a>
						<a href="#" class="btn btn-info btn-sm	">Cancel</a>
					<?php endif; ?>		
				</div>
			<?php endforeach; ?>
		<?php  endif; ?>
		
	</div>
	

	<div class="col-md-4">	
		<h2>Requests Sent</h2>

		<?php if(isset($sentRequest)): ?>
			<?php foreach($sentRequest as $sentrequest): ?>	
				<div style="padding: 20px;">
					<?php $imgUrl = base_url($sentrequest['dp']); ?>
					<img src="<?=$imgUrl?>" class="small-dp">
					<h5><?php echo $sentrequest['firstName'] . " " . $sentrequest['lastName']; ?></h5>

					<?php if($sentrequest['status'] == 'pending'): ?>
						<a href="#" class="btn btn-info btn-sm	">Request Sent</a>
						<a href="#" class="btn btn-info btn-sm	">Cancel</a>
					<?php endif; ?>		
				</div>
			<?php endforeach; ?>	
		<?php  endif; ?>	
	</div>

	<script type="text/javascript" src="<?=base_url('assets/js/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/custom.js');?>"></script>

</body>
</html>