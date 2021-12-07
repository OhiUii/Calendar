
<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('127.0.0.1:3306','root','','calendar') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM user WHERE ID ='" . $_POST["ID"] . "' and PW = '". $_POST["PW"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            $_SESSION["UID"] = $row['UID'];
        } else {
            $message = "Invalid Username or Password";
        }
    }
    if(isset($_SESSION["UID"])) {
    header("Location:Calendar.php");
    }
?>

<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="css/Login_CSS.css">
    <style>

    </style>
</head>
    <body>
        <!-- =========================[ UI ] ========================= -->
         <!------ decorate ------>
         <img src="UI_design/Pic/scale04.png" style="position: absolute; width:1100px; bottom:0px; margin-left:10% ;">
         <!------- fillin ------->
        <div class="container">
            <div class="container_w"> </div>
            <form name="frmUser" method="post" action="" text-align="center">
                <div class="message"><?php if($message!="") { echo $message; } ?></div>
                <h3 text-align="center">Login</h3>
                <input type="text"      name="ID" id="ID" onblur="validate()"placeholder="Username">  
                <input type="password"  name="PW" id="PW" onblur="validate()"placeholder="Password">
                <input type="submit"    name="submit" value="LOGIN" id="go_btn" >
                
                <a href="Register.php"  style="font-family: Arial; position: relative; bottom: -7px; left: 8px;"> 
                    REGISTSER 
                </a>      

            </form>
        </div>
        <!------ decorate ------>
        <img src="UI_design/Pic/logo_w.png" style="position: absolute; width: 228px; top:28px; margin-left:41% ;"> 
        <img src="UI_design/Pic/scale01_w.png" style="position: absolute; width: 61px; top:150px; margin-left:37% ;">
        <img src="UI_design/Pic/scale02_w.png" style="position: absolute; width: 130px; bottom:95px; margin-left:56.5% ;">
        <img src="UI_design/Pic/scale03.png" style="position: absolute; width: 94px; bottom:20px; margin-left:36% ;">
        <!-- ====================================================== -->

        <!-- MY JS function -->
        <script>
            function $(id) { return document.getElementById(id); }    
            function validate(){
            //[ Fill condition : error ] 
            //declare for using detect error 
                var id =$("ID").value;
                var pw =$("PW").value;
                var checkerror = 0 ; // (0 = no error | 1 = error detected) if no error button will click-able 
            
            //ID
                if(id==""){
                    checkerror = 1;
                }
            //PW 
                if(pw==""){
                    checkerror = 1;
                }
                if(checkerror == 1){
                }else{
                    
                }
            }       
        </script> 

    </body>
</html>