7	<?php
	$db='mainbd';
    $dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
	if(! $conn ) die('Could not connect: ' . mysql_error());
	if($conn) echo 'Успешно соединились!!!';

	$img = $_POST['img'];
	$name = $_POST['name'];
	$tools = $_POST['tools'];
	$time = $_POST['time'];
	$genre = $_POST['genre'];

	$login=htmlspecialchars($_COOKIE['Login']);
	$pass=htmlspecialchars($_COOKIE['Pass']);
	$checkEmailQuery= $conn->query("SELECT ID
	    FROM account
		WHERE EMAIL= '$login' AND PASS= '$pass'");
	
	if($checkEmailQuery){
		echo'Вы найдены';
		//echo $checkEmailQuery;$checkEmailQuery
		
		$result=$checkEmailQuery->fetch_assoc();
		$id = $result['ID'];

		$sql = "INSERT INTO `painting` (`ID`, `ARTIST`, `LIKES`,
		`TOOLS`, `TIME`, `IMG`, `GENRE`, `NAME`) VALUES 
		(NULL, '$id', '0', '$tools', '$time', '$img',
		'$genre', '$name')";

		if($conn->query($sql) === TRUE){
			echo "yeeeeeeeeeeeees";
	        header('Location: '.$uri.'/test.loc/pageProfile.php');// перекидывает на этот адрес
		}
	}else{
		echo "Not found email";
	}


	// $sql = "INSERT INTO `account` ( `NICK`, 'DESCRIPTION', 'PROFPIC_URL') VALUES 
	//  ('$nick', '$desc', '$pic')";

    // if ($conn->query($sql) === TRUE) {
	// 	echo "New record created successfully";
	// 	setcookie("Description", $desc, time()+3600, "/");
	// 	setcookie("Pic_url", $pic, time()+3600, "/");
	// 	setcookie("Nick", $nick, time()+3600, "/");
	//     header('Location: '.$uri.'/test.loc/pagePrifile.php');// перекидывает на этот адрес
		
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
	// }
	

	//setcookie("Access", $id, time()+3600, "/");

	//$pass = 'kekKEK123@';
	//$email ='marinapelina@gmail.com';
	
    
	mysqli_close($conn);
?>


<!-- 	

	
	// $prevCon="SELECT * FROM account";
	// $result = $conn->query($prevCon);
	// if(!$result) die("GG!");
// $gg = $result->num_rows +1;//?

// $checkEmailQuery= $conn->query(
// 	"SELECT COUNT(EMAIL) AS 'Exist'
// 	FROM account
// 	WHERE EMAIL= '$email'");
// $passValidate = preg_match("(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=])(?=\\S+$).{8,}", $pass);
// $emailValidate = filter_var($email, FILTER_VALIDATE_EMAIL);
// $emailAgain = $checkEmailQuery->fetch_assoc()['Exist']==0;
// $passwordsAreEqual = $pass ==$verpass;
// echo $passwordsAreEqual;
// echo $passValidate;
// echo $emailAgain;
// echo $emailValidate;

// $Suc = $passValidate && $passwordsAreEqual && $emailValidate && $emailAgain; 

// if($Suc ==false){
// 	if(!empty($_SERVER['HTTPS'])&&('on' == $_SERVER['HTTPS'])){
// 		$uri = 'https://';
// 	}else{
// 		$uri = 'http://';
// 	}
// 	$uri .=$_SERVER['HTTP_HOST'];
// 	//header('Location: '.$uri.'/test.loc/Signin.html');
// 	exit;
// } -->
