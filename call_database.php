<!--=====================[ PHP : database var ]=====================-->
    <?php error_reporting (E_ALL ^ E_NOTICE); ?>
    <?php date_default_timezone_set("Asia/Bangkok"); //so time will be same as TH ?>
    <?php  
        $date   = date('Y-m-d');
        $day    = date('d');
        $month  = date('m');
        $year   = date('Y');
        $days   = date('t'); //Number of days in this month
        $smonth = strtotime($date); 
        $sday   = strtotime($date); 

        if(isset($_POST["date"]) && isset($_POST["timestart"]) && isset($_POST["timeend"])){
            $date   = date('Y-m-d',strtotime($_POST['date']));
            $days   = date('t', strtotime($_POST['date'])); 
            $smonth = strtotime($_POST['date']);
            $sday   = strtotime($_POST['date']);
            $day    = date('d', strtotime($_POST['date'])); //Gets day of appointment (1‐31) 
            $month  = date('m', strtotime($_POST['date'])); //Gets month of appointment (1‐12) 
            $year   = date('Y', strtotime($_POST['date'])); //Gets year of appointment (e.g. 2016)       
        }
        else if(isset($_GET['date'])){
            $date   = date('Y-m-d',strtotime($_GET['date']));
            $days   = date('t', strtotime($_GET['date'])); 
            $smonth = strtotime($_GET['date']);
            $sday   = strtotime($_GET['date']);
            $day    = date('d', strtotime($_GET['date']));  //Gets day of appointment (1‐31) 
            $month  = date('m', strtotime($_GET['date']));  //Gets month of appointment (1‐12) 
            $year   = date('Y', strtotime($_GET['date']));
        }
        else{
            $date   = date('Y-m-d');
            $day    = date('d');
            $month  = date('m');
            $year   = date('Y');
            $days   = date('t');
            $sday   = strtotime($date);
            $smonth = strtotime($date);
        }
        if(isset($_POST['title'])&& isset($_REQUEST['details'])&& isset($_REQUEST['timestart'])&& isset($_REQUEST['timeend'])){
            $title      = $_REQUEST['title'];            
            $details    = $_REQUEST['details'];
            $timestart  = $_REQUEST['timestart'];
            $timeend    = $_REQUEST['timeend'];    
        }

        $firstday   = date('w', strtotime('01-' . $month . '-' . $year));  //Gets the day of the week for the 1st of  
        $today      = date('d'); //Gets today’s date 
        $todaymonth = date('m'); //Gets today’s month 
        $todayyear  = date('Y'); //Gets today’s year
        $monthname  = date('F', mktime(0, 0, 0, $month, 10));    
        $dayname    = date('l');

        //move to next month / week
        $prev_month = date('Y-m-d',strtotime('-1 month',$smonth));
        $next_month = date('Y-m-d',strtotime('+1 month',$smonth)); 
        $prev_day   = date('Y-m-d',strtotime('-7 day',$sday));
        $next_day   = date('Y-m-d',strtotime('+7 day',$sday));
        
        /*appointment var parts*/
        //pulling from 'go' btn
        $userid     = $_SESSION['UID'];
        $start_day  = $_POST['start_day'];    
        $end_day    = $_POST['end_day'];
        $start_time = $_POST['start_time'];   
        $end_time   = $_POST['end_time'];
        $title      = $_POST['title'];
        $detail     = $_POST['detail'];
    ?>
    <!--=====================[ PHP : insert apooointment  ]=====================-->
    <?php        
        $message="";
        //Push info from database
        $mysqli = new mysqli('127.0.0.1:3306','root','','calendar');
        if(isset($title)){
            $mysql = "INSERT INTO appointment (start_day, end_day, start_time, end_time, title, detail, UID) VALUES ('$start_day','$end_day','$start_time','$end_time','$title','$detail','$userid')";
            $mysqli->query($mysql);
        }
        $sql    = "SELECT * FROM appointment";
        $result = $mysqli->query($sql);
        $row    = $result->fetch_assoc();
        $title  = $row["title"];
        $details= $row["detail"];
        $result->close();
    ?>
<!--=========================================================================-->