<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /*============ CREATE CALENDAR TABLE ============*/
        .calendar{ 
            position:relative; 
            width: 960px; 
        } 
        div.date, div.days{ 
            width: 120px; 
            border: 1px solid black;  
            float: left; 
            margin: 1px; 
        } 
        .blankday{ 
            background:#ccc; 
        } 
        div.date{ 
            height: 120px; 
        } 
        .today{ 
            background:#cfc;   
        } 
        /*adding to arrange UI*/
        .arrow{
            position:relative;        
        }
    </style>
</head>
<body>
     <!--=== declare ===--> 
        <?php date_default_timezone_set("Asia/Bangkok");  //so time will be same as TH ?>
        <?php       
            $date=date('Y-m-d');
            $day=date('d');
            $month=date('m');
            $year=date('Y');
            $days=date('t');
            $smonth=strtotime($date); 
            
            if(isset($_GET['date'])){
                $date=date('Y-m-d',strtotime($_GET['date']));
                $days = date('t', strtotime($_GET['date'])); 
                $smonth = strtotime($_GET['date']);
                $day = date('d', strtotime($_GET['date']));        //Gets day of appointment (1‐31) 
                $month = date('m', strtotime($_GET['date']));      //Gets month of appointment (1‐12) 
                $year = date('Y', strtotime($_GET['date']));
            }
            else{
                $date=date('Y-m-d');
                $day=date('d');
                $month=date('m');
                $year=date('Y');
                $days=date('t');
                $smonth=strtotime($date);
            }

            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            if(isset($_POST['title'])&& isset($_REQUEST['detail'])&& isset($_REQUEST['start_day'])&& isset($_REQUEST['end_day'])){                 
                    $title      = $_REQUEST['title']; //Gets appointment title
                    $detail     = $_REQUEST['detail'];
                    $start_day  = $_REQUEST['start_day'];
                    $end_day    = $_REQUEST['end_day'];    
            }
            $firstday = date('w', strtotime('01-' . $month . '-' . $year));  //Gets the day of the week for the 1st of  
                     //Gets number of days in month 

            $today = date('d');                 //Gets today’s date 
            $todaymonth = date('m');            //Gets today’s month 
            $todayyear = date('Y');             //Gets today’s year
            $monthname = date('F', mktime(0, 0, 0, $month, 10));  
                
            $prev_month = date('Y-m-d',strtotime('-1 month',$smonth));
            $next_month = date('Y-m-d',strtotime('+1 month',$smonth));  
            $userid = $_SESSION["UID"];                 //pulling from table so will know which user push it
            $start_day = $_POST["appointment_date"];    //pulling from Go!
            $title = $_POST['title'];
            $end_day= $_POST['appointment_date2'];
            $detail= $_POST['detail'];
        ?> 
    <!--================== UI ==================-->    
    <!--=== fill box ===-->
    <form action="calendar.php" method="post"> 
        Start day: <input type="date" name="appointment_date"><br /> 
        End day: <input type="date" name="appointment_date2"><br /> 
        Title: <input type="text" name="title" /><br /> 
        Detail: <input type="text" name="detail" /><br /> 
        <input type="submit" value="Go!"> 
    </form> 
    
    <!--================== Calendar ==================-->
     
      <!--=== UI:day header ===--> 
        <div class="calendar" > 
            <?php echo '<div class="tomonth">'.$monthname.",".$year.'</div>';?>
            <div class="days">Sunday    </div> 
            <div class="days">Monday    </div> 
            <div class="days">Tuesday   </div> 
            <div class="days">Wednesday </div> 
            <div class="days">Thursday  </div> 
            <div class="days">Friday    </div> 
            <div class="days">Saturday  </div>

      <!--=== database part ===--> 
        <?php
            
            $message="";
            //Push info from database
            $mysqli = new mysqli('127.0.0.1:3306','root','','calendar');
            if(isset($title)){
                $mysql = "INSERT INTO appointment (start_day, end_day, title, detail, UID) VALUES ('$start_day','$end_day','$title','$detail','$userid')";
                $mysqli->query($mysql);
            }
            $sql = "SELECT * FROM appointment";
            $result = $mysqli->query($sql);
            $row = $result->fetch_assoc();
            $title=$row["title"];
            $details=$row["detail"];
            $result->close();
        ?>
            
      <!--=== UI:blank days ===--> 
            <?php 
                for($i=1; $i<=$firstday; $i++) 
                    { echo '<div class="date blankday"></div>'; } 
            ?> 
      <!--=== UI:days of the month can be displayed ===--> 
            <?php 
                for($i=1; $i<=$days; $i++) 
                { 
                    echo '<div class="date'; 
                    if ($today == $i && $todaymonth==$month && $todayyear == $year) 
                        { echo ' today'; } 
                    echo '">' . $i . '<br>'; 

                    if($day==$i) 
                        { 
                            echo $title; 
                        } 
                    echo  '</div>'; 
                    //$qry="SELECT * FROM appointment WHERE date='$appointment_date'AND id='$userid'";
                   
                }   
            ?> 
      <!--=== UI:blank days ===--> 
            <?php 
                $daysleft = 7 - (($days + $firstday)%7); 
                if($daysleft<7) 
                { 
                    for($i=1; $i<=$daysleft; $i++) 
                        { echo '<div class="date blankday"></div>'; }
                } 
            ?>
        </div>
        <div class="arrow">
            <span id="arrow1" style="left: 0px;"> <button><a href="?date=<?php echo $prev_month; ?>"><-</a></button></span>
            <span id="arrow2" style="left: 0px;"> <button><a href="?date=<?php echo $next_month; ?>">-></a></button></span>
    
        </div>
        
        <br>
        Welcome <?php echo $_SESSION["forename"]; echo " "; echo $_SESSION["surname"]; echo " UID: "; echo $_SESSION["UID"]; ?>. 
        Click here to <a href="Logout.php" tite="Logout">Logout.


</body>
</html>