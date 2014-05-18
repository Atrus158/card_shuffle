<?php
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Card Shuffle</title>
	<meta name="description" content="JavaScript Card Shuffler."/>
	<style>
		body {
			width: 100%;
			background: black;
			color: yellow;
			margin: 0;
		}
		.wrapper {
			width: 1024px;
			height: 500px;
			margin: 0 auto;
			text-align: center;
			background: url("images/portfolio_02.png");
		}
		.card_display {
			clear: left;
			margin: 0 auto;
			text-align: center;
			width: 750px;
		}
		.card_display img{
			float: left;
			margin-left: 15px;
			margin-top: 20px;
			width: 40px;
			height: 55px;
		}
		.shuffle_button {
			clear: both;
		}
		.shuffle_button button {
			margin-top: 50px;
			font-size: 27px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<?php
			$card = 0;

			for ($a=0; $a<4; $a++) {
  				echo '<div class="card_display">';
  				
  				for ($i=0; $i<13; $i++) {
  					$card=($card + 1);

  				    echo '<div><img id="card' . $card . '" src="cards/card_back.png" alt="card graphic"/></div>';
  				}
  				echo '</div>';
  			}	
		?>

		<div class="shuffle_button">
			<button id="shuffle" type="button">Shuffle</button>
		</div>

	</div><!-- End wrapper -->
	<script>
	(function(){

		var shuffleListener = document.getElementById("shuffle");
		shuffleListener.addEventListener("click", shuffeCards);

		var cardArray = ["1s", "2s", "3s", "4s", "5s", "6s", "7s", "8s", "9s", "10s", "11s", "12s", "13s", "1d", "2d", "3d", "4d", "5d", "6d", "7d", "8d", "9d", "10d", "11d", "12d", "13d", "13c","12c", "11c", "10c", "9c", "8c", "7c", "6c", "5c", "4c", "3c", "2c", "1c", "13h", "12h", "11h", "10h", "9h", "8h", "7h", "6h", "5h", "4h", "3h", "2h", "1h"];

		function clearDeck() {
			for (i=0; i<52; i++) {
				cardArray[i]="";
			}
		}

		function displayCards() {
			var imageToChange = "nada";
			var imageString = "nada";
			for (i=0; i<52; i++) {
				imageToChange = "card" + (i+1);
				imageString = "cards/" + cardArray[i] + ".png";
				document.getElementById(imageToChange).src = imageString;
			}
		}

		//Immediately-Invoked Function Expression to display the cards on startup.
		//(displayCards());

		function shuffeCards() {
			clearDeck();
			var card=0;
			var rank=0;
			var suit="";
			var cardIsDuplicate=true;

			for (i=0; i<52; i++) {

				cardIsDuplicate = true;
				while (cardIsDuplicate==true) {
					cardIsDuplicate = false;

					rank=Math.floor((Math.random() * 13) + 1);

					suit=Math.floor((Math.random() * 4) + 1);
					if (suit==1) {suit="s";}
					if (suit==2) {suit="d";}
					if (suit==3) {suit="c";}
					if (suit==4) {suit="h";}

					for (a=0; a<52; a++) {
						if (cardArray[a] == rank+suit) {
							cardIsDuplicate = true;
						}
					}
					if (cardIsDuplicate==false) {
						cardArray[i]=rank+suit;
					}
				}
			}
			displayCards();
		}

	})();
	</script>
</body>
</html>