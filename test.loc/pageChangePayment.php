<!-- php require_once "D:/Downloads/xampp/htdocs/test.loc/baseEntrance.php"?> -->
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<meta charset=utf-8 />
<meta name="author" content="Marina Pelina" />
<meta name="keywords" content="marina, art, design, oil painting"/>
<meta name="description" content="A website for an artist Marina. Displays intro, shows catalog of paintings, and ended with YouTube-related videos." />
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="stylegallery.css">
<link rel="shortcut icon" href="https://img.icons8.com/wired/64/000000/paint-brush.png"/>
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
		//echo 'Успешно соединились!!!';
	}
	if($_POST['login']){
		$email = $_POST['login'];
		$pass = $_POST['password'];
		$memberid = $_POST['memberid'];
		$name=$_POST['name'];
		error_reporting(E_ERROR | E_PARSE);
	}
?>
<script>
	console.warn = () => {};
</script>
<style>
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
        			<li ><a href="index.php" id="m1">Home</a></li>
        			</ul>
        		</div>
        		
        		<div id="menu" >
        			<ul>
						<li>
        			<?php
                    error_reporting(E_ERROR | E_PARSE);
                    if($name){
                        echo('<a href="pageProfile.php" id="m1">');
                    	echo($name);
                    	echo('</a>');
                    }else{
                    	echo('<a href="pageSignin.php" id="m1">Log in</a>');
                    }
                    ?>
                        </li>
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
        				    <!-- <div id="menu" style="margin-left:15px; text-align:center" >
        				    	<ul>
        				    	<li><a href="index.php" id="m1">Home</a></li>
        				    	</ul>
        				    </div> -->
        				    <div id="header_top" style="text-align:center">
        				    	<a href="#" class="smp" >
								<?php 
								if($email){
									$checkEmailQuery= $conn->query(
										"SELECT MembershipCode, MemberId, PaymentId
								        FROM member
										WHERE Email= '$email' AND Password = '$pass'");
							        if($checkEmailQuery){
								    	$result=$checkEmailQuery->fetch_assoc();
										echo($name);
										echo('<br>');
										if(($result['MembershipCode'])!=null){
											echo('Your membership code: ');
											echo($result['MembershipCode']);
										}else{
											echo('No membership chosen ');
										}
								    }
                                }else{
                                	error_reporting(E_ERROR | E_PARSE);
                                }
							    echo('</a>
							</div><!--END HEADER_TOP-->');	

							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								$card=$_POST['card'];
	                            $bsb=$_POST['bsb'];
	                            $expmonth=$_POST['expmonth'];
	                            $expyear=$_POST['expyear'];
	                            $cardfirstname=$_POST['cardfirstname'];
	                            $cardlastname=$_POST['cardlastname'];

								if($card!=null &&
		                        $bsb!=null &&
		                        $expmonth!=null &&
		                        $expyear!=null &&
		                        $cardfirstname!=null &&
		                        $cardlastname!=null){
								    $pattern = "/^[0-9]{3}$/";
								    $pattern1 = "/^[0-9]{2}$/";
								    $pattern2 = "/^[0-9]{4}$/";
								    $pattern3 = "/^[0-9]{16}$/";
								    $pattern4 = "/^[A-Za-z]+$/";
								    $check=true;
								    if (!preg_match($pattern, $bsb)) {
								    	$check=false;
								    	$errorMessage = "Invalid BSB input. Please enter a three-digit number.";
								    } if (!preg_match($pattern1, $expmonth)) {
								    	$check=false;
								    	$errorMessage1 = "Invalid Expiry Month input. Please enter a two-digit number.";
								    } if (!preg_match($pattern2, $expyear)) {
								    	$check=false;
								    	$errorMessage2 = "Invalid Expiry Year input. Please enter a four-digit number.";
								    } if (!preg_match($pattern3, $card)) {
								    	$check=false;
								    	$errorMessage3 = "Invalid Card input. Please enter a 16-digit number.";
								    } if (!preg_match($pattern4, $cardlastname)) {
								    	$check=false;
								    	$errorMessage4 = "Invalid CardLastName input. Please enter a four-digit number.";
								    } if (!preg_match($pattern4, $cardfirstname)) {
								    	$check=false;
								    	$errorMessage5 = "Invalid CardFirstName input. Please enter a four-digit number.";
								    }if($check==true){
								    	echo('OK');
		                                if($card!=null &&
		                                $bsb!=null &&
		                                $expmonth!=null &&
		                                $expyear!=null &&
		                                $cardfirstname!=null &&
		                                $cardlastname!=null){
		                                	$updatePay=$conn->query("INSERT INTO `paymentdetails`(`CardFirstName`, `CardLastName`, `Card`, `BSB`, `ExpiryMonth`, `ExpiryYear`, `LastPaymentId`, `LastPaymentDate`, `LastUpdate`, `ID`)
		                                	  VALUES ('$cardfirstname','$cardlastname','$card', '$bsb', '$expmonth', '$expyear', NULL,NULL, NULL, NULL)");
		                                  }
		                                if($updatePay){
		                                	$findId= $conn->query(
		                                		"SELECT  `ID` FROM `paymentdetails` WHERE `CardFirstName`='$cardfirstname' AND `CardLastName`='$cardlastname' AND `Card`='$card' AND `BSB`= '$bsb' AND `ExpiryMonth`='$expmonth' AND `ExpiryYear`='$expyear'");
		                                	$resulta=$findId->fetch_assoc();
		                                	$id=$resulta["ID"];
		                                	$updateAcc=$conn->query("UPDATE `member` SET `PaymentId`='$id' WHERE `MemberId`='$memberid'");
	                                        setcookie("Login", $email, time()+3600, "/");
	                                        setcookie("Pass", $pass, time()+3600, "/");
	                                        header('Location: '.$uri.'/test.loc/pageProfile.php');//return to profile
								        }
						            }
						    	}
						    }
							?>
							<form name="fnick" class="login" style="margin-left:15px; margin-top:15px; text-align:center;" autocomplete="off" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							    <p>Setup Payment Details:</p>
								<p>
									<input type="number" style="margin-left:15px; margin-top:15px;"  name="card" placeholder="CardNumber"  required>
                    			    <?php 
								    if (isset($errorMessage3)): ?>
                                        <div style="color: red;"><?php echo $errorMessage3; ?></div>
                                    <?php endif; ?>
                                </p>
								<p>
									<input type="number" style="margin-left:15px; margin-top:15px;"  name="bsb" placeholder="BSB" pattern="[0-9]{3}" required>
								    <?php if (isset($errorMessage)): ?>
                                        <div style="color: red;"><?php echo $errorMessage; ?></div>
                                    <?php endif; ?>	
								</p>
								<p>
									<input type="number" style="margin-left:15px; margin-top:15px;"  name="expmonth" placeholder="Expiry Month" pattern="[0-9]{2}" required>
									<?php if (isset($errorMessage1)): ?>
                                        <div style="color: red;"><?php echo $errorMessage1; ?></div>
                                    <?php endif; ?>	
								</p>
								<p><input type="number" style="margin-left:15px; margin-top:15px;"  name="expyear" placeholder="Expiry Year" pattern="[0-9]{4}">
									<?php if (isset($errorMessage2)): ?>
                                        <div style="color: red;"><?php echo $errorMessage2; ?></div>
                                    <?php endif; ?>	
								</p>
								<p><input type="text" style="margin-left:15px; margin-top:15px;" name="cardfirstname" placeholder="CardHolder FirstName" required>
									<?php if (isset($errorMessage5)): ?>
                                        <div style="color: red;"><?php echo $errorMessage5; ?></div>
                                    <?php endif; ?>	
								</p>
								<p>
									<input type="text" style="margin-left:15px; margin-top:15px;" name="cardlastname" placeholder="CardHolder LastName" required>
									<?php if (isset($errorMessage4)): ?>
                                        <div style="color: red;"><?php echo $errorMessage4; ?></div>
                                    <?php endif; ?>	
								</p>
								<input type="hidden" name="login" value="<?php  echo($email); ?>">
								<input type="hidden" name="password" value="<?php echo($pass); ?>">
								<input type="hidden" name="name" value="<?php echo($name); ?>">
								<input type="hidden" name="memberid" value="<?php echo($result['MemberId']); ?>">
								<p><input type="submit"  class="b" style="width: 100px;" value="Save" onclick="showPrompt()"></p>
							</form>
        				   
							
							
        			    </td>	
        		        <td width="40%" valign="top">
        		            <div><br><br><br>
								<?php
								if(!$result['PaymentId']){
									    echo('No payment details');
								}
								?>
        			            <div class="description">
        				            <br><br><p>My Payment details:</p>
        				            <em id="description" >
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
								        		$result=$checkDesc->fetch_assoc();
								        		echo('<br><br>Card: ');
												echo($result['Card']);
												echo("<br><br>");
												echo('CardName: ');
												echo($result['CardFirstName']);
								            }
                                        }else{
								        	error_reporting(E_ERROR | E_PARSE);
                                        }
								        ?>
										<p style="font-size: 18pt;"><br><br>Payment is nesessary to get a membership</p>
										<br>
										<div id="header_bot" style="margin-left:15px;">	
        				                	<p>Gym "Squat Ready"</p>
        				                </div><!--END HEADER_bot-->
							            
							            <form name="goto"  method="post" action="index.php">
							            	<input type="hidden" name="login" value="<?php  echo($email); ?>">
							            	<input type="hidden" name="password" value="<?php echo($pass); ?>">
							            	<input type="hidden" name="name" value="<?php echo($name); ?>">
							            	<input type="hidden" name="memberid" value="<?php echo($result['MemberId']); ?>">
							            <p><input type="submit" class="b" style="margin-left:15px; margin-top:25px; width: 200px;" value="Find a class" onclick="showPrompt()"></p>
							            </form>
									</em>
        			            </div>
        		            </div>
        		        </td>
        		    </tr>
        	   </table>
			<div id="wrap2">
        	<div class="line"></div>
        	<em style="margin-left: 20px">All rights reserved. Design by </em><a href="#" target="blank">Maryna Pelina</a>
        	<address style="margin-left: 20px"> city Dnipro, Ukraine. 2023</address> 
        </div><!--END WRAP2-->
	</div><!--END BACKGR-->
	<?php mysqli_close($conn);?>
</body>
</html>