<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Register</title>
    <!--import -->
    <link rel="stylesheet" href="css/Register_css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
    <!-- UI : Tell that there're error -->
    <div class="Err_con" id="Err_con" style="display: none;">
        <div class="Err">
        <p id="mailEr">     </p>
        <p id="idEr">       </p>
        <p id="pwEr">       </p>
        <p id="cpwEr">      </p>
        </div>
    </div>

    <!-- ================= UI ================= -->
    <div class="container">
    <form name="regis" method="post" action=""> 	
        <!-- MUST "@def.ghi" -->
        <input type="text" id="mail" placeholder="Email" name="email"   onblur="validate()"> 
            <br><br> 
        <!-- OK >= 5 char, OK "num|_|-" -->
        <input type="text" id="ID"  placeholder="Username"  name="usrname" onblur="validate()"> 
            <br><br>
        <!-- OK >= 8 char, MUST "A a num symbols" -->
        <input type="password" id="PW"  placeholder="Password" name="pword" onblur="validate()"> 
            <br><br> 
        <!-- Confirmed ass -->
        <input type="password" id="CPW"  placeholder="Confirmed Password" onblur="validate()"> 
            <br><br>           
        <input type="submit" value="REGISTER" id="go_btn" name="signup-btn" disabled>
            <br>
    </form>
    <?php
        if(isset($_POST['signup-btn']))
        {
            include "add-user-db.php";
        }
    ?>
    </div>
    <!-- ======================================= -->

    <script >
        function $(id) { return document.getElementById(id); }  
        function validate(){
        //[ Fill condition : error ] 
          //declare for using detect error 
            var mail    =$("mail").value;
            var id      =$("ID").value;
            var pw      =$("PW").value;
            var cpw     =$("CPW").value;
            var checkerror = 0 ; // (0 = no error | 1 = error detected) if no error button will click-able 
           
          //MAIL : MUST "@"
            if(mail==""){
                $("mailEr").innerHTML = "Email require. <br>";
                checkerror = 1;
            }
            else if(mail.includes('@') != true){
                $("mailEr").innerHTML = "Invalid mail. <br>";
                checkerror = 1;
            }
            else{
                $("mailEr").innerHTML = null;
            }
           
          //ID : OK >= 5 char, OK "num|_|-"
            if(id==""){
                $("idEr").innerHTML = "Username require. <br>";
                checkerror = 1;
            }
            else if(id.length<5){
                $("idEr").innerHTML = "Username must be at least 5 characters. <br>";
                checkerror = 1;
            }
            else if(id.indexOf(' ') >= 0){
                $("idEr").innerHTML = "Username can't have space. <br>";
                checkerror = 1;
            }
            else{
                $("idEr").innerHTML = null;
            }
          
          //PW : OK >= 8 char, MUST "A a num symbols"
            var havespecial = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;  
            var havenum = /\d+/;
            var haveupper = /[A-Z]/;
            var havelower = /[a-z]/; 
            if(pw==""){
                $("pwEr").innerHTML = "Password require. <br>";
                checkerror = 1;
            }
            else if(pw.length<8){
                $("pwEr").innerHTML = "Password must be at least 8 characters. <br>";
                checkerror = 1;
            }
            else if( ((haveupper.test(pw)) == false ) || ((havelower.test(pw)) == false)  
                  || ((havenum .test(pw)) == false )  || ((havespecial.test(pw)) == false) ){
                $("pwEr").innerHTML = "Password must comtaint upper and lower case letters, numbers and symbols. <br>";
                checkerror = 1;
            }
            else{
                $("pwEr").innerHTML = null; 
            }

          //CPW : MUST same PW"
            if(cpw!=pw){
                $("cpwEr").innerHTML = "Password not matched. <br>";
                checkerror = 1;
            }
            else{
                $("cpwEr").innerHTML = null;       
            }

            if(checkerror == 1){
                document.getElementById("go_btn").disabled = true;
                document.getElementById("Err_con").style.display = "block";
            }else{
                document.getElementById("go_btn").disabled = false;
                document.getElementById("Err_con").style.display = "none";
            }
        } 
        
    </script> 
    
</body>
</html>

