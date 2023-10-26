<?php
session_start();
if (empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    header('Location: https://a-group.az/payment/login.php');
    exit();
}

$mysqli = new mysqli("localhost", "payment", "fesf4512ff", "payments");
$connection = mysqli_connect("localhost", "payment", "fesf4512ff", "payments");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit_data'])) {

    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];

    $date_start = date('Y-m-d', strtotime($date_start));
    $date_end = date('Y-m-d', strtotime($date_end));
    // $str_start = explode(" ",$date_start);
    // echo $str_start[0];
    // echo  '<br> ';
    // echo $str_start[1];
    // echo  '<br> ';
    // echo $str_start[2];

    $query = "SELECT * FROM payments WHERE created BETWEEN  '{$date_start}' AND '{$date_end}' ORDER BY `created` DESC";
    $payments = mysqli_query($connection, $query);
    $payments = mysqli_fetch_all($payments, MYSQLI_ASSOC);
    //echo $query;

} else {
    $payments = $mysqli->query('SELECT * FROM payments ORDER BY `id` DESC');
    $payments = mysqli_fetch_all($payments, MYSQLI_ASSOC);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payments</title>

    <link rel="stylesheet" href="./style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <link
        href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css"
        rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script
        src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js">
    </script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


</head>

<body>

    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">
                    Payments
                </h1>
            </div>
            <div id="no-more-tables">


                <form autocomplete="off" class="search__form" method="post" action="./admin.php">
                    <div class="form__data__element">
                        <h3>Начало</h3>
                        <div class="ui calendar" id="example2">
                            <div class="ui input left icon">
                                <i class="calendar icon"></i>
                                <input autocomplete="off" type="text" placeholder="Date" name="date_start">
                            </div>
                        </div>

                    </div>
                    <div class="form__data__element">
                        <h3>Конец</h3>
                        <div class="ui calendar" id="example3">
                            <div class="ui input left icon">
                                <i class="calendar icon"></i>
                                <input autocomplete="off" type="text" placeholder="Date" name="date_end">
                            </div>
                        </div>
                    </div>

                    <div class="form__button">
                        <button type="submit" name="submit_data">Поиск</button>
                    </div>
                    <div class="form__button">
                        <a href="./admin.php">Обновить</a>
                    </div>


                </form>
                
                <?php
                if (isset($_POST['submit_data'])) {

                    echo '
                    <form action="./generate_excel.php" method="post">
                        <input type="text" value="'.$date_start.'" style="opacity:0;" name="date_start" id="">
                        <input type="text" value="'.$date_end.'" style="opacity:0;" name="date_end" id="">
                        <button type="submit" class="excel__export" name="export_excel">Export excel</button>
                    </form>
                        ';
                }

                ?>


                <table class="col-md-12 table-bordered table-condensed cf">
                    <thead class="cf">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th class="numeric">Number</th>
                            <th class="numeric">Price</th>
                            <th class="numeric">Ref</th>
                            <th class="numeric">Status</th>
                            <th class="numeric">Message</th>
                            <th class="numeric">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $value): ?>
                            <tr
                                style="background-color: <?= $value['status'] === 'approved' ? '#DAF7A6' : ($value['status'] === 'failed' ? '#FFCCCB' : '') ?>">
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['number'] ?></td>
                                <td><?= $value['price'] ?></td>
                                <td><?= $value['ref'] ?></td>
                                <td><?= $value['status'] ?></td>
                                <td><?= $value['message'] ?></td>
                                <td><?= $value['created'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    $('#example2').calendar({
        type: 'date'
    });
    $('#example3').calendar({
        type: 'date'
    });
    </script>
</body>

</html>