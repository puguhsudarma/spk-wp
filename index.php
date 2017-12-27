<?php
session_start();
include "config/library_config.php";
?>

<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<title>Program SPK</title>
    <link href='assets/bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css' />
	<link href='assets/style/main.css' rel='stylesheet' type='text/css' />
    <noscript><meta http-equiv='refresh' content='0; URL=page/js.html' /></noscript>
</head>
<!--
	Body Program //============================================
-->
<body>
<div id='container'>
	<h1>Sistem Pendukung Keputusan</h1>
	<div id='body'><?php include "page/view_presentation.php"; ?></div>
	<p class='footer'>
		Created By <strong>Kelompok SPK</strong>. All Rights Reserved. 2015
	</p>
</div>
<script src='assets/js/jquery-1.8.2.js'></script>
<script src='assets/bootstrap/js/bootstrap.min.js'></script>
</body>
<!--
	Body Program //============================================
-->
</html>