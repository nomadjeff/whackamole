<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Whack a Mole</title>

	<style type="text/css">
		body {
			cursor: url('/images/shovel.png'), default;
		}

		h2 {
			color: white;
		}
        .buttontext {
			content:'Test';
        }
	</style>

</head>
<body background="images/background.jpg">

<center>
<h2>Whack a Mole - South Park Edition</h2>
</center>
<br><br>
<table border="0">
	<tr>
		<td align="center" rowspan="2" width="410"><h1 id="scorebox">0</h1></td>
		<td><img class="mole" id="1" src="images/stanmarsh.png" height="200"></td>
		<td width="40"></td>
		<td><img class="mole" id="2" height="200" src="images/cartman.png"></td>
		<td width="40"></td>
		<td><img class="mole" id="3" height="200" src="images/kenny.png"></td>
		<td width="170"></td>
		<td valign="bottom" rowspan="2"><img src="/images/sign.png"></td>
	</tr>
	<tr>
		<td><img class="mole" id="4" height="200" src="images/butters.png"></td>
		<td></td>
		<td align="center"><img class="mole" id="5" height="200" src="images/wendy.png"></td>
		<td></td>
		<td><img class="mole" id="6" height="200" src="images/kyle.png"></td>
		<td></td>
	</tr>
</table>
<br>
<center>
<img id="startbutton" width="300" src="/images/playnow.png">
</center>
<script src="/js/jquery.min.js"></script>
<script>

	// Preloads game sounds for later use.
	var theme = new Audio('/sounds/theme.mp3');
    var pop = new Audio('/sounds/pop.mp3');
    var clang = new Audio('/sounds/clang.wav');
    var stan = new Audio('/sounds/stan.mp3');
    var cartman = new Audio('/sounds/cartman.wav');
    var kenny = new Audio('/sounds/kenny.mp3');
    var butters = new Audio('/sounds/butters.mp3');
    var kyle = new Audio('/sounds/kyle.mp3')
 
    // Sets initial score to zero
    var score = 0;

    // This will be used to time the game
    var timesRun = 0;


	$("#startbutton").click(function() {
		theme.play();
		

		$('#startbutton').css('visibility', 'hidden');
		$('.mole').css('visibility', 'hidden');

		var interval = setInterval(function() {

			// This code selects a mole, displays their image, makes a sound.
			var number = 1 + Math.floor(Math.random() * 6);
	        var img = document.getElementById(number);
	    	img.style.visibility= "visible";
			pop.play();
			timesRun += 1;

			// Stops play after the interval has run set number of times.
			if(timesRun == 20) {
				clearInterval(interval);
			}

			// This function handles what happens when a character is clicked.
	    	$(img).click(function() {
	    		img.style.visibility = "hidden";
	    		clang.play();
	    		score += 100;
	    		var scorebox = document.getElementById("scorebox");
	    		scorebox.innerHTML=score;

	    		// Sets character sound to play after clang sound.
	    		setTimeout(function() {
	    		switch (number) {
	    			case 1:
	    				stan.play();
	    				break;
	    			case 2:
	    				cartman.play();
	    				break;
	    			case 3:
	    				kenny.play();
	    				break;
	    			case 4:
	    				butters.play();
	    				break;
	    			case 6:
	    				kyle.play();
	    				break;
	    		}
	    		}, 200);
	    	});

	 
	    	setTimeout(function() {
	    		img.style.visibility = "hidden";
	    		$(img).off();
	    	}, 800);

		}, 1300);
	});
  </script>

</body>
</html>