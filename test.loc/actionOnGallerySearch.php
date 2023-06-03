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
	.greentext{
		color: #66Bfb7;
        text-decoration: none;
		text-align: center;
        font-size: 36px;
	}
	#wrap{
		background: LightBlue;
	}
	#wrap2{
		height:2200px;
		background: LightBlue;
	}
	.roundicon{
		height: 100px;
		border-radius: 80%;
		width: 100px;
		padding: 20px;
	}
	.squareicon{
		height: 100px;
		padding: 20px;
	}
	p{
		text-align: center;
		padding-top: 20px;
		font-size: 10pt;
		font-family: monospace;
		color:#cd66cc;
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
		display: flex;
        align-items: stretch;
		height:180px;
		margin-left: 40px;
		flex-wrap: wrap;
		min-height: 100px;
		min-width: 200px;
	}
	.textblock{
		display: flex;
		align-items: stretch;
		width: 500px;
	}
	.block1{
		display: none;
		width:15%;
		align-items: stretch;
		height: 300px;  
		background-size: contain;
	}
	.block2{
		width: 100%;
		display: inline-block;
		margin-left: 30px;
		height: 120px;  
		background-size: contain;
	}
	.block3{
		display: inline-block;
		align-items: stretch;
		margin-top: 15px;
		height: 40%;  
		background-size: contain;
		background-size: cover;
	}
</style>
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
	$club = $_POST['club'];
	$words = $_POST['words'];
	$type = $_POST['type'];
	$startdate = $_POST['startdate'];
	$email = $_POST['login'];
    $pass =$_POST['password'];
    $name=$_POST['name'];
    $memberid=$_POST['memberid'];
	$ispic=true;
	$check=null;
	$check2=null;
	$currentDate = date('Y-m-d'); 
	$dateInTwoWeeks = strtotime('+2 weeks'); 
	if($club!='club' && $type=='type'){
		$select="SELECT 
				gt.`Room`, gt.`CoachID`,
				gt.`TrainingName`, 
				gt.`RunDate`,
				c.`FirstName`, 
				gt.`TimeStart`, 
				gt.`TimeEnd`, 
				gt.`MaxAttendants`, 
				gt.`MinAttendants`, 
				gt.`Attendants`, 
				c.`ClubLocationName`,
				tt.`Img`
			FROM `grouptraining` gt
			JOIN `coach` c ON gt.`CoachID` = c.`CoachID`
			JOIN `trainingtype` tt ON gt.`TrainingName` = tt.`TrainingName`
			WHERE c.`ClubLocationName`='$club'";
		$check= $conn->query($select);
		$check2= $conn->query("SELECT * FROM `coach` WHERE `IS_WORKING`=1
        AND `ClubLocationName`= '$club'");
	}                                                                           
	else if($club!='club' && $words!=null && $type=='type'){                                        
		$select="SELECT 
				gt.`Room`, gt.`CoachID`,
				gt.`TrainingName`, 
				c.`FirstName`, 
				gt.`TimeStart`, 
				gt.`RunDate`,
				gt.`TimeEnd`, 
				gt.`MaxAttendants`, 
				gt.`MinAttendants`, 
				gt.`Attendants`, 
				c.`ClubLocationName`,
				tt.`Img`
			FROM `grouptraining` gt
			JOIN `coach` c ON gt.`CoachID` = c.`CoachID`
			JOIN `trainingtype` tt ON gt.`TrainingName` = tt.`TrainingName`
			WHERE c.`ClubLocationName`= '$club' AND gt.`TrainingName`='$words'";
		$check= $conn->query($select);                                              
        $check2= $conn->query("SELECT * FROM `coach` WHERE `IS_WORKING`=1
        AND FirstName='$words' AND `ClubLocationName`= '$club'");
	}else if( $club!='club' && $type!='type'  ){                           
		$select="SELECT 
				gt.`Room`, gt.`CoachID`,
				gt.`TrainingName`, 
				gt.`RunDate`,
				c.`FirstName`, 
				gt.`TimeStart`, 
				gt.`TimeEnd`, 
				gt.`MaxAttendants`, 
				gt.`MinAttendants`, 
				gt.`Attendants`, 
				c.`ClubLocationName`,
				tt.`Img`
			FROM `grouptraining` gt
			JOIN `coach` c ON gt.`CoachID` = c.`CoachID`
			JOIN `trainingtype` tt ON gt.`TrainingName` = tt.`TrainingName`
			WHERE gt.`TrainingName`='$type' AND c.`ClubLocationName`='$club'";
		$check= $conn->query($select);                                           
	}else if( $club!='club' && $type!='type' && $words!=null ){          
		$select="SELECT 
				gt.`Room`, 
				gt.`CoachID`,
				gt.`TrainingName`, 
				gt.`RunDate`,
				c.`FirstName`, 
				gt.`TimeStart`, 
				gt.`TimeEnd`, 
				gt.`MaxAttendants`, 
				gt.`MinAttendants`, 
				gt.`Attendants`, 
				c.`ClubLocationName`,
				tt.`Img`
			FROM `grouptraining` gt
			JOIN `coach` c ON gt.`CoachID` = c.`CoachID`
			JOIN `trainingtype` tt ON gt.`TrainingName` = tt.`TrainingName`
			WHERE gt.`TrainingName`='$type' AND c.`ClubLocationName`='$club' AND c.`FirstName`='$words'";
		$check= $conn->query($select);                                                                     //TrainingName= '$type' AND
    }else if( $words!=null && $type=='type' && $club=='club' ){  
    	$select="SELECT 
    			gt.`Room`, 
				gt.`CoachID`,
    			gt.`TrainingName`, 
    			gt.`RunDate`,
    			c.`FirstName`, 
    			gt.`TimeStart`, 
    			gt.`TimeEnd`, 
    			gt.`MaxAttendants`, 
    			gt.`MinAttendants`, 
    			gt.`Attendants`, 
    			c.`ClubLocationName`,
    			tt.`Img`
    		FROM `grouptraining` gt
    		JOIN `coach` c ON gt.`CoachID` = c.`CoachID`
    		JOIN `trainingtype` tt ON gt.`TrainingName` = tt.`TrainingName`
    		WHERE gt.`TrainingName`='$words'";
    	$check= $conn->query($select); //TrainingName= '$type' AND
    	$check2= $conn->query("SELECT * FROM `coach` WHERE `IS_WORKING`=1
    	AND FirstName='$words'");
		}else if( $words!=null && $type=='type' && $club=='club' && $startdate==null ){  
			$select="SELECT 
					gt.`Room`, 
					gt.`CoachID`,
					gt.`TrainingName`, 
					gt.`RunDate`,
					c.`FirstName`, 
					gt.`TimeStart`, 
					gt.`TimeEnd`, 
					gt.`MaxAttendants`, 
					gt.`MinAttendants`, 
					gt.`Attendants`, 
					c.`ClubLocationName`,
					tt.`Img`
				FROM `grouptraining` gt
				JOIN `coach` c ON gt.`CoachID` = c.`CoachID`
				JOIN `trainingtype` tt ON gt.`TrainingName` = tt.`TrainingName`
				WHERE gt.`TrainingName`='$words'";
			
			$check= $conn->query($select); 
			$check2= $conn->query("SELECT * FROM `coach` WHERE `IS_WORKING`=1
			AND FirstName='$words'");
	}else if( $startdate!=null && $words==null && $type=='type' && $club=='club'){                                                                                //&& $type!='training type'
    	$select="SELECT 
    			gt.`Room`, 
				gt.`CoachID`,
    			gt.`TrainingName`, 
    			gt.`RunDate`,
    			c.`FirstName`, 
    			gt.`TimeStart`, 
    			gt.`TimeEnd`, 
    			gt.`MaxAttendants`, 
    			gt.`MinAttendants`, 
    			gt.`Attendants`, 
    			c.`ClubLocationName`,
    			tt.`Img`
    		FROM `grouptraining` gt
    		JOIN `coach` c ON gt.`CoachID` = c.`CoachID`
    		JOIN `trainingtype` tt ON gt.`TrainingName` = tt.`TrainingName`
    		WHERE gt.`RunDate`='$startdate'";
    	$check= $conn->query($select); 
	}else if( $startdate!=null && $type!='type' && $club=='club'){ 
			$select="SELECT 
					gt.`Room`, 
					gt.`CoachID`,
					gt.`TrainingName`, 
					gt.`RunDate`,
					c.`FirstName`, 
					gt.`TimeStart`, 
					gt.`TimeEnd`, 
					gt.`MaxAttendants`, 
					gt.`MinAttendants`, 
					gt.`Attendants`, 
					c.`ClubLocationName`,
					tt.`Img`
				FROM `grouptraining` gt
				JOIN `coach` c ON gt.`CoachID` = c.`CoachID`
				JOIN `trainingtype` tt ON gt.`TrainingName` = tt.`TrainingName`
				WHERE gt.`RunDate`='$startdate' AND gt.`TrainingName`='$type'";
			
			$check= $conn->query($select); 
	}else if( $type!='type' && $club=='club'){ 
		$select="SELECT 
				gt.`Room`, 
				gt.`CoachID`,
				gt.`TrainingName`, 
				gt.`RunDate`,
				c.`FirstName`, 
				gt.`TimeStart`, 
				gt.`TimeEnd`, 
				gt.`MaxAttendants`, 
				gt.`MinAttendants`, 
				gt.`Attendants`, 
				c.`ClubLocationName`,
				tt.`Img`
			FROM `grouptraining` gt
			JOIN `coach` c ON gt.`CoachID` = c.`CoachID`
			JOIN `trainingtype` tt ON gt.`TrainingName` = tt.`TrainingName`
			WHERE gt.`TrainingName`='$type'
			ORDER BY gt.`RunDate` ASC";
		$check= $conn->query($select);       
	}
	if($check || $check2 || $check && $check2){
		$chosen=null;
		$chosen2=null;
		if($check) {
			$chosen = $check->fetch_assoc();
		}
		if($check2) {
			$chosen2 = $check2->fetch_assoc();
		}
		echo('<!DOCTYPE html>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<head>
			<meta charset=utf-8 />
			<meta name="author" content="Marina Pelina" />
			<meta name="keywords" content="gym"/>
			<meta name="description" content="Gym." />
			<link rel="stylesheet" type="text/css" href="style.css">
			<link rel="shortcut icon" href="https://img.icons8.com/color/48/gum-.png"/>
			</head>
			<body > 
				 <div class="background-img">
					<div class="line"></div><!--END LINE-->
					<div class="hat" >
						<div class="horizontal" >
							<div class="buttons" >
							<div id="SiteNameBackgr"><a href="index.php" id="SiteName">Squat Ready<img src="https://img.icons8.com/color/48/gum-.png"></a>
							</div>
        		            <div id="menu"  >
        		            	<ul>
        		            	<li >
								    <form name="goto" method="post" action="index.php">
				            			<input type="hidden" name="login" value="'); 
				            			 echo($email); echo('">
				            			<input type="hidden" name="password" value="'); echo($pass); echo('">
				            			<input type="hidden" name="name" value="'); echo($name); echo('">
				            			<input type="hidden" name="memberid" value="'); echo $memberid; echo('">
				            			<p><input type="submit" style="background-color: #66Bfb7; height: 45px; width: 80px; color: white; border: none;" value="Home" onclick="showPrompt()"></p>
				            		</form>
								</li>
        		            	</ul>
        		            </div>
							<div id="menu" >
								<ul>
								<li ><a href="#" id="m1">Settings</a></li>
								</ul>
							</div>
							<div id="menu" >
								<ul>');
        error_reporting(E_ERROR | E_PARSE);
        if($_POST['login']){
            echo('<a href="pageProfile.php" id="m1">');
        	echo($name);
        	echo('</a></li>');
        }else{
        	echo('<a href="pageSignin.php" id="m1">Log in</a></li>');
        }
        echo('
								</ul>
							</div>
							</div>
						</div>
					</div>
					<div class="line"></div>
					<div id="wrap2">
					    <div id="wrap">
							<div class="line"></div>
							<div id="header_top" class="flexbox"  style="padding-left: 40px; margin: 40px;">
							<a href="#" class="smp">
								Find Your Next Training
								<form name="search" method="post" style="padding-top: 40px;" action="actionOnGallerySearch.php">
									<select name ="club">
										<option value="club">club</option>
										<option value="Bourke">Bourke</option>
										<option value="Collins">Collins</option>
										<option value="other">other</option>
									</select><a href=""><img style="padding-left: 5px; height: 10px;"src="question-mark.png"></a> 
									<label for="start">Start date:</label>
                                    <input type="date" id="start" name="startdate"
                                        min="');echo $currentDate; echo('" 
									    max="');echo $dateInTwoWeeks; echo('">
									<select name ="type">
									    <option value="type">training type</option>');
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
									echo(' 
									</select>
									<input type="hidden" name="login" value="'); 
								    echo($email); echo('">
								    <input type="hidden" name="password" value="'); echo($pass); echo('">
								    <input type="hidden" name="name" value="'); echo($name); echo('">
								    <input type="hidden" name="memberid" value="'); echo $memberid; echo('">
									<input type="search" placeholder="Search training or coach" name="words" >
									<a href=""><img style="padding-left: 5px; height: 10px;"src="question-mark.png"></a> 
									<input type="submit"  value="search" onclick="showPrompt()">
								 </form>
							 </a>
						    </div><!--HEADER_TOP END-->
						    <div class="blocking">
						    ');
							if($chosen){
								do{
									echo('
								<div class="blockeach">
					                <p style="font-size: 18px; padding-top: 50px; padding-left: 45px; ">');
					                $timestamp = strtotime($chosen['TimeStart']);
                                    $time = date("h:i A", $timestamp);
                                    echo $time;
					                echo(' - ');
					                $timestamp = strtotime($chosen['TimeEnd']);
                                    $time = date("h:i A", $timestamp);
                                    echo $time;
					                echo "<br><br>";
					                echo $chosen['RunDate'];
					                echo('</p>	
					                <div style="display: block; background-color: white; border-bottom: solid lightyellow; border-top: solid yellow; border-radius: 20% 0% 0% 20%;">
					                    <img class="squareicon" src="');echo($chosen['Img']); echo('"></img>
					                    <div style="padding-left: 20px;">
					                        <progress value="');echo($chosen['Attendants']); echo('" max="');echo($chosen['MaxAttendants']); echo('"></progress>  
					                    </div>  
					                </div>	
					                <div class="textblock" style="background-color: white; border-bottom: solid lightyellow; border-top: solid yellow; border-radius: 0% 30px 30px 0%;">
					                    <div class="block2"><br>
					                	    <p style="font-size: 24px; text-align: left;"><a name="info" style="font-size: 24px; text-align: left; color:black;"> '); // 
					                		echo($chosen['TrainingName']);
					                		echo('</a><br><br><h2>');
					                		echo('👨 coach: ');
					                		echo($chosen['FirstName']);
					                		echo('</h2><br>');
					                		echo('🏠');
					                		echo($chosen['ClubLocationName']);
					                		echo('</img></p></div>');
					                		if($email){
					                			echo('
												<div style="display: inline-block; width: 100%">
					                		        <form name="book"  method="post" action="actionToBook.php">
					                		            <input type="hidden" name="login" value="');
					                		        	 echo($email); echo('">
					                		        	<input type="hidden" name="password" value="'); echo($pass); echo('">
					                		        	<input type="hidden" name="name" value="'); echo($name); echo('">
					                		        	<input type="hidden" name="grtype" value="'); echo($chosen['TrainingName']); echo('">
					                		        	<input type="hidden" name="grdate" value="'); echo($chosen['RunDate']); echo('">
					                		        	<input type="hidden" name="grtime" value="'); echo($chosen['TimeStart']); echo('">
					                		        	<input type="hidden" name="grcoach" value="'); echo($chosen['CoachID']); echo('">
					                		        	<input type="hidden" name="memberid" value="'); echo($memberid); echo('">
					                		            <p><input type="submit" class="b" style="margin-left:15px; margin-top:15px; color: white;" value="Book me" onclick="showPrompt()"></p>
					                		        </form>
												</div>');
					                		}
							                echo('
					                	</div>
					                </div>
			                        ');
						        }while($chosen=$check->fetch_assoc());
							}else if($chosen2){
								do{
									echo('
									<div class="blockeach">
									    <img class="roundicon" src="');echo($chosen2['PROFPIC_URL']); $id = $chosen2['CoachID']; echo('"></img>
									    <div class="textblock" >
										    <p><a name="info" href="pageDifProfile.php" onClick="fsetcookie()"> '); // 
											echo($chosen2['FirstName']);
											echo('<br>Club:');
											echo($chosen2['ClubLocationName']);
											echo(' ');
											echo('</a></p>
										</div>
									</div>
									');
								}while($chosen2=$check2->fetch_assoc());
							}
							echo('
							    </div> <!--END Blockeach?-->
							</div> <!--END Blocking-->
						</div><!--END WRAP-->
						<div class="line"></div>
						<div id="cop" >
						   <p style="font-size: 14pt; font-family: monospace; color:blueviolet">All rights reserved. Design by <a href="#" target="blank">Maryna Pelina</a></p>
						   <p style="font-size: 20pt; font-family: monospace; color:blueviolet"></p>
						</div><!--END COP--> 	
					</div><!--END WRAP2-->
				</div><!--END BACKGROUND-->
			</body>
			</html>');
		
	}else{
		header('Location: '.$uri.'/test.loc/index.php');
	}
	mysqli_close($conn);
?>

