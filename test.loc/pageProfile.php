<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<meta charset=utf-8 />
<meta name="author" content="Marina Pelina" />
<meta name="keywords" content="gym"/>
<meta name="description" content="Gym." />
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="stylegallery.css">
<link rel="shortcut icon" href="https://img.icons8.com/color/48/gum-.png"/>
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
	}
	$email=htmlspecialchars($_COOKIE['Login']);
	$pass=htmlspecialchars($_COOKIE['Pass']);
	error_reporting(E_ERROR | E_PARSE);
	if($_POST['login']){
		$email = $_POST['login'];
		$pass = $_POST['password'];
		error_reporting(E_ERROR | E_PARSE);
	}else if($email==null){
		header('Location: '.$uri.'/test.loc/index.php');
	}
?>
<script>
	console.warn = () => {};
</script>
<style>
.squareicon{
	height: 100px;
	padding: 20px;
}
#header_top a {
    color: #66Bfb7;
    text-decoration: none;
    font-size: 36px;
}
#header_top a:hover {
    color: #777;
    text-decoration: none;
    font-size: 36px;
    font-weight: 48px;
}
.blocking{
	display: flex;
    align-items: stretch;
	flex-wrap: wrap;
	min-height: 400px;
	min-width: 800px;
	background: LightYellow;
}
.blockeach{
    align-items: stretch;
	margin-top: 50px;
	margin-left: 40px;
	flex-wrap: wrap;
	min-height: 100px;
	min-width: 200px;
}
.textblock{
	display: flex;
	align-items: stretch;
	width: 200px;
}
.large{
	height: 400px;
}
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
<?php 
	if($email){
		$checkEmailQuery= $conn->query(
			"SELECT FirstName, MembershipCode, MemberId, PaymentId
	        FROM member
			WHERE Email= '$email' AND Password = '$pass'");
		
	    if($checkEmailQuery){
	    	$result=$checkEmailQuery->fetch_assoc();
	    	$name=$result['FirstName'];
			$memberid=$result['MemberId'];
		}
	}
?>
</head>
<body>
    <div class="background-img">
        <div class="line"></div><!--END LINE-->
        <div class="hat" >
        	<div class="horizontal" >
        		<div class="buttons" >
        	    <div id="SiteNameBackgr"><a href="index.php" id="SiteName">Squat Ready<img src="https://img.icons8.com/color/48/gum-.png"></a></div>
        		<div id="menu"  >
        			<ul>
        			<li ><form name="goto" method="post" action="index.php">
								<input type="hidden" name="login" value="<?php 
								 echo($email); ?>">
								<input type="hidden" name="password" value="<?php echo($pass); ?>">
								<input type="hidden" name="name" value="<?php echo($name); ?>">
								<input type="hidden" name="memberid" value="<?php echo $memberid; ?>">
							<p><input type="submit" style="background-color: #66Bfb7; height: 45px; width: 80px; color: white; border: none;" value="Home" onclick="showPrompt()"></p>
							</form></li>
        			</ul>
        		</div>
        		<div id="menu" >
        			<ul>
        			<li ><a  target="_blank"  href="#" id="m1">Help</a></li>
        			</ul>
        		</div>
        		<div id="menu" >
        			<ul>
        			<li ><a href="pageSignin.php" id="m1"> Log in
					</a></li>
        			</ul>
        		</div>
        			</div>
        	</div>
        </div>
        <div class="line"></div><!--END LINE-->
        <div id="wrap">
        	<div class="line"></div><!--END LINE-->
        		<table width="100%" cellspacing="10" cellpadding="50">
        			<tr> 
        				<td>
        				    
							<div id="header_top" style="margin-left:150px; text-align:center">
        				    	<a href="#" class="smp" >
								    <?php 
							            if($checkEmailQuery){
								    		echo($result['FirstName']);
								    		echo('<br>');
								    		if(($result['MembershipCode'])!=null){
								    			echo('Your membership code: ');
								    			echo($result['MembershipCode']);
								    		}else{
								    			echo('No membership chosen ');
								    		}
										}
								    ?>
                                    <div class="description" style="padding-left: 30px;">
        				                <br><p>My Payment details:</p><br>
									</div>
								</a>
        				        <em id="description">
								    <?php
								        if($email){
								        	$checkDesc= $conn->query(
								        		"SELECT 
								    			p.`CardFirstName`,
								    			p.`CardLastName`,
								    			p.`Card`, 
								    			p.`BSB`, 
								    			p.`ExpiryMonth`, 
								    			p.`ExpiryYear`
								    			FROM `member` m
			                                    JOIN `paymentdetails` p ON m.`PaymentId` = p.`ID`
								    			WHERE `Email`= '$email' AND `Password`= '$pass'");
							                if($checkDesc){
								        		$result1=$checkDesc->fetch_assoc();
								        		echo('Card: ');
								    			echo($result1['Card']);
								    			echo("<br><br>");
								    			echo('CardName: ');
								    			echo($result1['CardFirstName']);
								            }
                                        }else{
								        	error_reporting(E_ERROR | E_PARSE);
                                        }
								    ?>
								</em>
        			        </div>
							<div id="header_top" style="margin-left:150px; text-align:center">
        				    	<a href="#" class="smp" >
								<?php
									if(($result['PaymentId'])!=null){
										echo('
										<form name="goto"  method="post" action="pageChangePayment.php">
							            	<input type="hidden" name="login" value="'); 
							            	 echo($email); echo('">
							            	<input type="hidden" name="password" value="'); echo($pass); echo('">
							            	<input type="hidden" name="name" value="'); echo($name); echo('">
							            	<input type="hidden" name="memberid" value="'); echo($result['MemberId']); echo('">
							                <p><input type="submit" class="b" style="margin-left:15px; margin-top:15px; color: white;" value="Change my payment" onclick="showPrompt()"></p>
							            </form>');
									}else{
										echo('<br>No Payment chosen<br> ');
										$memberid = $result['MemberId'];
							            echo('
								</a>
							');	
							echo('
							<form name="goto"  method="post" action="pageChangePayment.php">
								<input type="hidden" name="login" value="'); 
								 echo($email); echo('">
								<input type="hidden" name="password" value="'); echo($pass); echo('">
								<input type="hidden" name="name" value="'); echo($name); echo('">
								<input type="hidden" name="memberid" value="'); echo($result['MemberId']); echo('">
							    <p><input type="submit" class="b" style="margin-left:15px; margin-top:15px; color: white;" value="Set my payment" onclick="showPrompt()"></p>
							</form>
							');
									}
								?>
							<br>
							<br>
							<form name="goto"  method="post" action="index.php">
								<input type="hidden" name="login" value="<?php 
								 echo($email); ?>">
								<input type="hidden" name="password" value="<?php echo($pass); ?>">
								<input type="hidden" name="name" value="<?php echo($name); ?>">
								<input type="hidden" name="memberid" value="<?php echo $memberid; ?>">
							<p><input type="submit" class="b" style="margin-left:15px; margin-top:15px; color: white;" value="Find a class" onclick="showPrompt()"></p>
							</form>
							</div><!--END HEADER_TOP-->
        			    </td>	
        		        <td width="40%" valign="top">
							<img src="woman.jpg" width="80%" style="margin: 30px;">
							<div id="header_bot" style="margin-left:15px;">	
        				    	<p style="padding-left: 30px;">"Decide. Commit. Succeed."</p>
								<p style="margin-top:30px; padding-left: 30px;">Memberships: <br><br>⛹Starter - 18$/week</br><br>🤸Inclusive - 100$/year</br></p>
        				    </div>
						</td>
					</table>
					<?php
						if($email){
						    	$checkBTr= $conn->query("SELECT bt.`GroupRunDate`, bt.`GroupStartTime`,
						    	bt.`GroupTrainingName`, 
						    	c.`FirstName`, 
						    	c.`LastName`,
						    	gt.`TimeEnd`, 
						    	c.`ClubLocationName`,
						    	tt.`Img`,
						    	bt.`GroupCoachId`
						    FROM `bookedtraining` bt
						    JOIN `coach` c ON bt.`GroupCoachID` = c.`CoachID`
						    JOIN `grouptraining` gt ON bt.`GroupTrainingName` = gt.`TrainingName` AND bt.`GroupRunDate`=gt.`RunDate` AND bt.`GroupStartTime`=gt.`TimeStart` AND bt.`GroupCoachId`=gt.`CoachId`
						    JOIN `trainingtype` tt ON bt.`GroupTrainingName` = tt.`TrainingName`
						    WHERE bt.`MemberID`='$memberid'
						    ORDER BY bt.`GroupStartTime` ASC");
						    
							if($checkBTr){
						    	$resultgroup=$checkBTr->fetch_assoc();
						    	if($resultgroup!=NULL){
						    		echo('
						<div class="blocking">');
						    		do{
						    			echo('
						    <div class="blockeach">
					            <p style="font-size: 18px; padding-top: 50px; text-decoration: underline;">');
					                    $timestamp = strtotime($resultgroup['TimeStart']);
                                        $time = date("h:i A", $timestamp);
                                        echo $time;
					                    echo(' - ');
					                    $timestamp = strtotime($resultgroup['TimeEnd']);
                                        $time = date("h:i A", $timestamp);
                                        echo $time;
					                    echo('
								</p>	
					            <div style="display: block; ">
					                <img class="squareicon" src="');echo($resultgroup['Img']); echo('"></img>
					            </div>	
					            <div class="textblock">
						            <p style="font-size: 24px; text-align:center"><a name="info"  href="pageDifProfile.php" onClick="fsetcookie()"> '); // 
							            echo($resultgroup['GroupTrainingName']);
							            echo('</a><br>');
							            echo('Coach: ');
							            echo($resultgroup['FirstName']);
							            echo('<br>');
							            echo('Club: ');
							            echo($resultgroup['ClubLocationName']);
							            echo('</p>
						        </div>
						        <form name="book"  method="post" action="actionUnBook.php">
						        	<input type="hidden" name="login" value="');
						        		echo($email); echo('">
						        	<input type="hidden" name="password" value="'); echo($pass); echo('">
						        	<input type="hidden" name="name" value="'); echo($name); echo('">
						        	<input type="hidden" name="grtype" value="'); echo($resultgroup['GroupTrainingName']); echo('">
						        	<input type="hidden" name="grdate" value="'); echo($resultgroup['GroupRunDate']); echo('">
						        	<input type="hidden" name="grtime" value="'); echo($resultgroup['GroupStartTime']); echo('">
						        	<input type="hidden" name="grcoach" value="'); echo($resultgroup['GroupCoachId']); echo('">
						        	<input type="hidden" name="memberid" value="'); echo($memberid); echo('">
						        	<p><input type="submit" class="b" style="margin-left:15px; margin-top:15px; color: white;" value="UNBook me" onclick="showPrompt()"></p>
						        </form>
					        </div>
										');
									}while($resultgroup=$checkBTr->fetch_assoc());
									echo('
						</div>');
				
								}
											
							}else{
									echo('No booked training');
							}
						}else{
							error_reporting(E_ERROR | E_PARSE);
							
						}
							
					?>
			        <div id="wrap2">
        	            <div class="line"></div>
        	            <em style="margin-left: 20px">All rights reserved. Design by </em><a href="#" target="blank">Marina Pelin</a>
        	            <address style="margin-left: 20px"> city Dnipro, Ukraine. 2023</address> 
					</div><!--END WRAP2-->
	</div><!--END BACKGR-->
	<?php mysqli_close($conn);?>
</body>
</html>