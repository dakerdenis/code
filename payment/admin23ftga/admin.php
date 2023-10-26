<?php
session_start();
if (empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    header('Location: https://a-group.az/payment/login.php');
    exit();
} else {
    echo "authenticated user";
}


$recordsPerPage = 50; // Number of records to display per page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number from the URL

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payments</title>

    <link rel="stylesheet" href="./style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    

</head>
    
<?php



?>

    <body>
        <div class="content__container">
            <div class="content__wrapper">
                <div class="content__wrapper__desc">
                    <p>id</p>
                    <p>Police number</p>
                    <p>Name</p>
                    <p>Order</p>
                    <p>action</p>
                    <p>Amount</p>
                    <p>currency</p>
                    <p>RRN</p>
                    <p>INT REF</p>
                    <p>Time</p>
                </div>
                <div class="content__wrapper__content">
                <?php
                $connection = mysqli_connect('localhost', 'root', '', 'payments_azericard');
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Calculate the offset based on the current page and records per page
                $offset = ($currentPage - 1) * $recordsPerPage;
                // Modify the SQL query to retrieve a specific range of records
                $query = "SELECT * FROM payment WHERE action_t = 0 AND action_t !='' ORDER BY id DESC LIMIT $recordsPerPage OFFSET $offset;";
                $all__payments = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($all__payments)) {
                    $id = $row['id'];
                    $desc_police = $row['desc_police'];
                    $username = $row['username'];
                    $order_payment = $row['order_payment'];
                    $action_t = $row['action_t'];
                    $amount = $row['amount'];
                    $currency = $row['currency'];
                    $rrn = $row['rrn'];
                    $int_ref = $row['int_ref'];
                    $timestamp = $row['timestamp'];
                    $nonce = $row['nonce'];
                    $masked_card = $row['masked_card'];

                    $datetime_obj = DateTime::createFromFormat('YmdHis', $timestamp);
                    $formatted_string = $datetime_obj->format('Y/m/d H:i:s');


                    switch($currency) {
                        case 840:
                          $currency = 'USD';
                          break;
                        case 944:
                          $currency = 'AZN';
                          break;
                        case 978:
                          $currency = 'EUR';
                          break;
                        case 643:
                          $currency = 'RUB';
                          break;
                        case 949:
                            $currency = 'TRY';
                            break;
                      }
                    ?>
                                        <div class="content__wrapper__content__element">
                                            <p><?php echo $id; ?></p>
                                            <p><?php echo $desc_police; ?></p>
                                            <p><?php echo $username; ?></p>
                                            <p><?php echo $order_payment; ?></p>
                                            <p><?php echo $action_t; ?></p>
                                            <p><?php echo $amount; ?></p>
                                            <p><?php echo $currency; ?></p>
                                            <p><?php echo $rrn; ?></p>
                                            <p><?php echo $int_ref; ?></p>
                                            <p><?php echo $formatted_string; ?></p>
                                        </div>

                    <?php
                }
                // Calculate the total number of records
                $totalCountQuery = "SELECT COUNT(*) as total FROM insure2 WHERE action_t = 0 AND action_t !=''";
                $result = mysqli_query($connection, $totalCountQuery);
                $row = mysqli_fetch_assoc($result);
                $totalRecords = $row['total'];

                // Calculate the total number of pages
                $totalPages = ceil($totalRecords / $recordsPerPage);

                // Create navigation links for previous and next pages as well as numbered pages
                echo '<div class="pagination">';
                if ($currentPage > 1) {
                    echo '<a href="?page=' . ($currentPage - 1) . '" class="arrow_1">Previous</a>';
                }
                for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i == $currentPage) {
                        echo '<span class="current">' . $i . '</span>';
                    } else {
                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                    }
                }
                if ($currentPage < $totalPages) {
                    echo '<a href="?page=' . ($currentPage + 1) . '" class="arrow_1">Next</a>';
                }
                echo '</div>';
                ?>
                </div>
            </div>
        </div>
    </body>
</html>