<?php
session_start();
error_reporting(0);
$error=$_REQUEST['error'];
include("dbconnection.php");
if(isset($_SESSION['customerid']))
{
	header("Location: accountalerts.php"); exit(0);
}
if(isset($_SESSION['adminid']))
{
    header("Location: admindashboard.php");
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Bank of RDEC</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />
<link href="images/favicon.ico" rel="shortcut icon">
</head>
<body>
    <img id="contain" src="images/5.jpg">
    <div><img src="images/login.jpg" id="batimg1"><img src="images/logo.png" id="batimg2"></div>
    <div id="bodycontent">

<div id="templatemo_wrapper">

    <div class="mainbox">
        <img src="images/login.jpg" width="200" height="100" style="float:left; margin:2em 2em;">
        <div id="site_title">
        
            <h1 style="margin-top: 30px;"><a href="index.php" style="color:blue; text-decoration: none; margin-left: 1em;"><span>The Bank of RDEC</span></a></h1>
            <p style="float:right; margin-right: 2.2em; color: buttonface; font-family: Satisfy,cursive; font-size: 2.5em;"></p>
            
        </div> <!-- end of site_title -->
    </div> <!-- end of header -->
<div id="toptabmenu">
    <ul id="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="branches.php">Branches</a></li>
        <li><a href="help.php">Help & FAQ</a></li>
        <li><a href="">Downloads</a>
            <ul>
                <li><a href="downloads/New_Account.pdf">New Account form</a></li>
                 <li><a href="">Loan Forms</a>
                 <ul>
                <li><a href="downloads/home_loan_application_form.pdf">Home Loan</a></li>
                 <li><a href="downloads/Car_Loan_Application_Form.pdf">Car Loan</a></li>
                  <li><a href="downloads/Education_Loan_Application_Form.pdf">Educational Loan</a></li>
            </ul>
                 </li>
                  <li><a href="downloads/ChequeBook_Request.pdf">Cheque book request</a></li>
            </ul>
        </li>
        <li><a href="contactus.php">Contact Us</a></li>
    </ul>
    
</div>
</div>
        <?php
         if($error==1)
            { ?> <div class="mainbox" style="width:550px;"><h1 style="font-size: 30px;">Data Missing or Invalid</h1><br/>
                  <ul style="color:blue; font-family:'The Girl Next Door',cursive; font-size: 20px; line-height: 20px; padding-left: 3em;">
                      <?php if($_REQUEST['fnameset']==1)
                            {
                                echo"<li>First Name cannot start with space or left blank</li>";
                            }
                            if($_REQUEST['lnameset']==1)
                            {
                                echo"<li>Last Name cannot start with space or left blank</li>";
                            }
                            if($_REQUEST['emailset']==1)
                            {
                                echo"<li>IFSC CODE should be valid, It needs to be verified</li>";
                            }
                            if($_REQUEST['pwdset']==1)
                            {
                                echo"<li>Password cannot be left blank or contain special character</li>";
                            }
                            if($_REQUEST['unameset']==1)
                            {
                                echo"<li>Login ID cannot contain blank or special character</li>";
                            } ?>
                       </ul></div> <?php }
        if($error==2)
                echo"<div class=\"mainbox\" style=\"width:450px;\"><h1 style=\"font-size: 30px;\">Password Mismatch</h1></div>";
        if($error==3)
                echo"<div class=\"mainbox\" style=\"width:450px;\"><h1 style=\"font-size: 30px;\">Login Id / Account No. Already Exist</h1></div>";
       if($error==4)
                echo"<div class=\"mainbox\" style=\"width:450px;\"><h1 style=\"font-size: 30px;\">Cannot verify this Email-Id</h1></div>";
        ?>
        
        <?php if($_REQUEST['success']==1) { ?> <div class="logmainbox" style="width: 480px;"><h1>Registered Successfully</h1></div> <?php } ?>
                    
        
    <div class="logmainbox" style="width: 480px;">
        <form action="ccRegDB.php" method="POST" enctype="multipart/form-data">
            <h1>Check Deposit Form</h1>
            <div class="inset">
                <table>
                    <tr>
                        <td><label for="Payeename" class="Ltext">Payee Name</label></td>
                        <td>
                            <input type="text" name="payeename" id="payeename" class="loginput"<?php if (($_REQUEST["payeenameset"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Payeename"]."\""; ?> >
                                       
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Recivername" class="Ltext">Reciver Name</label></td>
                        <td><input type="text" name="Recivername" id="Recivername" class="loginput"<?php if (($_REQUEST["Recivernameset"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Recivername"]."\""; ?> >
                        </td>
                    </tr><td><label for="bname" class="Ltext">Bank Name</label></td>
                        <td><input type="text" name="bname" id="bname" class="loginput"<?php if (($_REQUEST["bnameset1"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["bname"]."\""; ?> >
                        </td>

                        
                        
                    </tr>
                    <tr>
                        <td><label class="Ltext">Location</label></td>
                        <td>
                            <select name="Day" class="ddlist">
                                <?php $day = array("India","USA","England");
                                for ($i=0;$i<3;$i++)
                                {   echo"<option"; if($_REQUEST['day']==$i) {echo" selected=\"selected\"";} echo">".$day[$i]."</option>"; } ?>
                            </select>
                            <select name="Month" class="ddlist">
                                <?php  $month = array("UTTAR PRADESH","WEST BENGAL","NEW DELHI","HARIYANA","UTTRAKHAND","BIHAR","RAJISTHAN");
                                        for($i=0;$i<7;$i++)
                                        {echo"<option value=\"".$month[$i]."\""; if ($_REQUEST['month']==$i) {echo" selected=\"selected\"";} echo">".$month[$i]."</option>";} ?>
                            </select>
                            <select name="Year" class="ddlist">
                                <?php $year = array("GHAZIABAD","KOLKATA","MUZFFARNAGAR","MERRUT","NOIDA","GURUGRAM");
                                for($i=0;$i<6;$i++)
                                {echo"<option value=\"".$year[$i]."\""; if($_REQUEST['year']==$i) {echo" selected=\"selected\"";} echo">".$year[$i]."</option>"; } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                   <td><label for="IFSE" class="Ltext">IFSE Code</label></td>
                        <td><input type="text" name="IFSE" id="IFSE" class="loginput"<?php if (($_REQUEST["IFSEset1"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["IFSE"]."\""; ?> >
                        </td>

                    </tr>
                    <tr>
                   <td><label for="Date" class="Ltext">Date On Check</label></td>
                        <td><input type="Date" name="Date" id="Date" class="loginput"<?php if (($_REQUEST["Dateset1"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["date(dd-mm-yyyy)"]."\""; ?> >
                        </td>

                    </tr>
                   
                    <tr>
                        <td><label for="Mnum" class="Ltext">Account Number of payee</label></td>
                        <td><input type="text" name="Mnum" id="Mnum" class="loginput"<?php if (($_REQUEST["mnumset"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Mnum"]."\""; ?> ></td>
                    </tr>
                    <tr>
                        <td><label for="Mnum1" class="Ltext">Account Number of Reciver</label></td>
                        <td><input type="text" name="Mnum1" id="Mnum1" class="loginput"<?php if (($_REQUEST["mnumset1"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Mnum1"]."\""; ?> ></td>
                    </tr>
                    <tr>
                        <td><label for="accstatus" class="Ltext">Account Status</label></td>
                        <td><select name="accstatus" id="accstatus" class="ddlist">
                        <option value="active">Active</option>
                        <option value="inactive">In-active</option>
                        <option value="On-hold">On-hold</option>
                </select></td>
                    </tr>
                    <tr>
                        <td><label for="acctype" class="LText">Account Type</label></td>
                        <td><select name="acctype" id="acctype" class="ddlist">
                        <?php $re = mysql_query("SELECT * FROM accountmaster");
                           while ($a=  mysql_fetch_array($re))
                           {
                                echo "<option value='$a[accounttype]'>$a[accounttype]</option>";
                           }?>
                    
                </select></td>
                    </tr>
                    <tr>
                        <td><label for="checkno" class="Ltext">Check Number</label></td>
                        <td><input type="text" name="checkno" id="checkno" class="loginput"<?php if (($_REQUEST["mnumset1"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Mnum1"]."\""; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td><label for="checkno1" class="Ltext">Re-enter Check Number</label></td>
                        <td><input type="text" name="checkno1" id="checkno1" class="loginput"<?php if (($_REQUEST["mnumset1"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Mnum1"]."\""; ?> ></td>
                    </tr>
                    <tr>
                        <td><label for="imagecheck" class="Ltext">Upload Check</label></td>
                        <td><input type="file" name="checkimg" id="checkimg" class="loginput"<?php if ((($_REQUEST["pwdset"]==1))||($error==2)) echo " style=\"border:thin 
                        solid red; box-shadow:1px 1px 4px 2px #F00;\""; ?> >
                        
                        </td>
                    </tr>
                    <tr>
                    <td><label for="Mobile" class="Ltext">Mobile no</label></td>
                        <td><input type="Number" name="Mobile" id="Mobile" class="loginput"<?php if (($_REQUEST["Mobileeset"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Mobile"]."\""; ?> ></td>
                    </tr>
                </table>
            </div>
                    <input type="submit" value="submit" style="margin-bottom:25px;margin-right: 25px;" class="loginput">
        </form>
    </div>
    </div>
<?php include'footer.php' ?>
</body>
</html>
