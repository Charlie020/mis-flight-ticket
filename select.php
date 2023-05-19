<html>
    <head>
        <title> 民航票务信息 </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1 align="center" style="margin-top: 100px">票务信息</h1>
        <?php
            $db = mysqli_connect('localhost','root','','dbexp'); 
            if (!$db) { 
                echo '<script>alert("无法连接至数据库！");window.history.back();</script>';
            } 
            $sql = "SELECT * FROM Flights;";
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
                echo 
                '<form action="selectres.php" method="post">
                    <table align="center">
                        <tr>
                            <td> 航班号</td><td>&nbsp</td>
                            <td><input type="text" name="num" style="height: 35px; width: 60px"/></td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td>日期</td><td>&nbsp</td>
                            <td> <input type="text" name="year" style="height: 35px; width: 60px"/>年</td>
                            <td>&nbsp</td>
                            <td> <input type="text" name="month" style="height: 35px; width: 60px"/>月</td>
                            <td>&nbsp</td>
                            <td> <input type="text" name="day" style="height: 35px; width: 60px"/>日</td>
                        </tr>
                    </table>
                    <table align="center" style="margin-top:20px">
                        <tr>
                            <td><input type="submit" value="查询" style="height: 35px; width: 60px"/></td>
                            <td><input type="reset" value="退出" style="height: 35px; width: 60px; margin-left: 30px" onclick="location.href=\'http://localhost/dbexp/main.html\'"/></td>
                        </tr>
                    </table>
                </form>';
            } else {
                echo "票务系统为空<br/>";
            }
            mysqli_close($db);
        ?>
    </body>
</html>