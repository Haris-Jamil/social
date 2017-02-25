
	
		
	<?php
	if(isset($userPosts) && $userPosts != false){
		foreach($userPosts as $userpost){ 
	 ?>
		<div class="col-md-6 post">
			<?php foreach($userData as $userdata){ 	?>
				<img class="small-dp" src="<?php echo base_url($userdata['dp']) ?>">
				<p style="display: inline;"><b><?php echo $userdata['firstName']." ".$userdata['lastName']; ?></b></p>
			<?php } ?>
			<p><?=$userpost['post']?></p>
			<p style="display:inline;float: right;"><b>Posted on: </b><?=$userpost['time']?></p>
		</div>
	<?php 
		} 
	} else{
	?>
	<?php if($me == false){
			echo "<h2 id='nopost'>No posts to show</h2>";
		}	
		else{
			echo "<h2 id='nopost'>you haven't posted yet</h2>";
		}

	?>	
	<?php 
	}
	?>

	<script type="text/javascript" src="<?=base_url('assets/js/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/custom.js');?>"></script>

</body>
</html>