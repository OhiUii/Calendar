
<!--=========================================================================================-->
<!--===================[ Modal ]=========================================================-->
    <div class="modal_open" style="position:fixed; bottom:0;">           <!-- open btn --> 
        <img src="css/Pic/plus2.png" style="height: 50px;">
    </div>
    <div class="modal_box" style="display:none">

        <div class="modal_closebtn" >
            <div class="wrapper">       <!-- close modal (reff) --> 
                <div class="top bar"></div>
                <div class="middle bar"></div>
                <div class="bottom bar"></div>
            </div>
        </div>  
        <!-- FORM -->
        <form action="Calendar.php" method="post" id="form-post">     
            <div class="modal_item" style="margin-left: 10px;"> <!-- date select --> 
                DATE    <input type="date" name="start_day" id="fillDate" style=" width: 205px; margin-left: 10px;" placeholder="date"> 
                        <label class="switch" >                 <!-- allday check -->
                            <input type="checkbox" id="ALLslider">
                            <span class="slider round" ></span>
                        </label> ALLDAY      
            </div>
            <div class="modal_item" id="mark_time" style="margin-left: 10px;"> <!-- starttime select -->
                START   <input type="time" name="start_time" id="timeSt" style=" width: 148px; " placeholder="date" >      
                END     <input type="time" name="end_time"   id="timeEn" style=" width: 148px;"  placeholder="date" >      
            </div>
            <div class="modal_item">                            <!-- title fill -->
                        <input type="text" name="title"     id="fillTitle" style="margin-left: 10px; width: 410px;" placeholder="title">      
            </div>
            <div class="modal_item">                            <!-- detail fill -->
                        <input type="text" name="detail"    id="fillDetail" style="margin-left: 10px; width: 410px;" placeholder="detail">      
            </div>        
            <div class="modal_item" id = "mark_appo">           <!-- submit btn -->
                        <input style="margin-left: 10px;" type="submit" value="MARK APPOINTMENT">
            </div>
            <div class="modal_item" id = "edit_appo">           <!-- edit btn -->
                        <input style="margin-left: 10px;" type="submit" value="EDIT" id="edit_event">
            </div>
            <div class="modal_item" id = "del_appo">           <!-- del btn -->
                        <input style="margin-left: 10px;" type="submit" value="DELETE" id="delete_event">
            </div>
        </form> 

    </div>
    <div class="modal_overlay" style="display:none"> </div>

    <div style="position:fixed; bottom:0; left: 80px;" > 
        <a href="Logout.php" tite="Logout">
        <img src="css/Pic/logout.png" style="height: 50px; ">
        </a>
    </div>
    <!--=====================[ JS : op-clo modal ]=====================-->
    <script>
     $(document).ready(function(){
        $( ".modal_overlay" ).fadeOut( "0.1", function() {
                // Animation complete.
        });
        $( ".modal_box" ).fadeOut( "0.1", function() {
                // Animation complete. 
        });

        //Disable time if check ALLDAY
        $("#ALLslider").click(function(){ 
            if($(this).prop("checked") == true){
                $( "#mark_time" ).slideUp( "slow", function() {
                    // Animation complete. reset time too 00:00
                    $("#mark_time").css("display", "none");
                    $("#timeEn").val('');
                    $("#timeSt").val('');
                });
            }else{
                $( "#mark_time" ).slideDown( "slow", function() {
                    // Animation complete.
                    $("#mark_time").css("display", "block");
                });
            }        
        });
        
        //Mark appointment (close modal)
        $("#mark_appo").click(function(){
            $( ".modal_overlay" ).fadeOut( "slow", function() {
                // Animation complete.
            });
            $( ".modal_box" ).slideToggle( "slow", function() {
                // Animation complete. 
            });
        });

        //Close Modal
        $(".modal_closebtn").click(function(){
            $( ".modal_overlay" ).fadeOut( "slow", function() {
                // Animation complete.
            });
            $( ".modal_box" ).slideToggle( "slow", function() {
                // Animation complete. 
            });
        });

        //Open Modal
        $(".modal_open").click(function(){
            $(".modal_box #edit_appo").hide();
            $(".modal_box #mark_appo").show();

            $( ".modal_overlay" ).fadeIn( "slow", function() {
                // Animation complete.
            });
            $( ".modal_box" ).slideDown( "1000", function() {
                // Animation complete.
            });
        });

    });
    </script>