
<?php
$mysqli = new mysqli("localhost","root","","flex");
if ($mysqli->connect_error) {
	echo '<div class="container"><h3 class="text-center mt-5 text-danger">Error: <br/><br/>The connection could not be established</h3></div>';
}

$look = "SELECT * FROM projects"; 
	$view = mysqli_query($mysqli,$look) or die("Some error has been occured! .".mysqli_error($mysqli));
	
    $activity = "SELECT * FROM activity"; 
	$act = mysqli_query($mysqli,$activity) or die("Some error has been occured! .".mysqli_error($mysqli));

    $user = "SELECT * FROM user"; 
	$use = mysqli_query($mysqli,$user) or die("Some error has been occured! .".mysqli_error($mysqli));
	
	
?>




<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
    <link href="css/flex.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="container">
        <div class="topheader">
            <div class="start"> <img src="logo.PNG" alt="hello" class="img"></div>

            <div class="center"></div>
            <div class="center"></div>
            <div class="center"></div>
            <div class="center"></div>
            <div class="center"></div>
            <div class="center"></div>
            <div class="center"></div>
            <div class="center"></div>
            <div class="center">
                <input type="text-area" placeholder="Search for projects " style="color: aliceblue;" class="button" size="100" />
            </div>

            <div class="end"></div>

            <div class="col1">

                Documentation</div>
            <div class="col1">Support</div>
            <div class="end"><img src="img.jpg" alt="hello" class="img"></div>

        </div>
        <div class="container1">

            <div class="side1">
                <div class="box">
                    <div class="disp">
                        <img src="img.jpg" alt="hello" class="img">


                        <div class="disp">
                            <h4>
                            <?php $us = mysqli_fetch_assoc($use);
                            echo $us['full_name'];
                            
                            ?>


                            </h4>
                            <h5 class="col"><i class="fa fa-address-book"> </i> <?php echo $us['full_name']; ?></h5>
                        </div>


                    </div>






                </div>
                <div class="buttons">
                    <input type="button" class="new" value="New Project">

                </div>
                <br>
                <div class="buttons">

                    <input type="button" class="in" value="Invite Team">

                </div>

                <h4 class="col"><i class="fa fa-check-square"> </i> Pro Member</h4>
                <h4 class="col"><i class="fa fa-paw"></i> <?php  $r=mysqli_num_rows($view);
                echo $r;  ?> Projects</h4>



            </div>
            <div class="vert"></div>
            <div class="side2">
                <div class="top">
                    <h3 class="start">Projects</h3>
                    <h4 class="end"><i class="fa fa-sort-asc"></i> sort<i class="fa-sort-up"></i> </h4>
                </div>

                <div class="divider"></div>

                <?php
		
		  while($got = mysqli_fetch_assoc($view)){	


		  ?>
		  



                <div class="topp">
                    <div class="top">
                        <h4 class="start"> <i class="fa fa-circle" style="color: #32c48d;"></i><?php echo $got['repo_name'];?></h4>
                        <h5 class="end col"> Visit site<i class="fa fa-star" class="yel"> </i></h5>


                    </div>
                    <div class="top">
                        <h5 class="start col"><?php echo $us['full_name']; echo"/"; echo $got['repo_name']; ?></h5>
                        <?php 
                        $start = strtotime(date("h:i:sa"));
                        $end = strtotime($got['time']);
                        $mins = ($end - $start) / 60 / 60;
                        
                        
                        
                        ?>
                        <h5 class="center col">laravel: last deploy <?php echo $mins ?> days </h5>
                        <h5 class="end col"> <?php echo $got['address'];?></h5>

                    </div>
                </div>
                
                <div class="divider"></div>
<?php } ?>

            
            </div>





            <div class="vert"></div>

            <div class="side3">
                <div class="top">
                    <h3 class="start">Activity</h3>

                </div>
                <?php
		
        while($ac = mysqli_fetch_assoc($act)){	


        ?>
        


                <div class="box">

                    <div class="disp">
                        <img src="img.jpg" alt="hello" class="img">



                        <div class="disp">
                            <h4>You</h4>
                            <p class="col"> <?php echo $ac['activity']; ?></h4>
                            </p>

                        </div>
                    </div>
                </div>


                <div class="divider"></div>

               <?php } ?>



            </div>

        </div>

    </div>











</body>


</html>