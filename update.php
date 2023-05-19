<html>
    <head>
        <title> 提示！ </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <?php
            $flightnum_old = ($_POST["uflightnum"] == "" ? "" : $_POST["uflightnum_old"]);
            $date_old = ($_POST["udate"] == "" ? "" : $_POST["udate_old"]);

            $flightnum = ($_POST["uflightnum"] == "" ? "" : $_POST["uflightnum"]);
            $origin = ($_POST["uorigin"] == "" ? "NULL" : $_POST["uorigin"]);
            $destination = ($_POST["udestination"] == "" ? "NULL" : $_POST["udestination"]);
            $date = ($_POST["udate"] == "" ? "" : $_POST["udate"]);
            $departuretime = ($_POST["udeparturetime"] == "" ? "00-00" : $_POST["udeparturetime"]);
            $arrivaltime = ($_POST["uarrivaltime"] == "" ? "00-00" : $_POST["uarrivaltime"]);
            $ticketprice = ($_POST["uticketprice"] == "" ? 0 : $_POST["uticketprice"]);
            $discountticket = ($_POST["udiscountticket"] == "" ? 0 : $_POST["udiscountticket"]);
            $discountrate = ($_POST["udiscountrate"] == "" ? 0 : $_POST["udiscountrate"]);
            $airline = ($_POST["uairline"] == "" ? "NULL" : $_POST["uairline"]);
            $availableseats = ($_POST["uavailableseats"] == "" ? 0 : $_POST["uavailableseats"]);

            if ($flightnum == "" || $date == "" || $flightnum_old == "" || $date_old == "") {
                echo '<script>alert("输入内容为空！");window.history.back();</script>';
            } else {
                $db = mysqli_connect('localhost','root','','dbexp'); 
                if (!$db) {
                    echo '<script>alert("无法连接至数据库！");window.history.back();</script>';
                } 
                $sql = "SELECT * FROM Flights WHERE FlightNumber = '$flightnum_old' AND Date = '$date_old';";
                $res = mysqli_query($db, $sql);
                if ($res->num_rows > 0) {
                    $sql = "UPDATE Flights SET FlightNumber='$flightnum', Date='$date', Origin='$origin', Destination='$destination',
                        DepartureTime='$departuretime', ArrivalTime='$arrivaltime', TicketPrice='$ticketprice', DiscountTickets='$discountticket',
                        DiscountRate='$discountrate', AvailableSeats='$availableseats', Airline='$airline'
                    WHERE FlightNumber = '$flightnum_old' AND Date = '$date_old';";
                    $res = mysqli_query($db, $sql);
                    echo '<script>alert("更新成功！");window.history.back();</script>';
                } else {
                    echo '<script>alert("所要更新数据不存在！");window.history.back();</script>';
                }
                mysqli_close($db);
            }
        ?>
    </body>
</html>