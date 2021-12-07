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
    <link rel="stylesheet" href="css/Calendar_css3_Wviewv2.css">
    <link rel="stylesheet" href="css/Modal_CSS.css">
    <link rel="stylesheet" href="css/xbtn.css">
    <link rel="stylesheet" href="css/alldaySlider.css">
</head>
    <?php include 'call_database.php';?>
<body>  
    <!--import view.js-->
    <?php include 'Modal.php';?>
    <?php include 'Calendar_Wview.php';?>

    <!--=====================[ JS : drag ]=====================-->
    <script>
        $(document).ready(function() {
            var user_id = "<?php echo $userid; ?>"; 
            $(".container_ECT").draggable({
                helper: 'clone',
                zIndex: 5 
            }); 
            
            $(".container_ALL").draggable({
                helper: 'clone',
                zIndex: 5 
            }); 

            $(".ECT_bar").droppable({
                accept: ".container_ECT", 
                drop: function(ev, tit) {
                    var date = $(this).attr("name")
                    var title = $(tit.draggable).contents().get(0).nodeValue
                   
                    console.log(title)
                    $.post("update_dropdata.php", {
                        id : user_id, 
                        title : title, 
                        date : date
                        }, function(data){
                            console.log(data)
                    }); 

                    $(this).append(tit.draggable)
                }
   
            }); 

            $(".ALL_bar").droppable({
                accept: ".container_ECT, .container_ALL",
                drop: function(ev, tit) {
                    var date = $(this).attr("name")
                    var title = $(tit.draggable).contents().get(0).nodeValue
                   
                    $.post("update_dropdata.php", {
                        id : user_id, 
                        title : title, 
                        date : date
                        }, function(data){
                            console.log(data)
                    }); 

                    $(this).append(tit.draggable)
                }
            });
             
        });
    </script>
    
    </body>
</html>