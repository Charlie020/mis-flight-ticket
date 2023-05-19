<html>
    <head>
        <title> 提示！ </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <?php
            $flightnum = ($_POST["dflightnum"] == "" ? "" : $_POST["dflightnum"]);
            $date = ($_POST["ddate"] == "" ? "" : $_POST["ddate"]);
            if ($flightnum == "" || $date == "") {
                echo '<script>alert("输入内容为空！");window.history.back();</script>';
            } else {
                $db = mysqli_connect('localhost','root','','dbexp'); 
                if (!$db) {
                    echo '<script>alert("无法连接至数据库！");window.history.back();</script>';
                } 
                $sql = "SELECT * FROM Flights WHERE FlightNumber = '$flightnum' AND Date = '$date';";
                $res = mysqli_query($db, $sql);
                if ($res->num_rows > 0) {
                    $sql = "DELETE FROM Flights WHERE FlightNumber = '$flightnum' AND Date = '$date';";
                    mysqli_query($db, $sql);
                    echo '<script>alert("删除成功！");window.history.back();</script>';
                } else {
                    echo '<script>alert("所要删除数据不存在！");window.history.back();</script>';
                }
                mysqli_close($db);
            }
        ?>
    </body>
</html>