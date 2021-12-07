    <!--========================================================================================-->
    <!--=============[ Calendar : month view ]==================================================-->
    
    <div id="month_view" class="container_calendar1">
        <!--========[ Month head ]=========-->
        <div class="container_month">
           <?php echo '<div class="month">'.$monthname.'</div>'; ?>
        </div>
        <div class="container_year">
            <?php echo '<div class="year">'.$year.'</div>'; ?>
        </div>

        <!-- arrow -->
        <a href="?date=<?php echo $prev_month; ?>">
        <div class="arrow" style="position: absolute; top: 37px; left: 24px;">
            <img src="UI_design/Pic/arrowL_b.png" style="width: 20px;">
        </div>
        </a>

        <a href="?date=<?php echo $next_month; ?>">
        <div class="arrow" style="position: absolute; top: 37px; right: 24px;">
            <img src="UI_design/Pic/arrowR_b.png" style="width: 20px;">    
        </div> 
        </a>

        <!--========[ Day head ]==========-->
        <div class="container_blue">
            <div class="day_head" style="cursor: pointer;">S</div>
            <div class="day_head"> M </div>
            <div class="day_head"> T </div>
            <div class="day_head"> W </div>
            <div class="day_head"> T </div>
            <div class="day_head"> F </div>
            <div class="day_head"> S </div>
        </div>

        <!--========[ Day thingy ]=========-->
        <div class="container_white">
            <?php //open blankday---------------------
                for($i=1; $i<=$firstday; $i++) {
                    echo '<div class="blankday">  </div>';
                }
            ?>
            <?php //day : today, otherday---------------------
                for($i=1; $i<=$days; $i++) { 
                    $newdate = date("$year-$month-$i");
                    echo '<div class="day' ;
                    //if today
                    if ($today == $i && $todaymonth == $month && $todayyear == $year) {
                        echo ' today';  
                    }
                    //not today 
                        echo '" name="'.$newdate.'">'.$i. "<br>";
                        //if have appointment                      
                        $conn = new mysqli('127.0.0.1:3306','root','','calendar');
                        $qry2="SELECT * FROM appointment WHERE start_day ='$newdate' AND UID='$userid' ";
                        $result = $conn->query($qry2);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                    echo '<div class="m_appo">';
                                    echo $row["title"] ;
                                    echo '</div>';
                            }
                        } else {
                           // echo $newdate;
                        } 
                        $conn->close();

                    
                    echo '</div>' ;
                }
            ?>
            <?php //end blankday---------------------
                $daysleft = 7 - (($days + $firstday)%7); 
                if($daysleft < 7) 
                { 
                    for($i=1; $i<=$daysleft; $i++) {
                        echo '<div class="blankday">  </div>';
                    }
                } 
            ?>
            
        </div>        
    </div>
    <!--=====================[ decorate ]=====================-->
    <div id="w_decorate" class="white" style="top: -790px;"></div>
    <div id="w_decorate" class="white" style="bottom: 32px;"></div>
    <!--=======================[ VIEW ]=======================-->
    <a href='Calendar_pg2.php'><div id="month_view" class="view" > WEEK VIEW </div> </a>

    <!--=====================[ JS : dragable ]=====================-->
 
   