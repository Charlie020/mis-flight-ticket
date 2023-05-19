<html>
    <head>
        <title> 查询结果 </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1 align="center" style="margin-top: 100px">查询结果</h1>
        <?php
            $num = ($_POST["num"] == "" ? "" : $_POST["num"]);
            $year = ($_POST["year"] == "" ? "" : $_POST["year"]);
            $month = ($_POST["month"] == "" ? "" : $_POST["month"]);
            if ($num=="" || $year=="" || $month=="") {
                echo '<script>alert("请输入完整的查询内容！");window.history.back();</script>';
            } else {
                if ($month < 10) $month="0".$month;
                $day = ($_POST["day"] == "" ? "" : $_POST["day"]);
                if ($day < 10) $day="0".$day;
                $date = $year."-".$month."-".$day;

                $db = mysqli_connect('localhost','root','','dbexp'); 
                if (!$db) { 
                    echo '<script>alert("无法连接至数据库！");window.history.back();</script>';
                }
                $sql = "SELECT * FROM Flights WHERE FlightNumber='$num' AND Date='$date';";
                $res = mysqli_query($db, $sql);
                if ($res->num_rows > 0) {
                    echo '<table align="center" style="border-spacing: 30px;" frame="vsides">';
                    echo 
                        '<tr style="font-size:20px">
                            <th>航班号</th>
                            <th>起点</th>
                            <th>终点</th>
                            <th>日期</th>
                            <th>起飞时刻</th>
                            <th>到达时刻</th>
                            <th>票价</th>
                            <th>折扣票数</th>
                            <th>折扣率</th>
                            <th>剩余座位数</th>
                            <th>航空公司</th>
                        </tr>';
                    while($row = $res->fetch_assoc()) {
                        echo 
                            '<tr style="text-align: center;">
                            <td>' . $row["FlightNumber"] . '</td>
                            <td>' . $row["Origin"] . '</td>
                            <td>' . $row["Destination"] . '</td>
                            <td>' . $row["Date"] . '</td>
                            <td>' . $row["DepartureTime"] . '</td>
                            <td>' . $row["ArrivalTime"] . '</td>
                            <td>' . $row["TicketPrice"] . '</td>
                            <td>' . $row["DiscountTickets"] . '</td>
                            <td>' . $row["DiscountRate"] . '</td>
                            <td>' . $row["AvailableSeats"] . '</td>
                            <td>' . $row["Airline"] . '</td>
                            </tr>';
                    }
                    echo "</table>";
                    print '<table align="center">
                    <tr><td><button style="font-size: 20px; height:50px; width:130px; margin-top: 60px; "
                        onclick="location.href=\'http://localhost/dbexp/select.php\'">返回</button></tr></td>
                    </table>';
                } else {
                    echo '<script>alert("未查询到结果！");window.history.back();</script>';
                }
                mysqli_close($db);
            }
        ?>
    </body>
</html>