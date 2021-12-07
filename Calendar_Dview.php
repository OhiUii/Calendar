    <!--========================================================================================-->
    <!--===================[ Day view ]=========================================================-->
    <div id="day_view" class="container_date">
        <!--========[ DM head ]=========-->
        <!-- D-bar -->
        <div class="d_bar">
            <div class="show_day">
                <?php echo $today; ?>
                
            </div>
        </div>
        <!-- DM-bar -->
        <div class="dm_bar">
            <div class="con_show_dayNmonth"  style="left: 0; margin-left: 5px;  color: white;">
                <div class="show_dayNmonth">
                    <?php echo $today; ?>
                </div>
            </div>
            <div class="con_show_dayNmonth"  style="right: 0; margin-right: 5px; color: rgb(36, 20, 88); background-color: white;">
                <div class="show_monthNmonth">
                    <?php echo $month; ?>
                </div>
            </div>
        </div>    
        <!--========[ Appoint ]=========-->    
        <div class="a_bar">

        </div>
    </div>  

<script>
    $(document).ready(function(){
        $(".day").click(function () {
            var selected_date = $(this).attr("name")

            $.ajax({
                url: "Dview_database.php",
                type: "post",
                dataType: "json",
                data: {
                    start_day: selected_date
                },
                success: function (data) {

                    if (data == 0)
                    {
                        var date = new Date(selected_date)
                        console.log(date)
                        var dayfield = document.querySelector(".a_bar")
                        dayfield.innerHTML = ""

                        $(".d_bar .show_day, .dm_bar .show_dayNmonth").text(date.getDate())
                        $(".dm_bar .show_monthNmonth").text(date.getMonth() + 1)
                    }
                    else
                    {
                        var date = new Date(selected_date)
                        console.log(date)
                        var dayfield = document.querySelector(".a_bar")
                        dayfield.innerHTML = ""

                        $(".d_bar .show_day, .dm_bar .show_dayNmonth").text(date.getDate())
                        $(".dm_bar .show_monthNmonth").text(date.getMonth() + 1)
                        data.forEach(function (entry) {
                            dayfield.innerHTML += Devents(entry.title, entry.detail, entry.start_time, entry.end_time, entry.start_day, entry.AppID)
                        })
                    }
                    
                    $(".edit_btn").click(function () {
                        $("#form-post #fillDate").attr('value', $(this).parent().attr('name'))
                        $("#form-post #timeSt").attr('value', $(this).prev().find(".st_time").text())
                        $("#form-post #timeEn").attr('value', $(this).prev().find(".en_time").text())
                        $("#form-post #fillTitle").attr('value', $(this).next().text())
                        $("#form-post #fillDetail").attr('value', $(this).next().next().text())
                        
                        $(".modal_box #edit_appo").show();
                        $(".modal_box #mark_appo").hide();

                        $( ".modal_overlay" ).fadeIn( "slow", function() {
                            // Animation complete.
                        });

                        $( ".modal_box" ).slideDown( "1000", function() {
                            // Animation complete.
                        });

                        
                        var eventID = $(this).parent().attr('id')

                        $("#edit_event").click(function (e) {
                            e.preventDefault();

                            var info = $("#form-post").serializeArray()

                            var info2 = {
                                ID: eventID,
                                start_day: info[0].value,
                                start_time: info[1].value,
                                end_time: info[2].value,
                                title: info[3].value,
                                detail: info[4].value
                            }

                            $.ajax({
                                url: "edit-event-db.php",
                                type: "post",
                                data: info2,
                                success: function (data) {
                                    // console.log(data)
                                    $("#form-post")[0].reset()
                                    $( ".modal_overlay" ).fadeOut( "0.1", function() {
                                            // Animation complete.
                                    });
                                    $( ".modal_box" ).fadeOut( "0.1", function() {
                                            // Animation complete. 
                                    });
                                }
                            })
                        })

                        $("#delete_event").click(function (e) {
                            e.preventDefault()

                            $.ajax({
                                url: "delete-event-db.php",
                                type: "post",
                                data: {
                                    ID: eventID
                                },
                                success: function () {
                                    $("#form-post")[0].reset()
                                    $( ".modal_overlay" ).fadeOut( "0.1", function() {
                                            // Animation complete.
                                    });
                                    $( ".modal_box" ).fadeOut( "0.1", function() {
                                            // Animation complete. 
                                    });
                                } 
                            })
                        })
                    })
                    
                }
            })
        })
    
    });
    
    // ${start_time + " - " + end_time}
    function Devents(title, detail, start_time, end_time, start_day, id)
    {
        return `<div class="con_appoint" name="${start_day}" id="${id}"> 
                    <div class="d_time">
                        <span class="st_time">${start_time}</span>
                        <span> - </span>
                        <span class="en_time">${end_time}</span>
                    </div>
                    <!--edit btn-->
                    <div class="edit_btn">
                        <img src="css/Pic/edit.png" style="height: 15px;">  
                    </div>

                    <div class="d_title">${title}</div>     
                    <div class="d_detail">${detail}</div>
                </div>`
    }
</script>

