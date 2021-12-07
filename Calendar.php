<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OhiUii_Calendar</title>
    <!--Ajax jQ JS-->
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--import css-->
    <link rel="stylesheet" href="css/Calendar_css1_Mview.css">
    <link rel="stylesheet" href="css/Calendar_css2_Dview.css">
    <link rel="stylesheet" href="css/Calendar_css003_Wview.css">
    <link rel="stylesheet" href="css/Modal_CSS.css">
    <link rel="stylesheet" href="css/xbtn.css">
    <link rel="stylesheet" href="css/alldaySlider.css">
</head>
    <?php include 'call_database.php';?>
<body> 
    <!--import view.js-->
    <?php include 'Modal.php';?>
    <?php include 'Calendar_Mview.php';?>
    <?php include 'Calendar_Dview.php';?>

    <!--=====================[ JS : drag ]=====================-->
    <script>
        
        $(document).ready(function() {
            var user_id = "<?php echo $userid; ?>"; 
            //alert("js is working");
            $(".m_appo").draggable({
                helper: "clone",
                zIndex: 100
            }).draggable().css("cursor","pointer");; 
            
            $(".day").droppable({
                drop: function(ev, tit) { 
                var date = "<?php echo $year; ?>" + "-" + "<?php echo $month; ?>" + "-" +  $(this).text();
                // console.log($(this).text())
                // console.log($(tit.draggable).text())
                // console.log(date)
                // console.log(user_id)
                    if($.isNumeric($(this).text())){
                            $(this).append(tit.draggable)
                            $.post("update_dropdata.php", {
                                id : user_id, 
                                title : $(tit.draggable).text(), 
                                date : date
                                }, function(data){
                                    console.log(data)
                            });

                    }else{
                            $(this).append(tit.draggable)
                            $.post("update_dropdata.php", {
                                id : user_id, 
                                title : $(tit.draggable).text(), 
                                date : date
                                }, function(data){
                                    console.log(data)
                            });
                    }    
                }
            });

           

        });
    </script>

</body>
</html>