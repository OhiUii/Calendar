<?php
    $Wcalculate_start_day = +0 ;
    //calculate start display day_____________________________
    
    if(date("l") == 'Monday' ){         //today = Mon 
        //start generate day = -1 days
        $Wcalculate_start_day = -1;
    }
    else if(date("l") == 'Tuesday' ){   //today = Tue 
        //start generate day = -2 days
        $Wcalculate_start_day = -2;
    }               
    else if(date("l") == 'Wednesday' ){ //today = Wed 
        //start generate day = -3 days
        $Wcalculate_start_day = -3;
    }               
    else if(date("l") == 'Thursday' ){  //today = Thu 
        //start generate day = -4 days  
        $Wcalculate_start_day = -4;
    } 
    else if(date("l") == 'Friday' ){    //today = Fri 
        //start generate day = -5 days
        $Wcalculate_start_day = -5;
    } 
    else if(date("l") == 'Saturday' ){  //today = Sat 
        //start generate day = -6 days
        $Wcalculate_start_day = -6;
    } 

    //store original day for this week_____________________________
    //Sat
    $date1      = date('Y-m-d',strtotime($Wcalculate_start_day.' day',$sday));
    $day1       = date('d',strtotime($date1));
    $month1     = date('m',strtotime($date1));
    $year1      = date('Y',strtotime($date1));
    $monthname1 = date('F',strtotime($date1));
    //Mon
    $Wcalculate_start_day = $Wcalculate_start_day +1;
    $date2      = date('Y-m-d',strtotime($Wcalculate_start_day.' day',$sday));
    $day2       = date('d',strtotime($date2));
    $month2     = date('m',strtotime($date2));
    $year2      = date('Y',strtotime($date2));
    $monthname2 = date('F',strtotime($date2));
    //Tue
    $Wcalculate_start_day = $Wcalculate_start_day +1;
    $date3      = date('Y-m-d',strtotime($Wcalculate_start_day.' day',$sday));
    $day3       = date('d',strtotime($date3));
    $month3     = date('m',strtotime($date3));
    $year3      = date('Y',strtotime($date3));
    $monthname3 = date('F',strtotime($date3));
    //Wed
    $Wcalculate_start_day = $Wcalculate_start_day +1;
    $date4      = date('Y-m-d',strtotime($Wcalculate_start_day.' day',$sday));
    $day4       = date('d',strtotime($date4));
    $month4     = date('m',strtotime($date4));
    $year4      = date('Y',strtotime($date4));
    $monthname4 = date('F',strtotime($date4));
    //Thr
    $Wcalculate_start_day = $Wcalculate_start_day +1;
    $date5      = date('Y-m-d',strtotime($Wcalculate_start_day.' day',$sday));
    $day5       = date('d',strtotime($date5));
    $month5     = date('m',strtotime($date5));
    $year5      = date('Y',strtotime($date5));
    $monthname5 = date('F',strtotime($date5));
    //Fri
    $Wcalculate_start_day = $Wcalculate_start_day +1;
    $date6      = date('Y-m-d',strtotime($Wcalculate_start_day.' day',$sday));
    $day6       = date('d',strtotime($date6));
    $month6     = date('m',strtotime($date6));
    $year6      = date('Y',strtotime($date6));
    $monthname6 = date('F',strtotime($date6));
    //Sun
    $Wcalculate_start_day = $Wcalculate_start_day +1;
    $date7      = date('Y-m-d',strtotime($Wcalculate_start_day.' day',$sday));
    $day7       = date('d',strtotime($date7));
    $month7     = date('m',strtotime($date7));
    $year7      = date('Y',strtotime($date7));
    $monthname7 = date('F',strtotime($date7));
    

    ?>    
    <!--=========================================================================================-->
    <!--===================[ Week view ]=========================================================-->

    <div id="week_view" class="container_calendar2">
        <!--========[ M head ]=========-->
        <div class="container_black">
            <div class="day_heading"> S </div>
            <div class="day_heading"> M </div>
            <div class="day_heading"> T </div>
            <div class="day_heading"> W </div>
            <div class="day_heading"> T </div>
            <div class="day_heading"> F </div>
            <div class="day_heading"> S </div>
        </div>
        
        <!-- arrow -->
        <a href="?date=<?php echo $prev_day; ?>">
        <div class="arrow" style="position: absolute; top: -16px; left: 20px;">
            <img src="UI_design/Pic/arrowL_w.png" style="width: 16px;">
        </div>
        </a>
        <a href="?date=<?php echo $next_day; ?>">
        <div class="arrow" style="position: absolute; top: -16px; right: 20px;">
            <img src="UI_design/Pic/arrowR_W.png" style="width: 17px;">
        </div>
        </a>

        <!--|||||||||||||||||||||||||||||||-->
        <!-- W box -->
        <div class="container_Wweek">
        <!--========[ day : ALL ]=========-->
        <?php //appear just event have null-null time 
            for($i=1; $i<=7; $i++){             
                if($i==1)       //Sun
                {
                    $newdate = date("$year-$month-$day1");

                    echo '<div class="ALL_bar ALL_notoday" name="';
                    echo $newdate.'">'; 

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] == '00:00:00' && $row["start_time"] == '00:00:00'){
                                echo '<div class="container_ALL">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';

                            }   
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }
                else if($i==2){ //Mon
                    $newdate = date("$year-$month-$day2");

                    echo '<div class="ALL_bar ALL_notoday" name="';
                    echo $newdate.'">'; 

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] == '00:00:00' && $row["start_time"] == '00:00:00'){
                                echo '<div class="container_ALL">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';
                            }
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }
                else if($i==3){ //Tue
                    $newdate = date("$year-$month-$day3");

                    echo '<div class="ALL_bar ALL_notoday" name="';
                    echo $newdate.'">'; 

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] == '00:00:00' && $row["start_time"] == '00:00:00'){
                                echo '<div class="container_ALL">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';
                            }
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }   
                else if($i==4){ //Wed
                    $newdate = date("$year-$month-$day4");

                    echo '<div class="ALL_bar ALL_notoday" name="';
                    echo $newdate.'">'; 

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] == '00:00:00' && $row["start_time"] == '00:00:00'){
                                echo '<div class="container_ALL">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';
                            }
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }
                else if($i==5){ //Thr
                    $newdate = date("$year-$month-$day5");

                    echo '<div class="ALL_bar ALL_notoday" name="';
                    echo $newdate.'">'; 

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] == '00:00:00' && $row["start_time"] == '00:00:00'){
                                echo '<div class="container_ALL">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';
                            }
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }
                else if($i==6){ //Fri
                    $newdate = date("$year-$month-$day6");
                    echo '<div class="ALL_bar ALL_notoday" name="';
                    echo $newdate.'">'; 

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] == '00:00:00' && $row["start_time"] == '00:00:00'){
                                echo '<div class="container_ALL">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';
                            }
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }
                else if($i==7){ //Sat
                    $newdate = date("$year-$month-$day7");

                    echo '<div class="ALL_bar ALL_notoday" name="';
                    echo $newdate.'">'; 

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] == '00:00:00' && $row["start_time"] == '00:00:00'){
                                echo '<div class="container_ECT">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';
                            }
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }
                echo '</div>';
            }
            
            /*
            <div class="ALL_bar ALL_notoday">  </div> 
            <div class="ALL_bar ALL_today">  </div> 
            */
        ?>
                        
        <!--========[ day : ECT ]=========-->
        <?php
            for($i=1; $i<=7; $i++){
                if($i==1)       //Sun
                {
                    $newdate = date("$year-$month-$day1");

                    echo '<div class="ECT_bar ECT_notoday" name="';
                    echo $newdate.'">';  

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] != '00:00:00'){
                                echo '<div class="container_ECT">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '<span class="start_time">'.$row["start_time"].'</span>';
                                    echo' - ';
                                    echo '<span class="end_time">'.$row["end_time"].'</span> <br>';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';
                            }   
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }
                else if($i==2){ //Mon
                    $newdate = date("$year-$month-$day2");

                    echo '<div class="ECT_bar ECT_notoday" name="';
                    echo $newdate.'">';

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] != '00:00:00'){
                                echo '<div class="container_ECT">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '<span class="start_time">'.$row["start_time"].'</span>';
                                    echo' - ';
                                    echo '<span class="end_time">'.$row["end_time"].'</span> <br>';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';
                            }
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }
                else if($i==3){ //Tue
                    $newdate = date("$year-$month-$day3");

                    echo '<div class="ECT_bar ECT_notoday" name="';
                    echo $newdate.'">';

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] != '00:00:00'){
                                echo '<div class="container_ECT">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '<span class="start_time">'.$row["start_time"].'</span>';
                                    echo' - ';
                                    echo '<span class="end_time">'.$row["end_time"].'</span> <br>';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';
                            }
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }   
                else if($i==4){ //Wed
                    $newdate = date("$year-$month-$day4");

                    echo '<div class="ECT_bar ECT_notoday" name="';
                    echo $newdate.'">';
                
                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] != '00:00:00'){
                                echo '<div class="container_ECT">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '<span class="start_time">'.$row["start_time"].'</span>';
                                    echo' - ';
                                    echo '<span class="end_time">'.$row["end_time"].'</span> <br>';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';
                            }
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }
                else if($i==5){ //Thr
                    $newdate = date("$year-$month-$day5");

                    echo '<div class="ECT_bar ECT_notoday" name="';
                    echo $newdate.'">';

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] != '00:00:00'){ 
                                echo '<div class="container_ECT">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '<span class="start_time">'.$row["start_time"].'</span>';
                                    echo' - ';
                                    echo '<span class="end_time">'.$row["end_time"].'</span> <br>';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';
                            }
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }
                else if($i==6){ //Fri
                    $newdate = date("$year-$month-$day6");

                    echo '<div class="ECT_bar ECT_notoday" name="';
                    echo $newdate.'">';

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] != '00:00:00'){
                                echo '<div class="container_ECT">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '<span class="start_time">'.$row["start_time"].'</span>';
                                    echo' - ';
                                    echo '<span class="end_time">'.$row["end_time"].'</span> <br>';
                                    echo '</span>';
                                    echo $row["detail"].'<br>' ;
                                echo '</div>';
                            }
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }
                else if($i==7){ //Sat
                    $newdate = date("$year-$month-$day7");

                    echo '<div class="ECT_bar ECT_notoday" name="';
                    echo $newdate.'">';

                    $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                    $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                    $result = $conn->query($qry2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if( $row["end_time"] != '00:00:00'){
                                echo '<div class="container_ECT">' ;
                                    echo $row["title"].'<br>' ;
                                    echo '<span style="font-size: 14.2px;">';
                                    echo '<span class="start_time">'.$row["start_time"].'</span>';
                                    echo' - ';
                                    echo '<span class="end_time">'.$row["end_time"].'</span> <br>';
                                    echo '</span>';
                                    echo '<span class="end_time">'.$row["detail"].'<br>' ;
                                echo '</div>';
                            }
                        }
                    } else {
                        // echo "0 results"; <  >
                    }    
                    $conn->close();
                }
                echo '</div>';
            }
            /*
            <div class="ECT_bar">   
                <div class="container_ECT">
                    TITLE 
                    <br>
                    00:00 - 00:00
                </div>  
                <div class="container_ECT">
                    TITLE 
                    <br>
                    00:00 - 00:00
                </div>   
            </div>  

            <div class="ECT_bar ECT_notoday">   </div> 
            <div class="ECT_bar ECT_today">   </div>
            */
        ?>
        <!--========[ show date ]=========-->
        <?php
            for($i=1; $i<=7; $i++){
                echo '<div class="show_bottomDate">';
                if($i==1)
                {   
                    if($today == $day1 && $todaymonth == $month1 && $todayyear == $year1){
                        echo '<div class="W_today">'.$day1.'</div>';  
                        echo $monthname1.', '.$year1;
                    }else{
                        echo  $day1.'<br>'.$monthname1.', '.$year1;    
                    }     
                }
                else if($i==2){
                    if($today == $day2 && $todaymonth == $month2 && $todayyear == $year2){
                        echo '<div class="W_today">'.$day2.'</div>'; 
                        echo $monthname2.', '.$year2;
                    }else{
                        echo  $day2.'<br>'.$monthname2.', '.$year2 ;  
                    }
                }
                else if($i==3){
                    if($today == $day3 && $todaymonth == $month3 && $todayyear == $year3){
                        echo '<div class="W_today">'.$day3.'</div>'; 
                        echo $monthname3.', '.$year3;
                    }else{
                        echo  $day3.'<br>'.$monthname3.', '.$year3 ;  
                    }
                }   
                else if($i==4){
                    if($today == $day4 && $todaymonth == $month4 && $todayyear == $year4){
                        echo '<div class="W_today">'.$day4.'</div>'; 
                        echo $monthname4.', '.$year4;
                    }else{
                        echo  $day4.'<br>'.$monthname4.', '.$year4 ;  
                    }
                }
                else if($i==5){
                    if($today == $day5 && $todaymonth == $month5 && $todayyear == $year5){
                        echo '<div class="W_today">'.$day5.'</div>'; 
                        echo $monthname5.', '.$year5;
                    }else{
                        echo  $day5.'<br>'.$monthname5.', '.$year5 ;  
                    }
                }
                else if($i==6){
                    if($today == $day6 && $todaymonth == $month6 && $todayyear == $year6){
                        echo '<div class="W_today">'.$day6.'</div>'; 
                        echo $monthname6.', '.$year6;
                    }else{
                        echo  $day6.'<br>'.$monthname6.', '.$year6 ;  
                    }
                }
                else if($i==7){
                    if($today == $day7 && $todaymonth == $month7 && $todayyear == $year7){
                        echo '<div class="W_today">'.$day7.'</div>'; 
                        echo $monthname7.', '.$year7;
                    }else{
                        echo  $day7.'<br>'.$monthname7.', '.$year7 ;  
                    }
                }
                echo '</div>';
            }
            /*
             <div class="show_bottomDate"> 02 sep </div>
            */
        ?>

        </div>
        <!--|||||||||||||||||||||||||||||||-->
        
    </div>
    <!--=======================[ TAB ]=======================-->
    <a href='Calendar.php'> <div id="Wview_tab" class="view2"> MONTH VIEW </div> </a>
    <div id="Wallday_tab" class="allday_tab" > ALL DAY </div>
    