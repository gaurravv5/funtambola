<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles.css" />
	</head>
	<body>
		<div class="body-container">
			<div class="header"><h1>Fun Tambola</h1></div>
			<div class="contol-box">
				<div class="generated-box"><span></span></div>
				<div class="generate-button"><button type="button" id="generate_number">Call</button></div>
			</div>
			<div class="board">
				<?php 
					$numbers = [];
					$i = 0;
					echo "<div class='number_row'>";
					do {
						echo "<div class='number_box number_" . ++$i . "'><span>".$i."</span></div>";
						if ($i == 90) {
							echo "</div>";
						}
						else if ($i%10 == 0) {
							echo "</div><div class='number_row'>";
						}
					 } while ($i < 90);
				?>
			</div>
		</div>
	</body>
</html>			

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	jQuery(function() {
		var numbers = [];
		jQuery("#generate_number").on("click", function() {
			var number = 0;
			do {
				number = getRandomInt(1,90);
			} while(numbers.includes(number) == true)
			
			numbers.push(number);
			jQuery(".generated-box>span").text(number);
			jQuery(".number_"+number+">span").css({"background-color": "brown", "color": "beige"});
			if (numbers.length == 90) {
				jQuery(this).prop('disabled', true);
			}
		});

		function getRandomInt(min, max) {
		    min = Math.ceil(min);
		    max = Math.floor(max);
		    return Math.floor(Math.random() * (max - min + 1)) + min;
		}
	});
</script>