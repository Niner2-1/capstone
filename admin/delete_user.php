<?php
	$conn = new mysqli("localhost", "root", "", "capstonedbdraft") or die(mysqli_error());
	$conn->query("DELETE FROM `user` WHERE `user_id` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
	echo("<script> location.replace('user.php');</script>");

