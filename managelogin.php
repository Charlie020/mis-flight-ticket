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
                echo '<script>alert("用户名或密码为空！");window.history.back();</script>';
            } else {
                $db = mysqli_connect('localhost','root','','dbexp'); 
                if (!$db) { 
                    echo '<script>alert("无法连接至数据库！");window.history.back();</script>';
                } 
                $sql = "SELECT * FROM Users WHERE Username = '$name' AND password = '$passwd';";
                $res = mysqli_query($db, $sql);
                if ($res->num_rows > 0) {
                    header("Location: http://localhost/dbexp/manage.php");
                } else {
                    echo '<script>alert("用户名或密码错误！");window.history.back();</script>';
                }
                mysqli_close($db);
            }
        ?>
    </body>
</html>