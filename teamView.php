<?php
// require("init.php");
require("teamModel.php");
//checkLogin();
$result=getTeamList();
?>

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Team</title>
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<h3>Beer-game
    <a href='edit.php'><button class="btn waves-effect waves-light red lighten-2 right" type="submit" name="action">修改玩家資料
        <i class="material-icons right">create</i>
    </button></a>
    <a href='recordview.php'><button class="btn waves-effect waves-light red lighten-2 right" type="submit" name="action">查看歷史記錄
        <i class="material-icons right">create</i>
    </button></a>
</h3>
<table class='striped' >
        <tr><td>Team name</td>
        <td>Factory</td>
        <td>Distributor</td>
        <td>Wholesaler</td>
        <td>Retailer</td>
        <td></td></tr>
<?php


while ($rs = mysqli_fetch_assoc($result)) {

    $p1 = getRole1Img($rs['tid']);
    $p2 = getRole2Img($rs['tid']);
    $p3 = getRole3Img($rs['tid']);
    $p4 = getRole4Img($rs['tid']);
    header("Refresh:2");
    if($rs['full']==0) {
        echo "<tr><td>" , $rs['tname'];
        if($rs['f'] != null)
            echo "</td><td>" , "<img class='circle responsive-img' width='100' height='100' src='data:;base64," . $p1 . "'></td>";
        else
            echo "<td>", "<img class='circle responsive-img' width='100' height='100' src='https://image.flaticon.com/icons/svg/128/128469.svg'></td>";
        if($rs['d'] != null)
            echo "<td>" , "<img class='circle responsive-img' width='100' height='100' src='data:;base64," . $p2 . "'></td>";
        else
            echo "<td>", "<img class='circle responsive-img' width='100' height='100' src='https://image.flaticon.com/icons/svg/128/128469.svg'></td>";
        if($rs['w'] != null)
            echo "</td><td>" , "<img class='circle responsive-img' width='100' height='100' src='data:;base64," . $p3 . "'></td>";
        else
            echo "<td>", "<img class='circle responsive-img' width='100' height='100' src='https://image.flaticon.com/icons/svg/128/128469.svg'></td>";
        if($rs['r'] != null)
            echo "<td>" , "<img class='circle responsive-img' width='100' height='100' src='data:;base64," . $p4 . "'></td>";
        else
            echo "<td>", "<img class='circle responsive-img' width='100' height='100' src='https://image.flaticon.com/icons/svg/128/128469.svg'></td>";

        $teamname = $rs['tname'];
        $tid = $rs['tid'];
        if($rs['tid']!= null)
            echo "<td><a href='add2team.php?teamname=$teamname&tid=$tid' class='btn-floating btn-large waves-effect waves-light teal lighten-2'><i class='material-icons'>add</i></a></td></tr>";
    }
}
//echo '<td><a href="03.delete.php?id=', $rs['id'], '">刪</a> </td></tr>';
// $id=$rs['prdID'];
// echo "<td><a href='add2Cart.php?id=$id'>加</a>";
// echo " - <a href='04.editform.php?id=$id'>改</a> </td></tr>";
?>
</table>
<a href='newteam.php'><button class="btn waves-effect waves-light red lighten-2 right" type="submit" name="action">NEW
    <i class="material-icons right">add</i>
</button></a>
<!-- <a class="btn-floating btn-large waves-effect waves-light red lighten-2 right"><i class="material-icons">add</i></a> -->
<!-- <a href="showOrder.php">show all orders</a> -->
</body>
</html>
