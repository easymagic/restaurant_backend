<!DOCTYPE html>
<html>
<head>
	<!-- <title></title> -->
	<?php 
     echo __filter('header');
	?>
</head>
<body>
<?php 
 echo $content;
?>
<?php 
 echo __filter('footer');
?>
</body>
</html>