<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<meta charset=utf-8 />
<meta name="author" content="Maryna Pelina" />
<meta name="keywords" content="gym"/>
<meta name="description" content="A website for Gym Squat Ready." />
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="shortcut icon" href="https://img.icons8.com/color/48/gum-.png"/>
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
		height: 100%;
		background: LightBlue;
	}
	.roundicon{
		height: 70px;
		border-radius: 80%;
		width: 70px;
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
		width: 800px;
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
	.block4{
		width: 40%;
		display: inline-block;
		align-items: stretch;
		margin-top: 15px;
		height: 200px;  
		background-size: contain;
		background: url("man.jpg") center;
		background-size: cover;
	}
</style>
</head>
<body > 
     <div class="background-img">
        <div class="line"></div><!--END LINE-->
        <div class="hat" >
        	<div class="horizontal" >
        		<div class="buttons" >
        	        <div id="SiteNameBackgr"><a id="SiteName">Squat Ready🏋🏽🔥💪🏼🎧<img src="https://img.icons8.com/color/48/gum-.png"></a>
			        </div>
        		    <div id="menu" >
        		    	<ul>
        		    	<li ><a href="#" target=”_blank” id="m1">Settings</a></li>
        		    	</ul>
        		    </div>
        		    <div id="menu" >
        		    	<ul>
        		    	<li >
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
                            error_reporting(E_ERROR | E_PARSE);
                            if($_POST['login']){
                            	$email = $_POST['login'];
                                $pass =$_POST['password'];
                                $name=$_POST['name'];
                                $memberid=$_POST['memberid'];
                                echo('<a href="pageProfile.php" id="m1">');
                            	echo($name);
                            	echo('</a></li>');
                            }else{
                            	echo('<a href="pageSignin.php" id="m1">Log in</a></li>');
                            }
                            ?>
				        </ul>
        		    </div>
        		</div>
        	</div>
        </div><!--END HAT-->
        <div class="line"></div>
            <div class="wrap" id="wrap">
				<?php
				if($conn)
				{
					echo('
					<div class="block2">
					<div id="header_top" class="flexbox"  style="padding-left: 40px;">
					<a href="#" class="smp" >
						 Find Your Next Training
						 <form name="search" method="post"  action="actionOnGallerySearch.php">
						 
							 <select name ="club">
								 <option value="club">club</option>
								 <option value="Bourke">Bourke</option>
								 <option value="Collins">Collins</option>
								 <option value="other">other</option>
							 </select><a href=""><img style="padding-left: 5px; height: 10px;"src="question-mark.png"></a> 
							 <br>
							 <label for="start">Start date:</label>
                             <input type="date" id="start" name="startdate"
                                    value="'); echo('"
                                    min="');$currentDate = date('Y-m-d'); echo $currentDate; echo('" 
									max="');$currentDate = date('Y-m-d'); $dateInTwoWeeks = strtotime('+2 weeks'); echo $dateInTwoWeeks; echo('">

							 <select name ="type">
							      <option value="type">training type</option>');
							    $selectall=
								    "SELECT TrainingName
								        FROM trainingtype";
		                            $allguys=$conn->query($selectall);
									$result=$allguys->fetch_assoc();
									do{
									    echo('										        		
												<option value="'); echo($result['TrainingName']);echo('">'); 
												echo($result['TrainingName']);echo('</option>
									    	');
									}while($result=$allguys->fetch_assoc());
                                        
								echo(' 
							 </select>
							 
							 <input type="search" placeholder="Search training or coach" name="words" >
							 <a href=""><img style="padding-left: 5px; height: 10px;"src="question-mark.png"></a> 
							 <input type="hidden" name="login" value="'); 
								 echo($email); echo('">
								<input type="hidden" name="password" value="'); echo($pass); echo('">
								<input type="hidden" name="name" value="'); echo($name); echo('">
								<input type="hidden" name="memberid" value="'); echo $memberid; echo('">
							 <input type="submit"  value="search" onclick="showPrompt()">
						 </form>
					    </a>
				    </div>
					</div>
					<div class="block3" style="padding-left: 20px;">
					    <img src="img_woman1.jpg" height="160px">
					
					    <img src="man.jpg"   height="160px">
						<img src="img-boxing1.jpg"   height="160px">
						<img src="gym1.jpg"   height="160px">
						<img src="pilatas2.jpg"   height="160px">
					</div>
					<div class="line"></div><div class="line"></div>
					');
				
                    //show group classes
				    $selectgrouptraining1="SELECT 
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
			        WHERE gt.`RunDate` = '2023-01-01'
			        ORDER BY gt.`TimeStart` ASC"; 
				    
				    $alltraining=$conn->query($selectgrouptraining1);
				    $resultgroup=$alltraining->fetch_assoc();
				    echo('<div class="blocking">');
				    do{
			            echo('
				    	<div class="blockeach">
				    	<p style="font-size: 18px; padding-top: 50px;  padding-right: 10px;">');
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
				    	<div style="display: block; background-color: white; border-bottom: solid lightyellow; border-top: solid yellow; border-radius: 20% 0% 0% 20%;">
				    	 
				    	<img class="squareicon" src="');echo($resultgroup['Img']); echo('"></img>
				    	<div style="padding-left: 20px;">
				    	<progress value="');echo($resultgroup['Attendants']); echo('" max="');echo($resultgroup['MaxAttendants']); echo('"></progress>  
				    	</div>  
				    	</div>	
				    	<div class="textblock" style="background-color: white; border-bottom: solid lightyellow; border-top: solid yellow; border-radius: 0% 30px 30px 0%;"   >
				    	<div class="block2"  >
				    	<p style="font-size: 24px; text-align: left;"><a name="info" style=""> '); // 
				    			
				    	echo($resultgroup['TrainingName']);
				    	echo('</a><br><br><h2>');
				    	echo('👨 coach: ');
				    	echo($resultgroup['FirstName']);
				    	
				    	echo('</h2><br>');
				    	echo('🏠club: ');
				    	echo($resultgroup['ClubLocationName']);
				    	echo('</img></p></div>');
				    	if($email){
				    		echo('
				    	    <div style="display: inline-block; width: 100%">
				    	        <form name="book"  method="post" action="actionToBook.php">
				    	            <input type="hidden" name="login" value="');
				    		        echo($email); echo('">
				    		        <input type="hidden" name="password" value="'); echo($pass); echo('">
				    		        <input type="hidden" name="name" value="'); echo($name); echo('">
				    		        <input type="hidden" name="grtype" value="'); echo($resultgroup['TrainingName']); echo('">
				    		        <input type="hidden" name="grdate" value="'); echo($resultgroup['RunDate']); echo('">
				    		        <input type="hidden" name="grtime" value="'); echo($resultgroup['TimeStart']); echo('">
				    		        <input type="hidden" name="grcoach" value="'); echo($resultgroup['CoachID']); echo('">
				    		        <input type="hidden" name="memberid" value="'); echo($memberid); echo('"
				    	            <p><input type="submit" class="b" style="margin-left:15px; margin-top:15px; color: white;" value="Book me" onclick="showPrompt()"></p>
				    	        </form>
				    	    </div>');
				        }
				        echo('
				        	</div>
				        </div>
			            ');
				    }while($resultgroup=$alltraining->fetch_assoc());
	            
					mysqli_close($conn);
                }
				?>	
                </div><!--END WRAP-->
			</div><!--END BLOCK-->
			<div class="line"></div>
			</div><!--END WRAP-->
			<div id="wrap2">
            <div class="line"></div>
            <div id="cop">
            	<p style="font-size: 14pt; font-family: monospace; color:#cd66cc">All rights reserved. Photo by Andrea Piacquadio: https://www.pexels.com/photo/group-of-woman-doing-yoga-868483/. Design by <a href="#" target="blank">Image by <a href="https://pixabay.com/users/pexels-2286921/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1869744">Pexels</a> from <a href="https://pixabay.com//?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1869744">Pixabay</a>Image by <a href="https://pixabay.com/users/tanjashaw-360355/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1730325">Tanja Shaw</a> from <a href="https://pixabay.com//?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1730325">Pixabay</a>Marina Pelin</a></p>
            	<address style="text-align: center; font-size: 20pt; font-family: monospace; color:#f1c5f1"> city Dnipro, Ukraine. 2021</address> 
            	<p style="font-size: 20pt; font-family: monospace; color:#cd66cc">Used materials</p>
            	<a href='https://www.freepik.com/vectors/school'>School vector created by pch.vector - www.freepik.com </a> Image by <a href="https://pixabay.com/users/stevepb-282134/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1665606">Steve Buissinne</a> from <a href="https://pixabay.com//?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1665606">Pixabay</a>
            </div><!--END COP--> 	
        </div><!--END WRAP2-->
    </div><!--END BACKGROUND-->
</body>
</html>
