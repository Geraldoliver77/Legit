<?php 
session_start();
include('header.php');

// get all function list
require_once "function.php" ; 

//　デタベースのコンフィグ
include("const.php");



// $getid= $_GET["id"];

// $getUser = idDb("localhost","root","","bridge" , $getid);






?>

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link href="css/style.css" rel="stylesheet" id="bootstrap-css">
<script src="js/chat.js"></script>
<style>
.modal-dialog {
    width: 400px;
    margin: 30px auto;	
}
</style>

<div class="container">		



	<br>		

		<div class="chat">	
			<div id="frame">		
				<div id="sidepanel">
				
					<div id="profile">
					<?php
					include ('Chat.php');
					$chat = new Chat();
					$loggedUser = $chat->getUserDetails($_GET['id']);
					echo '<div class="wrap">';
					$currentSession = '';
					foreach ($loggedUser as $user) {
						$currentSession = $user['current_session'];
											

						echo '<img id="profile-img" src="userprofile/'.$user['userid'].'/'.$user['avatar'].'" class="online" />';
						echo  '<p>'.$user['username'].'</p>';
							echo '<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>';
							echo '<div id="status-options">';
							echo '<ul>';
								echo '<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>';
								echo '<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>';
								echo '<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>';
								echo '<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>';
							echo '</ul>';
							echo '</div>';
							echo '<div id="expanded">';			
							echo '<a href="logout.php">Logout</a>';
							echo '</div>';
					}
					echo '</div>';
					?>
					</div>
					<div id="search">
						<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
						<input type="text" placeholder="Search contacts..." />					
					</div>
					<div id="contacts">	
					<?php
					echo '<ul>';
					$chatUsers = $chat->chatUsers($_GET['id']);
					foreach ($chatUsers as $user) {
						$status = 'offline';						
						if($user['online']) {
							$status = 'online';
						}
						$activeUser = '';
						if($user['userid'] == $currentSession) {
							$activeUser = "active";
						}
						echo '<li id="'.$user['userid'].'" class="contact '.$activeUser.'" data-touserid="'.$user['userid'].'" data-tousername="'.$user['username'].'">';
						echo '<div class="wrap">';
						echo '<span id="status_'.$user['userid'].'" class="contact-status '.$status.'"></span>';
						echo '<img src="userprofile/'.$user['userid'].'/'.$user['avatar'].'"  alt="" />';
						echo '<div class="meta">';
						echo '<p class="name">'.$user['username'].'<span id="unread_'.$user['userid'].'" class="unread">'.$chat->getUnreadMessageCount($user['userid'], $_GET['id']).'</span></p>';
						echo '<p class="preview"><span id="isTyping_'.$user['userid'].'" class="isTyping"></span></p>';
						echo '</div>';
						echo '</div>';
						echo '</li>'; 
					}
					echo '</ul>';
					?>
					</div>
					<div id="bottom-bar">	
						<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
						<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>					
					</div>
				</div>			
				<div class="content" id="content"> 
					<div class="contact-profile" id="userSection">	
					<?php
					$userDetails = $chat->getUserDetails($currentSession);
					foreach ($userDetails as $user) {										
						echo '<img src="userprofile/'.$user['userid'].'/'.$user['avatar'].'"  alt="" />';
							echo '<p>'.$user['username'].'</p>';
							echo '<div class="social-media">';
								echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
								echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
								 echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
							echo '</div>';
					}	
					?>						
					</div>
					<div class="messages" id="conversation">		
					<?php
					echo $chat->getUserChat($_GET['id'], $currentSession);						
					?>
					</div>
					<div class="message-input" id="replySection">				
						<div class="message-input" id="replyContainer">
							<div class="wrap">
								<input type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="Write your message..." />
								<button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>	
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	

	<br>
	<br>	
	<div style="margin:50px 0px 0px 0px;">
			
	</div>	
</div>	
