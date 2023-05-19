<html>
    <head>
        <title> 发生错误！ </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <?php
            $name = ($_POST["name"] == "" ? "" : $_POST["name"]);
            $passwd = ($_POST["passwd"] == "" ? "" : $_POST["passwd"]);
            if ($name == "" || $passwd == "") {
                echo '<p align="center" style="font-size:40px; margin-top: 300px">用户名或密码为空！</p>';
            } else {
                $db = mysqli_connect('localhost','root','','dbexp'); 
                if (!$db) { 
                    die('无法连接至数据库: ' . mysql_error($db)); 
                } 
                $sql = "SELECT * FROM Users WHERE Username = '$name' AND password = '$passwd';";
                $res = mysqli_query($db, $sql);
                if ($res->num_rows > 0) {
                    header("Location: http://localhost/dbexp/manage.php");
                } else {
                    echo '<p align="center" style="font-size:40px; margin-top: 300px">用户名或密码错误！</p>';
                }
                mysqli_close($db);
            }
            print '<button style="font-size: 20px; height:50px; width:150px; margin-top: 30px; position: absolute; left: 45%"
            onclick="location.href=\'http://localhost/dbexp/managelogin.html\'">返回</button>';
        ?>
    </body>
</html>