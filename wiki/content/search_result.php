<?php
include './db/connection.php';
/******получение значения********/
if (isset($_POST['search_element'])) {
    $search_text =  $_POST['search_element'];
}
if (isset($_GET['search_element'])) {
    $search_text =  $_GET['search_element'];
}
$result = '';
/**************/
$search_text = mysqli_real_escape_string($connection, $search_text);
?>

<div class="search__result_wrapper">
    <div class="search__result__name">
        Результаты поиска
    </div>
    <div class="search__result__by">
        <span>поиск по запросу: </span> <?php echo $search_text; ?>
    </div>
    <div class="search__result__wrapper">
        <?php


        echo '<br>';
        /**************/
        $search_text = mysqli_real_escape_string($connection, $search_text);

        $query_search = "SELECT * FROM `sub_category` WHERE `key_words` LIKE '%$search_text%'";
        $search_result = mysqli_query($connection, $query_search);
        $search_result_row = mysqli_fetch_assoc($search_result);
        if ($search_result_row == null) {
            $result = 'К сожалению в нашей базе нет такой информации,повторите попытку уточнив поиск';
            return false;
        } do {
            $serach_row_id =  $search_result_row['id'];
            $serach_row_name = $search_result_row['name'];
            $serach_row_sub_id = $search_result_row['sub_id'];
            $serach_row_content = $search_result_row['content'];
            $serach_row_key_words = $search_result_row['key_words'];?>
            
            <div class="serach__result__element">
                <div class="serach__result__element_name">
                    <?php echo $serach_row_name; ?>
                </div>
                <div class="serach__result__element__desc">
                    ключевые слова: <span><?php echo $serach_row_key_words; ?></span>
                </div>
                <div class="serach__result__element__text">


                    <?php echo $serach_row_content;  ?>

                </div>
                <div class="serach__result__element__readmore">
                    <a href="./index.php?source_page=sub_page&sub_id=<?php echo $serach_row_id; ?>">Подробнее</a>
                </div>
            </div>

        <?php
        } while ($search_result_row = mysqli_fetch_assoc($search_result));

        ?>
        <div class="search__error">
            <?php if (isset($result)) {
                echo $result;
            }
            ?>
        </div>
    </div>
</div>