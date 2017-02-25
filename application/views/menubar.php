	<div id="profile-menu" class="container-fluid">

		<div id="search-menu">
			<?=form_input(['name'=>'search', 'id'=>'searchBox', 'placeholder'=>'search your friends here...']);?>
			<div id="searchResultBox">
			</div>
		</div>
		
		<div id="btns-menu">
			<a href="#" id="notiBtn" class="btn btn-default">Notifications <span class="caret"></span></a>	
			<a href="#" class="btn btn-default">Home</a>

			<?php $friendspage = base_url("friend/friendsdata/". $userData[0]['id']); ?>
			<a href="<?=$friendspage?>" class="btn btn-primary">Friends</a>

			<?php $logout = base_url("login/logout"); ?>
			<a href="<?=$logout?>" class="btn btn-warning">Log out</a>				
			<br>

			<div id="notificationBox">
			</div>
		</div>
	</div>	