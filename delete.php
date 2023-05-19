<html>
    <head>
        <title> 发生错误！ </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <?php
            $flightnum = ($_POST["flightnum"] == "" ? "" : $_POST["flightnum"]);
            $date = ($_POST["date"] == "" ? "" : $_POST["date"]);
            if ($flightnum == "" || $date == "") {
                echo '<script>alert("输入内容为空");window.history.back();</script>';
            } else {
                $db = mysqli_connect('localhost','root','','dbexp'); 
                if (!$db) { 
                    die('无法连接至数据库: ' . mysql_error($db)); 
                } 
                $sql = "SELECT * FROM Users WHERE Username = '$name' AND password = '$passwd';";
                $res = mysqli_query($db, $sql);
                if ($res->num_rows > 0) {
                    header("Location: manage.php");
                } else {
                    echo '<p align="center" style="font-size:40px; margin-top: 300px">用户名或密码错误！</p>';
                }
                mysqli_close($db);
            }
        ?>
    </body>
</html>