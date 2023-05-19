<html>
    <head>
        <title> 提示！ </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <?php
            $flightnum = ($_POST["iflightnum"] == "" ? "" : $_POST["iflightnum"]);
            $origin = ($_POST["iorigin"] == "" ? "NULL" : $_POST["iorigin"]);
            $destination = ($_POST["idestination"] == "" ? "NULL" : $_POST["idestination"]);
            $date = ($_POST["idate"] == "" ? "" : $_POST["idate"]);
            $departuretime = ($_POST["ideparturetime"] == "" ? "00-00" : $_POST["ideparturetime"]);
            $arrivaltime = ($_POST["iarrivaltime"] == "" ? "00-00" : $_POST["iarrivaltime"]);
            $ticketprice = ($_POST["iticketprice"] == "" ? 0 : $_POST["iticketprice"]);
            $discountticket = ($_POST["idiscountticket"] == "" ? 0 : $_POST["idiscountticket"]);
            $discountrate = ($_POST["idiscountrate"] == "" ? 0 : $_POST["idiscountrate"]);
            $airline = ($_POST["iairline"] == "" ? "NULL" : $_POST["iairline"]);
            $availableseats = ($_POST["iavailableseats"] == "" ? 0 : $_POST["iavailableseats"]);

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
                    echo '<script>alert("插入内容已存在！");window.history.back();</script>';
                } else {
                    $sql = "INSERT INTO Flights(FlightNumber, Origin, Destination, Date, DepartureTime, ArrivalTime, TicketPrice, DiscountTickets, DiscountRate, Airline, AvailableSeats)
                    VALUES ('$flightnum', '$origin', '$destination', '$date', '$departuretime', '$arrivaltime', $ticketprice, $discountticket, $discountrate, '$airline', $availableseats);";   
                    $res = mysqli_query($db, $sql);
                    echo '<script>alert("插入成功！");window.history.back();</script>';
                }
                mysqli_close($db);
            }
        ?>
    </body>
</html>