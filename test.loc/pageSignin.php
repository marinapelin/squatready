<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<meta charset=utf-8 />
<link rel="stylesheet" type="text/css" href="style.css">
<style>
	@import url("reset.css");
body{
	text-align: center;
	background-color: #026873;
    background-image: linear-gradient(90deg, rgba(255,255,255,.07) 50%, transparent 50%),
    linear-gradient(90deg, rgba(255,255,255,.13) 50%, transparent 50%),
    linear-gradient(90deg, transparent 50%, rgba(255,255,255,.17) 50%),
    linear-gradient(90deg, transparent 50%, rgba(255,255,255,.19) 50%);
	background-size: 13px, 29px, 37px, 53px;
    }

.block1{
	display: inline-block;

	
	width:15%;

    }
.block2{
	display: inline-block;
	text-align: center;
	background-color: #66Bfb7;
	width: 45%;
    }
.block3{
	display: inline-block;


	width: 15%;
    }
#infbox{
	background-color: #f5f5f5;
	margin:10% 30%;
    }
form{
	display: inline-block;
    width:250px;
    padding:15px 20px;
   
    /*padding:4% 30%;*/
    background:#f5f5f5; 
    border-radius: 10px;
	
    }
label{
    display:block;
	margin-top:1em;
	margin-bottom:0.5em;
    }
label:first-child{
    margin-top:0;
    }
input[type="text"],
input[type="password"]{
    width:100%;
    border:1px solid #ccc;
	padding:4px 5px;
	background:white;
	border-radius: 5px;
	box-shadow:inset 0 4px 2px rgba(0, 0, 0, 0.2);
	box-sizing:border-box;
	}
input[type="text"]:focus,
input[type="password"]:focus{
    box-shadow:0 0 5px rgba(50, 200, 255, 0.5);
	outline: none;
	}
input[type="submit"]{
    display:block;
	margin-top:1em;
	padding:5px 15px;
	font-weight: bold;
	color:#333;
	background: white;
	border: none;
	border-radius: 12px; 
	background-image: linear-gradient(to bottom, #fff, #ddd);
	box-shadow:inset 0 1px 2px rgba(0, 0, 0, 0.3);
	text-shadow:0 1px 1px white;
	}	
	@media (max-width: 599px){
	.block3{
		display:none;
	}
	.block1{
		display: none;
	}
}
	</style>
<script>
function GoToReg()
{
	window.open("pageRegistration.html")
}
</script> 
<script>

</script>
</head>
<?php 
error_reporting(E_ERROR | E_PARSE);
if($_COOKIE['Login']){
	//echo htmlspecialchars($_COOKIE['Login']);
}else{
	//error_reporting(E_ERROR | E_PARSE);
}
?>
<body onload="popup()"> 
	<div class="line"></div>
	<div class="block1"></div>
	<div class="block2" id="SiteNameBackgr">	    
	<a id="SiteName" href="index.php">     Squat Ready🏋🏽🔥💪🏼🎧</a></div>
	</div>
	<div class="block3"></div>
	<div class="line"></div>
	<form name="myform" class="login" method="post" action="actionOnSignin.php">
		<label for="login">Input email</label>
		<input type="text" id="login" name="login" value="
		<?php echo htmlspecialchars($_COOKIE['Login'])?>" required/>
		<label for="password">Input password</label>
		<input type="password" id="password" name="password" value="
		<?php echo htmlspecialchars($_COOKIE['Pass'])?>" required/>
		<input id="submit" type="submit" value="Submit" onclick="showPrompt()" />
		<label for="registration">Not Registered yet?</label>
		<input id="regsubmit" type="submit" value="Go Register" onclick="GoToReg()"/> 
	</form>

	<div id="fb-root"></div>
	<div id ="infbox"></div>
	<p id="demo"></p>
</body >
</html>
