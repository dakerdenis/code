<?php
include './connection.php';
echo "test begins";
echo '<br>';
/******получение значения********/
$search_text =  $_POST['search_element'];
$result = '';
/**************/
$search_text = mysqli_real_escape_string($connection, $search_text);

$query_search = "SELECT * FROM `sub_category` WHERE `key_words` LIKE '%$search_text%'";
$search_result = mysqli_query($connection, $query_search);
$search_result_row = mysqli_fetch_assoc($search_result);
echo 'id:' .  $search_result_row['id'];
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

if ($search_result_row == null) {
    echo "eblan adasf";
    $result = 'К сожалению в нашей базе нет такой информации,повторите попытку уточнив поиск';
} else {
    echo  $search_text;
    $query_search2 = "SELECT * FROM `sub_category` WHERE `key_words` LIKE '%$search_text%'";
    $search_result2 = mysqli_query($connection, $query_search2);
    $search_result_row2 = mysqli_fetch_assoc($search_result2);
    echo '<br>';
    echo $search_result_row2['id'];
    while ($row2 = mysqli_fetch_assoc($search_result2)) {
        $serach_row_id =  $row2['id'];
        $serach_row_name = $row2['name'];
        $serach_row_sub_id = $row2['sub_id'];
        $serach_row_content = $row2['content'];
        $serach_row_key_words = $row2['key_words'];
        echo "eblan adasf";
?>
        <div class="serach__result__element">
            <div class="serach__result__element_name">
                <?php echo $serach_row_name; ?>
            </div>
            <div class="serach__result__element__desc">
                ключевые слова: <span><?php echo $serach_row_key_words;  ?></span>
            </div>
            <div class="serach__result__element__text">

                <p>
                <?php echo $serach_row_content;  ?> 
                </p>
            </div>
            <div class="serach__result__element__readmore">
                <a href="./index.php?source_page=sub_page&sub_id=<?php echo $serach_row_id; ?>">Подробнее</a>
            </div>
        </div>



<?php
    }
    echo '<br>';
    echo 'конец тега else';
}
?>