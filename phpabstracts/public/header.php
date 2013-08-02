<?php

// Check to see if user is logged in. If not, redirect to login page.
if (! isset ( $_COOKIE ["user"] ))
	header ( 'Location: login.php' );
	
	// Include commonly used variables
include ('vars.php');

// Check to see if admin is logged in
$role = $_COOKIE ["role"];
if ($role == "ADMIN")
	$admin = "1";

?>


<!DOCTYPE html>
<html>

<!--
/************************************************************************
 *
 *  phpAbstracts
 *  http://www.phpabstracts.com
 *
 *  Copyright (c) 2008 Omar Qazi
 *
 *  phpAbstracts is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  phpAbstracts is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with phpAbstracts.  If not, see <http://www.gnu.org/licenses/>. 
 *
************************************************************************/
-->

<head>
<title><?php echo $site_title; ?></title>
<link href="css/abstracts.css" rel="stylesheet" type="text/css" />
<link href="css/abstracts_print.css" rel="stylesheet" type="text/css"
	media="print" />
<script type="text/javascript"
	src="js/sorttable.js"></script>
<script type="text/javascript"
	src="js/abstracts.js"></script>
<script type="text/javascript">
        <?php
								$current_url = $_SERVER ['PHP_SELF'];
								if (strpos ( $current_url, "list" )) {
									echo "window.onload=function(){tableruler();} ";
								}
								?>
    </script>
</head>


<body>

	<div id="header" class="top_container">
		<img src="images/logo.gif" />
		<div class="title_header">
			<h2 style="margin: 0px;"><?php echo $site_title; ?></h2>
			<p>You are logged in as <?php echo($_COOKIE["name"]); ?> | <a
					href='logout.php'>Logout</a>
			</p>
		</div>
	</div>

	<div class="centering_container" id="main_container">