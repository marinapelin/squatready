<html>
		<head>
			<style>
				.b{
                    background-color: blueviolet;
                    width: 100%;
                    color: white;
                    padding: 15px;
                    border: none;
                    border-radius: 30px;
                    box-shadow:0 15px  20px rgba(0, 0, 0, 0.3);
                    font-size: 20px;
                    margin: 20px 0;
                }
			</style>
		</head>		
	<?php

$db='dbgym';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
if(! $conn ) {
   die('Could not connect: ' . mysql_error());
} 
if($conn){
	
$login = $_POST['login'];
$pass =$_POST['password'];
$name=$_POST['name'];
$grtype=$_POST['grtype'];
$grtime=$_POST['grtime'];

$grdate=$_POST['grdate'];
$grcoach=$_POST['grcoach'];
$memberid=$_POST['memberid'];

if($login){
	$addMemberToGroup=$conn->query("DELETE FROM `bookedtraining` WHERE `MemberID`='$memberid' AND `GroupTrainingName`='$grtype' AND `GroupCoachId`='$grcoach'AND `GroupRunDate`='$grdate' AND `GroupStartTime`='$grtime'");




if($addMemberToGroup){
  
  echo ('<h1 style="text-align: center;">YOU ARE SUCCESSFULLY UNBOOKED</h1>');
 
 // header('Location: '.$uri.'/test.loc/pageProfile.php');// перекидывает на этот адрес
}
}
}
?>

<form name="goto"  method="post" action="pageProfile.php">
								<input type="hidden" name="login" value="<?php 
								 echo($login); ?>">
								<input type="hidden" name="password" value="<?php echo($pass); ?>">
								<input type="hidden" name="name" value="<?php echo($name); ?>">
								<input type="hidden" name="memberid" value="<?php echo($memberid); ?>">
							<p><input type="submit" class="b" style="margin-left:15px; margin-top:15px; color: white;" value="Go To Profile" onclick="showPrompt()"></p>
							</form>