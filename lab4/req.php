<?php
	
	extract( $_POST );
	
	$squared = pow( $squared, 2 );
	$root = sqrt( $root );
	
	$color = sprintf("#%06x",rand(0,16777215));l
	
?>
<!doctype html>
<html>
	<head>
		<title>Lab 4 / Result</title>
		<style>
			body {
				background-color: <?php echo $color; ?>;
			}
		</style>
	</head>
	<body>
		<pre>
			Squared Result: <?php echo( $squared ); ?>
			Square Root Result: <?php echo( $root ); ?> 
		</pre>
	</body>
</html>