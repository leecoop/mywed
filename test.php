<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>כניסה למערכת</title>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">



    function login(){

        window.location = "pages/guests.php"



    }


</script>
<body bgcolor="#F8F8F8">

<div id="main">
    <div id="header">
        <div id="logo">
        </div>
    </div>



    <div id="site_content_small" >
        <div class="box_title"><div class="title_text">כניסה</div></div>


        <div style="float:right; padding-right:40px" >

            <table style="padding:10px">
                <tr>

                    <td align="right">
                        <input name="myusername" id="myusername" type="text" />
                    </td>
                    <td> שם משתמש</td>
                </tr>

                <tr>

                    <td align="right">
                        <input name="mypassword" id="mypassword" type="password"/>
                    </td>
                    <td> סיסמא</td>
                </tr>

                <tr>
                    <td><input class="registerBtn"  type='submit' value='כניסה' onclick="login()"/></td>

                </tr>

                <tr>
                    <td>
                        <div id="loader" style="display:none"><img src='style/ajax-loader-blue.gif' /></div>
                        <div id="response" style="display:none"></div>
                    </td>
                </tr>

            </table>
        </div>
    </div>


</div>



<div style="text-align: center; font-size: 0.75em;"></div>
</body>
</html>
