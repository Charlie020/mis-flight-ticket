<html>
    <head>
        <title> 民航票务管理 </title>
        <meta charset="utf-8"/>
        <style>
            .dialog-class {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.4);
            }
            .dialog-content {
                background-color: #fefefe;
                margin: 15% auto;
                padding: 20px;
                width: 300px;
                text-align: center;
            }
            .input-class {
                margin-bottom: 10px;
                width: 100%;
                padding: 5px;
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
        <h1 align="center" style="margin-top: 100px">票务管理系统</h1>

        <table align="center">
            <tr><td><button style="height: 35px; width: 60px;" onclick="showDialog('InsertDialog')">插入</button></td>
                <td><button style="height: 35px; width: 60px; margin-left: 30px" onclick="showDialog('DeleteDialog')">删除</button></td>
                <td><button style="height: 35px; width: 60px; margin-left: 30px" onclick="showDialog('UpdateDialog')">更新</button></td></tr>
        </table>
        
        <div class="dialog-class" id="InsertDialog">
            <div class="dialog-content">
                <h2>添加航班信息</h2>
                <form action="insert.php" method="post">
                    <input type="text" class="input-class" name="flightnum" placeholder="航班号">
                    <input type="text" class="input-class" name="date" placeholder="日期(xxxx-xx-xx)">
                    <input type="submit" value="确定">
                    <input type="reset" value="取消" onclick="Clear('InsertDialog')"/>
                </form>
            </div>
        </div>
        
        <div class="dialog-class" id="DeleteDialog">
            <div class="dialog-content">
                <h2>删除航班信息</h2>
                <form action="delete.php" method="post">
                    <input type="text" class="input-class" name="flightnum" placeholder="航班号">
                    <input type="text" class="input-class" name="date" placeholder="日期(xxxx-xx-xx)">
                    <input type="submit" value="确定">
                    <input type="reset" value="取消" onclick="Clear('DeleteDialog')"/>
                </form>
            </div>
        </div>

        <div class="dialog-class" id="UpdateDialog">
            <div class="dialog-content">
                <h2>更新航班信息</h2>
                <form action="update.php" method="post">
                    <input type="text" class="input-class" name="flightnum" placeholder="航班号">
                    <input type="text" class="input-class" name="date" placeholder="日期(xxxx-xx-xx)">
                    <input type="submit" value="确定">
                    <input type="reset" value="取消" onclick="Clear('UpdateDialog')"/>
                </form>
            </div>
        </div>

        <script>
            // 显示对话框
            function showDialog(Dialog) {
                var Dialog = document.getElementById(Dialog);
                Dialog.style.display = "block";
            }
            // 关闭对话框
            function Clear(Dialog) {
                var Dialog = document.getElementById(Dialog);
                Dialog.style.display = "none";
            }
        </script>

        <?php
            $db = mysqli_connect('localhost','root','','dbexp'); 
            if (!$db) { 
                die('无法连接至数据库: ' . mysql_error($db)); 
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