<?php
//session_start();
//if(!session_is_registered('myusername')){
//	header("Location: ../index.php");
//	exit();
//}
//$admin_degree = $_SESSION['admin_degree'];

function percent($num_amount, $num_total)
{
    $count1 = $num_amount / $num_total;
    $count2 = $count1 * 100;
    $count = number_format($count2, 0);
    echo $count;
}

include_once "../include/connect.php";

//if($_SERVER['REQUEST_METHOD'] =='POST')
//{
//
//	if(isset($_POST["reset_all_users"])){
//
//		$sql="update users set active='0',welfare='0',parking_lottery='0',subscribe_gym_theater='0',education_scholarship='0',get_student_card='0',get_gift='0',send_to_print='0',send_to_print_date=null,filled_i_form='0'";
//		mysql_query($sql);
//
//	}
//
//}

$sql_select_all = "select * from guests";

$result_select_all = mysql_query($sql_select_all);
$total = 0;
$total_received = 0;
$total_approved = 0;

while ($row = mysql_fetch_array($result_select_all)) {
    $amount = $row['amount'];
    $total += $amount;
    if ($row['received'] == 1) {
        $total_received += $amount;
    }
    if ($row['approved'] == 1) {
        $total_approved += $amount;
    }
}
$total_not_received = $total - $total_received;
$total_not_approved = $total - $total_approved;
?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>ניהול מערכת</title>
        <link href="../style/style.css" rel="stylesheet" type="text/css"/>
    </head>


    <script type="text/javascript">


        function showHideElement(id) {
            elem = document.getElementById(id);
            if (elem.style.display == 'none') {
                elem.style.display = '';
            }
            else {
                elem.style.display = 'none';
            }
        }
    </script>

    <body bgcolor="#F8F8F8">

    <div id="main">
        <div id="header">
            <div id="logo">

            </div>
            <div id="menubar">
                <ul id="menu">
                    <li><a href="/Logout.php">יציאה</a></li>
                    <li class="selected"><a href="management.php">ניהול מערכת</a></li>
                    <!--          <li><a href="reports.php">דוחות</a></li>-->
                    <!--          <li><a href="printing.php">בית דפוס</a></li>-->
                    <li><a href="add_new_user.php">חדש</li>
                    <!--          <li ><a href="email.php">שליחת מייל</a></li>-->
                    <!--          <li><a href="search.php">חיפוש</a></li>-->
                    <!--          <li><a href="/login_success.php">ראשי</a></li>-->
                </ul>
            </div>
        </div>


        <div id="site_content_small">
            <div class="box_title">
                <div class="title_text">סטטיסטיקה</div>
            </div>
            <div style="float:right; padding-right:40px;padding-left:130px;padding-top:30px">
                <ul style="text-align:right">
                    <li style="cursor:pointer;cursor:hand"><b>מוזמנים<?php echo $total ?> <img
                                src="../style/ico_statistics.png"></b></li>
                    <li style="cursor:pointer;cursor:hand">[ קיבלו הזמנות : <?php echo $total_received ?>
                        [ <?php percent($total_received, $total) ?>% <img src="../style/ico_statistics.png"></li>
                    <li style="cursor:pointer;cursor:hand">[ אישרו הגעה :<?php echo $total_approved ?>
                        [ <?php percent($total_approved, $total) ?>% <img src="../style/ico_statistics.png"></li>
                </ul>
            </div>
        </div>
    </div>
    </div>


    </body>
    </html>
<?php mysql_close($con); ?>