<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<!--<html xmlns="http://www.w3.org/1999/xhtml">-->
<!--<head>-->
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<!--<title>כניסה למערכת</title>-->
<!--	<link href="style/style.css" rel="stylesheet" type="text/css" />-->
<!--</head>-->
<!--<script type="text/javascript">-->
<!---->
<!--	function $(id){-->
<!--		return document.getElementById(id);-->
<!--	}-->
<!--	-->
<!--	function hide(id){-->
<!--		$(id).style.display = 'none';	-->
<!--	}-->
<!--	-->
<!--	function show(id){-->
<!--		$(id).style.display = '';	-->
<!--	}-->
<!--	-->
<!--	function trim(str) {-->
<!--    	return str.replace(/^\s+|\s+$/g,"");-->
<!--	}-->
<!--	-->
<!--	function valid(elem){-->
<!--		if(elem == null || trim(elem.value) == ''){-->
<!--			elem.style.background = "#FFFF99";-->
<!--			return false;-->
<!--		}-->
<!--		else{-->
<!--			elem.style.background = "#FFFFFF";	 -->
<!--			return true;-->
<!--		}-->
<!--	}-->
<!---->
<!--function login(){-->
<!--	-->
<!--		var userName = document.getElementById("myusername");-->
<!--		var password = document.getElementById("mypassword");-->
<!--		if(valid(userName) && valid(password)){-->
<!--			document.getElementById("response").innerHTML="<img src='style/ajax-loader-blue.gif' />";-->
<!--			hide("response");-->
<!--			show("loader");-->
<!--			if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari-->
<!--				xmlhttp=new XMLHttpRequest();-->
<!--			}-->
<!--			else {// code for IE6, IE5-->
<!--				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");-->
<!--			}-->
<!--			xmlhttp.onreadystatechange=function(){-->
<!--				if (xmlhttp.readyState==4 && xmlhttp.status==200){-->
<!--					var response= trim(xmlhttp.responseText);-->
<!--					if(trim(response) != 'true'){-->
<!--							hide("loader");-->
<!--							show("response");-->
<!--							document.getElementById("response").innerHTML="<span class='ajax_respons_msg'>"+response+"</span>";	-->
<!--					}-->
<!--					else{-->
<!--						window.location = "pages/add_new_user.php"-->
<!--					}-->
<!--				}-->
<!--			}-->
<!--			var params="myusername="+userName.value+"&mypassword="+password.value;-->
<!--			xmlhttp.open("POST","checklogin.php?",true);-->
<!--			xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=windows-1255');-->
<!--			xmlhttp.send(params);-->
<!--	    }-->
<!--}-->
<!--	-->
<!--	-->
<!--</script> -->
<!--<body bgcolor="#F8F8F8">-->
<!---->
<!--<div id="main">-->
<!--    <div id="header">-->
<!--      <div id="logo">-->
<!--      </div>-->
<!--    </div>-->
<!---->
<!---->
<!---->
<!--<div id="site_content_small" >-->
<!--<div class="box_title"><div class="title_text">כניסה</div></div>-->
<!---->
<!---->
<!--<div style="float:right; padding-right:40px" >-->
<!--  	-->
<!--   <table style="padding:10px"> -->
<!--        <tr>-->
<!--       -->
<!--        <td align="right">-->
<!--            <input name="myusername" id="myusername" type="text" />-->
<!--        </td>-->
<!--        <td> שם משתמש</td>-->
<!--    </tr>-->
<!--    -->
<!--    <tr>-->
<!--     -->
<!--        <td align="right">-->
<!--            <input name="mypassword" id="mypassword" type="password"/>-->
<!--        </td>-->
<!--        <td> סיסמא</td>-->
<!--    </tr>-->
<!--    -->
<!--    <tr>-->
<!--        <td><input class="registerBtn"  type='submit' value='כניסה' onclick="login()"/></td>-->
<!--       -->
<!--    </tr>-->
<!--    -->
<!--    <tr>-->
<!--    	<td>-->
<!--        <div id="loader" style="display:none"><img src='style/ajax-loader-blue.gif' /></div>-->
<!--        <div id="response" style="display:none"></div>-->
<!--        </td>-->
<!--    </tr>-->
<!-- 	-->
<!--	</table> -->
<!--    </div> -->
<!--</div>-->
<!---->
<!---->
<!--</div>-->
<!---->
<!-- -->
<!---->
<!--<div style="text-align: center; font-size: 0.75em;"></div>-->
<!--</body>-->
<!--</html>-->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">
		window.location = "pages/index.php";
</script>
<body bgcolor="#F8F8F8">


</body>
</html>
