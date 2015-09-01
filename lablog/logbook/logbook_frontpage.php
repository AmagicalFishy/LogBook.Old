<?php include "../common/info.inc"; ?>

<html>
<head>
<title>Daily Logbook</title>
<link rel="stylesheet" href="../common/style.css">
<link rel="icon" href="/pocarlab/favicon.ico">

<?php
include "../common/navigation.html";

// If the month is set in the URL, set the month index to w/e month it is
if (ISSET($_GET["month"])){
    $month_index = $_GET["month"];
}
else{
    $month_index = 0;
}

// Formats the month correctly
$month = strtotime(date("M-01-Y") . "+".$month_index." month");
?>

</head>
<body>
<br>
<br>
<center>
<font size=6>
<a href=<?php $month_index = $month_index - 1; echo "?month=".$month_index; ?>><img src="arrow_left.gif" ></a> 
<div class="title">Logbook Calendar for <?php echo date("F Y",$month); ?> </div>
<a href=<?php $month_index = $month_index + 2; echo "?month=".$month_index; ?>><img src="arrow_right.gif"></a>
</font>
<?php
// Back to Current Month Link
if ($month_index != 1){
    echo "<br><a href='logbook_frontpage.php?month=0'>Back to Current Month</a>";
    }
?>
<br>
<br>
<br>
<div id="calendar_days">
<table id="tabtab">
<tr>
<td>Sunday
<td>Monday
<td>Tuesday
<td>Wednesday
<td>Thursday
<td>Friday
<td>Saturday
</table>
</div>

<?php
#Preparing the queries to fill the calendar
$connection = new PDO($dbinfo, $username, $password); 
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Array of Titles that go into the little calendar day blocks
$titles = array(
    "Borexino: ",
    "Darkside: ",
    "Exo/nExo Anlsys: ",
    "LXe Sys: ",
    "Photosensor Test: ",
    "Misc: "
);

// The database names of the corresponding logbooks in the array
$chapters = array(
    "posts_borexino",
    "posts_darkside",
    "posts_analysis",
    "posts_lxe",
    "posts_photosensor",
    "posts_misc",
);

// Prepare the queries to get stuff from each logbook. This can probably just go into
// a loop, but there was some issue with PDO and looping.
$queries = array(
$connection->prepare("SELECT * FROM $chapters[0] WHERE time >= :cal_date1 and time <= :cal_date2"),
$connection->prepare("SELECT * FROM $chapters[1] WHERE time >= :cal_date1 and time <= :cal_date2"),
$connection->prepare("SELECT * FROM $chapters[2] WHERE time >= :cal_date1 and time <= :cal_date2"),
$connection->prepare("SELECT * FROM $chapters[3] WHERE time >= :cal_date1 and time <= :cal_date2"),
$connection->prepare("SELECT * FROM $chapters[4] WHERE time >= :cal_date1 and time <= :cal_date2"),
$connection->prepare("SELECT * FROM $chapters[5] WHERE time >= :cal_date1 and time <= :cal_date2")

)
?>

<div id="calendar">
<table id="chronosquare">

<?php

// Creates the little calendar days
$days_in_month = date("t", $month);
$first_day = date("w", strtotime(date("F-01-Y", $month)));

for ($i = 1; $i <= $first_day; ++$i){
        echo    "<td style='border:0'>";
}

for ($i = $first_day; $i <= $days_in_month + $first_day - 1; ++$i){
    $cur_day = $i - $first_day + 1;
    if ($i % 7 == 0){
        echo    "<tr>";
    }
    echo    "<td><b>" . $cur_day . "</b><br><br>";
    echo    "<div id = 'cal_data'>";
    $cal_date1 = date("Y-m-" . $cur_day, $month) . " 00:00:00";
    $cal_date2 = date("Y-m-" . $cur_day, $month) . " 23:59:59";

    for ($j = 0; $j <= 5; ++$j){
        $queries[$j]->bindParam(":cal_date1", $cal_date1);
        $queries[$j]->bindParam(":cal_date2", $cal_date2);
        $queries[$j]->execute();
        $numposts = 0;
        while ($count = $queries[$j]->fetch(PDO::FETCH_ASSOC)){
            ++$numposts;
        }
        echo    "<form id='dayform_" .$cur_day."-".$j. "' name='dayform_" .$cur_day."-".$j."' method='GET' action='daily_log/viewposts.php?log=".$chapters[$j]."'>";
        echo    "<input type='hidden' name='begdate' value='" . $cal_date1 . "'>";
        echo    "<input type='hidden' name='log' value='".$chapters[$j]."'>";
        echo    "<input type='hidden' name='endate' value='" . $cal_date2 . "'>";
        echo    "<input type='hidden' name='filters' value='Calendar'>";
        echo    $titles[$j] . "<button type='submit'>".$numposts."</button>"; 
        echo    "</form>";
    }
    echo    "</div>";
}
?>

</table>
</div>
<br><br>
<font size="6">
<a href=<?php $month_index = $month_index - 1; echo "?month=".$month_index; ?>><img src="arrow_left.gif" ></a> 
<div class="title">Logbook Calendar for <?php echo date("F Y",$month); ?> </div>
<a href=<?php $month_index = $_GET["month"] + 1; echo "?month=".$month_index; ?>><img src="arrow_right.gif"></a><br>
</font>
</center>
<br>
<br>
<?php
include "search_filters.php";
?>
</body>
</html>
