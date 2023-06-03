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
		//echo 'Успешно соединились!!!';
	}
?>
<script>
	console.warn = () => {};
</script>
<style>
	.formpadding{
		margin-left:15px;
	    margin-top:15px;
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
        				    <div id="menu" style="margin-left:15px; text-align:center" >
        				    	<ul>
        				    	<li><a href="index.php" id="m1">Home</a></li>
        				    	</ul>
        				    </div>
        				    <div id="header_top" style="margin-left:150px; text-align:center">
        				    	<a href="#" class="smp" >
								    <?php 
								    $login=htmlspecialchars($_COOKIE['Login']);
								    $pass=htmlspecialchars($_COOKIE['Pass']);
								    if($login){
								    	$checkEmailQuery= $conn->query(
								    		"SELECT ClubLocationName
								            FROM admin
								    		WHERE LoginID= '$login' AND Password = '$pass'");
								    	
							            if($checkEmailQuery){
								        	$result=$checkEmailQuery->fetch_assoc();
								    		echo('Hello Admin from ');
								    		echo( $result['ClubLocationName']);
								    		echo('<br>');
								        }
                                    }else{
                                    	error_reporting(E_ERROR | E_PARSE);
                                    }
                                    ?>
								</a>
							</div><!--END HEADER_TOP-->
							<form name="fclass" class="login" style="margin-left:15px; margin-top:15px;" autocomplete="off" method="post" action="actionOnAdminProfile.php">
							    <p>👍Setup New Group Class</p>
							    <div class="formpadding">            
							    	<p><select name ="grtype">
									    <option value="">training type name</option>
									    <?php
									    $selectall="SELECT TrainingName
									   				 FROM trainingtype";
									    $allguys=$conn->query($selectall);
									    $result=$allguys->fetch_assoc();
										do{
											echo('<option value="'); echo($result['TrainingName']);echo('">'); 
											echo($result['TrainingName']);
											echo('</option>
											');
										}while($result=$allguys->fetch_assoc());
									    ?>
									    </select>
									</p>
									<p>
										<select name ="grcoach">
										<option value="">coach</option>
									    <?php
									    $selectall="SELECT CoachID, FirstName, LastName
									    				 FROM coach";
									    $allguys=$conn->query($selectall);
									    $result=$allguys->fetch_assoc();
										do{
										    echo('<option value="'); echo($result['CoachID']);echo('">'); 
										    echo($result['FirstName']);echo(' '); echo($result['LastName']);echo('</option>');
										}while($result=$allguys->fetch_assoc());
									    ?>
									    </select>
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
							<form name="ftrain" class="login" style="margin-left:15px; margin-top:15px;" autocomplete="off" method="post" action="actionOnAdminProfile.php">
							    <p>👍 Setup New Training</p>
								<div class="formpadding">
									<p><input type="text" name="trainingName" placeholder="Training Name">
				                    </p>
									<p><input type="number" name="reqlevel" placeholder="Required Level">
									</p>
									<p style="font-size: 15px; font-family: sans-serif; margin-top: 10px;">
									Equipment 
									<select name ="reqeq">
										<option value=''>none</option>
									    <?php 
										    $selectall="SELECT Name
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
        				    <div id="header_bot" style="margin-left:15px;">	
        				    	<p>Gym "Squat Ready"</p>
        		            </div>
        		        </td>
        		    </tr>
        	   </table>
			<div id="wrap2">
        	    <div class="line"></div>
        		<em style="margin-left: 20px">Image by <a href="https://pixabay.com/users/xusenru-1829710/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1333600">Khusen Rustamov</a> from <a href="https://pixabay.com//?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1333600">Pixabay</a>All rights reserved. Design by </em><a href="#" target="blank">Marina Pelin</a>
        	    <address style="margin-left: 20px"> city Dnipro, Ukraine. 2023</address> 
            </div><!--END WRAP2-->
	</div><!--END BACKGR-->
	<?php mysqli_close($conn);?>
</body>
</html>