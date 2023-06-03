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
		
	}
	$email=htmlspecialchars($_COOKIE['Login']);
	$pass=htmlspecialchars($_COOKIE['Pass']);
	error_reporting(E_ERROR | E_PARSE);
	if($_POST['login']){
		$email = $_POST['login'];
		$pass = $_POST['password'];
		
		error_reporting(E_ERROR | E_PARSE);
		
		
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
<script>
function Error(){
	document.getElementById("pic").style.backgroundColor = 'red';
}


</script>
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
        			<li ><a  target="_blank"  href="htmldovidka/profil.htm" id="m1">Help</a></li>
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
        		
        				    <div id="header_top" style=" text-align:center">
        				    	<a href="#" class="smp" >
								<?php 
								
								if($email){
									$checkEmailQuery= $conn->query(
										"SELECT `CoachID`, `Email`, `Password`, `FirstName`, ClubLocationName
								        FROM `coach`
										WHERE `Email`= '$email' AND `Password` = '$pass'");
									
							        if($checkEmailQuery){
								    	$result1=$checkEmailQuery->fetch_assoc();
								    	
										echo('Hello ');echo $result1["FirstName"]; echo('!  <br>Coach from ');
										echo( $result1["ClubLocationName"]);
										echo('<br>');

										$coachid=$result1["CoachID"];
								    }
                                }else{
                                	error_reporting(E_ERROR | E_PARSE);
                                }
								
                                ?>
								</a>
								
							</div><!--END HEADER_TOP-->
							<div style="display: flex;
                                        align-items: stretch;
		                                margin-left: 40px;
		                                flex-wrap: wrap;">
	    
							<form name="fclass" class="login" style="margin-left:15px; margin-top:15px;" autocomplete="off" method="post" action="actionOnCoachProfile.php">
							    <p>👍Setup New Group Class</p>
							    <div class="formpadding">            
							    	<p>
									<select name ="grtype">
									 <option value="">training type name</option>
									 <?php
									 $selectall=
												 "SELECT TrainingName
													 FROM trainingtype";
												 $allguys=$conn->query($selectall);
												 $result=$allguys->fetch_assoc();
												 
												 do{
										 
													 echo('										        		
															 <option value="'); echo($result['TrainingName']);echo('">'); echo($result['TrainingName']);echo('</option>
														 ');
												 }while($result=$allguys->fetch_assoc());
											 
									 ?>
									 </select>
				                    </p>
									<p>
									
										<input type="hidden" name ="grcoach" value="<?php echo( $coachid); ?>"></option>
									
				                    </p>
							    	<p><input type="date" name="rundate" placeholder="Date">
				                    </p>
							    	<p><input type="time" name="timestart" placeholder="Start Time">
							    	</p>
									<p><input type="time" name="timeend" placeholder="End Time">
							    	</p>
							    	<p><input type="number" name="maxattendants" placeholder="Max Attendants">
							    	</p>
							    	<p><input type="number" name="minattendants" placeholder="Min Attendants">
							    	</p>
									<p><input type="number" name="room" placeholder="Room">
							    	</p>
									
							    	<p><input type="submit" value="save" onclick="showPrompt()"></p>
							    </div>
							</form>
							<form name="ftrain" class="login" style="margin-left: auto; margin-top:15px; padding-right: 20px;" autocomplete="off" method="post" action="actionOnCoachProfile.php">
							    <p>👍 Setup New Training</p>
								<div class="formpadding">
									<p><input type="text" name="trainingName" placeholder="Training Name">
				                    </p>
									<p><input type="number" name="reqlevel" placeholder="Required Level">
									</p>
									<p style="font-size: 15px; font-family: sans-serif; margin-top: 10px;">
									Equipment <select name ="reqeq">
										<option value=''>none</option>
									    <?php $selectall=
								        	"SELECT Name
								                FROM equipment";
		                                    $allguys=$conn->query($selectall);
											$result=$allguys->fetch_assoc();
											
											do{
									
										        echo('										        		
														<option value="'); echo($result['Name']);echo('">'); echo($result['Name']);echo('</option>
										        	');
										    }while($result=$allguys->fetch_assoc());
                                        ?>
										
									</select>
									
									<p><input type="file" name="pic" value="img-pilatas.jpg" accept="image/*">
									</p>
									<p><input type="submit" value="save" onclick="showPrompt()"></p>
							    </div>
							</form>
							</div>

										
							
        				    <div id="header_bot" style="text-align: center;">	
        				    	<p>Gym "Squat Ready"</p>
        				    </div><!--END HEADER_bot-->
							<!-- <p style="margin-top:30px; margin-left:50%">Memberships: ...</p> -->
        			   
        		            
									   
        			            
        		            
        		        
			<div class="line"></div>
		    <p style="margin-left: 20px;">My created group trainings &#x1F90D;</p>
			<div class="line"></div>
			
			<?php
								
								if($email){
									$checkBTr= $conn->query("SELECT 
			                                	gt.`RunDate`, gt.`TimeStart`,
			                                	gt.`TrainingName`, 
			                                	c.`FirstName`, 
			                                	c.`LastName`,
			                                	gt.`TimeEnd`, 
			                                	gt.`MaxAttendants`, 
			                                	gt.`MinAttendants`, 
			                                	gt.`Attendants`, 
			                                	c.`ClubLocationName`,
			                                	tt.`Img`,
			                                	gt.`CoachID`
			                                FROM `grouptraining` gt
			                                JOIN `coach` c ON gt.`CoachID` = c.`CoachID`
			                                JOIN `trainingtype` tt ON gt.`TrainingName` = tt.`TrainingName`
			                                WHERE gt.`CoachID` = '$coachid'
			                                ORDER BY gt.`TimeStart` ASC"); 
										if($checkBTr){
											$resultgroup=$checkBTr->fetch_assoc();
											if($resultgroup!=NULL){
												echo('<div class="blocking">');
												do{
													echo('
													<div class="blockeach" style="background-color: white; border-radius: 20px;">
													
													<p style="font-size: 18px; padding-top: 50px; text-decoration: underline; text-align: center;">');
					// Convert the time value to a Unix timestamp
					$timestamp = strtotime($resultgroup['TimeStart']);
                    $time = date("h:i A", $timestamp);
                    echo $time;
					echo(' - ');
					$timestamp = strtotime($resultgroup['TimeEnd']);
                    $time = date("h:i A", $timestamp);
                    echo $time;
					echo "<br><br>";
					echo $resultgroup['RunDate'];
					echo('</p>	
					
					<div style="display: block; ">
					 
					<img class="squareicon" src="');echo($resultgroup['Img']); echo('"></img>
					<div style="padding-left: 20px;">
					
					</div>  
					</div>	
					
					<div class="textblock"  >
						    <p style="font-size: 24px; padding-left: 20px;"><a name="info"  href="pageDifProfile.php" onClick="fsetcookie()"> '); // 
							
							echo($resultgroup['TrainingName']);
							echo('</a><br><br><a style="font-size: 20px;">');
							echo('coach: ');
							echo($resultgroup['FirstName']);
							
							echo('<br><br>');
							
							echo('club: ');
							
							echo($resultgroup['ClubLocationName']);
							
							echo('</a></p>

							

						</div>
						<form name="book"  method="post" action="actionCancel.php">
							<input type="hidden" name="login" value="');
								 echo($email); echo('">
								<input type="hidden" name="password" value="'); echo($pass); echo('">
								<input type="hidden" name="name" value="'); echo($name); echo('">
								<input type="hidden" name="grtype" value="'); echo($resultgroup['TrainingName']); echo('">
								<input type="hidden" name="grdate" value="'); echo($resultgroup['RunDate']); echo('">
								<input type="hidden" name="grtime" value="'); echo($resultgroup['StartTime']); echo('">
								
								<input type="hidden" name="coachid" value="'); echo($coachid); echo('">

							<p><input type="submit" class="b" style=" margin-top:20px; color: white;" value="Cancel" onclick="showPrompt()"></p>
							</form>
					</div>
												');
												}while($resultgroup=$checkBTr->fetch_assoc());
												echo('</div>');
				
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
            
        		<em style="margin-left: 20px">Image by <a href="https://pixabay.com/users/xusenru-1829710/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1333600">Khusen Rustamov</a> from <a href="https://pixabay.com//?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1333600">Pixabay</a>All rights reserved. Design by </em><a href="#" target="blank">Marina Pelin</a>
        	 <address style="margin-left: 20px"> city Dnipro, Ukraine. 2022</address> 
        	 
            	
        </div><!--END WRAP2-->
	</div><!--END BACKGR-->
	<?php mysqli_close($conn);?>
</body>
</html>