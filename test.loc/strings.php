
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<meta charset=utf-8 />
<style>
	body{
	    background-color: #026873;
        background-image: linear-gradient(90deg, rgba(255,255,255,.07) 50%, transparent 50%),
        linear-gradient(90deg, rgba(255,255,255,.13) 50%, transparent 50%),
        linear-gradient(90deg, transparent 50%, rgba(255,255,255,.17) 50%),
        linear-gradient(90deg, transparent 50%, rgba(255,255,255,.19) 50%);
        background-size: 13px, 29px, 37px, 53px;}
	div{
		display: inline-block;
		border-radius: 2px;
		border: solid black;
		margin-left: 20px;
		height: 1000px;  
		background-size: contain;
	}
	.block1{
		background-image: url(gifblink.gif);
		width:15%;
		margin-left: 10%;
	}
	.block2{
		background: white;
		width: 45%;
	}
	.block3{
		background-image: url(gifblink.gif);
		width: 15%;
	}

	form{
	    display: inline-block;
        width:250px;
        margin:50px auto;
        padding:15px 20px;
	    margin-left:34%;
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
</style>
<script>
// function popup() 
// {
//     document.getElementById('infbox').innerHTML = 'Добро пожаловать: ';
//     let log = localStorage.getItem("login");
//     document.getElementById('login').value=log;
// }
</script>
</head>
<body > 
	<div class="block1"></div>
	<div class="block2">
        <?php
			print("<br>1. Функция explode(), и random() что из списка сладостей выберает один<br><br>");
            $sweets  = "печенье торт клубника варенье брауни вафли хурма";
            $pieces = explode(" ", $sweets);
            $r = random_int(0, 6);
            echo $pieces[$r]; // кусок1
            print("<br><br><br>2. Функция str_pad. STR_PAD_BOTH Заполнит с боков _* <br><br>");
			$input = "Alien";
            echo str_pad($input, 10, "_*", STR_PAD_BOTH);   // выводит "__Alien___"
            print("<br><br><br>3. Функция  str_word_count(), обычная и специальная <br><br>");
            $str = "Hello fri3nd, you're123
               looking      32    good today!";
            $result = str_word_count($str, 1);
            foreach($result as $r){
            	echo $r . "\n";
            }
            print("<br>");
            $result = str_word_count($str, 1, 'àáãç3');
            foreach($result as $r){
            	echo $r . "\n";
            }
            print("<br><br><br>4. Функция  strlen() <br><br>");
			$text = 'This is a test';
			echo $text;
			print("<br>");
            echo strlen($text); // 14
			print("<br><br><br>5. Функция substr_count() <br><br>");
			print($text);
			print("<br>is    -    ");
			echo substr_count($text, 'is'); 
			print("<br>is (when taken Thi and read 3 next)    -    ");
            echo substr_count($text, 'is', 3, 3);
			print("<br><br><br>6. Функция strtoupper() <br><br>");
			echo strtoupper($text);
			print("<br><br><br>7. Функция strtolower() <br><br>");
			echo strtolower($text);
			print("<br><br>8. Функция substr() <br><br>");
			echo substr($text, 5);
        ?>

		<!-- <form action="action.php" method="post">
			<p>Что вам сьесть: <input type="text" name="name" /></p>
			<p>Ваш возраст: <input type="text" name="age" /></p>
			<p>Ваш пароль: <input type="password" name="password" /></p>
			<p>Повторите пароль: <input type="password" name="verifypassword" /></p>

			<p><input type="submit" /></p>
		</form> -->
	</div>
	<div class="block3"></div>

</body>
</html>