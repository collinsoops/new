<?php
$mysqli = new mysqli("localhost","root","","flex");
if ($mysqli->connect_error) {
	echo '<div class="container"><h3 class="text-center mt-5 text-danger">Error: <br/><br/>The connection could not be established</h3></div>';
}


$look = "SELECT * FROM projects WHERE project_id= 0"; 
	$view = mysqli_query($mysqli,$look) or die("Some error has been occured! .".mysqli_error($mysqli));
	
$r=mysqli_fetch_assoc($view);

?>



<html>
<head>
<title></title>
<link href="css/flex.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="topheader">

<?php

echo $r['repo_name'];


    ?>
    </div>
    </body>
    </html>