<?php
if(isset($_GET['sub_cat_id'])){
    $sub_id = $_GET['sub_cat_id'];
}

$query_all = "SELECT * FROM sub_category WHERE id = '{$sub_id}'";
$query_all_result = mysqli_query($connection, $query_all);
while ($row4 = mysqli_fetch_assoc($query_all_result)) {
    $subcat_name =  $row4['name'];
    $subcat_content =  $row4['content'];
    $subcat_key_words =  $row4['key_words'];
}

?>
<div class="edit_subcategory__wrapper">
    <div class="edit_subcategory__name">
        Редактирование подкатегорий
    </div>
    <form class="edit__subcategory__content" method="post" action="./db/edit__sub_cat_code.php">
        <div class="edit_subcategory_block">
            <div class="edit__subcategory_desc">
                Название подкатегорий:
            </div>
            <div class="edit__subcategory__input">
                <input type="text" value="<?php echo $subcat_name; ?>" name="name" id="name">
            </div>
        </div>
        <div class="edit_subcategory_block">
            <div class="edit__subcategory_desc">
                Ключевые слова, через запятую
            </div>
            <div class="edit__subcategory__input">
                <input type="text" value="<?php echo $subcat_key_words; ?>" name="key_words" id="key_words">
            </div>
        </div>
        <div class="edit_subcategory_block">
            <div class="edit__subcategory_desc">
                Родительская категория:
            </div>
            <div class="edit__subcategory__input">
                <select name="sub_id" id="sub_id">
                    <?php
                    $query1 = "SELECT * FROM category WHERE id ='{$sub_id}'";
                    $select_category1 = mysqli_query($connection, $query1);
                    while ($row1 = mysqli_fetch_assoc($select_category1)) {
                        $id1 = $row1['id'];
                        $category_name1 = $row['category_name'];
                    ?>
                        <option value="<?php echo $id1; ?>"><?php echo $category_name1; ?></option>
                    <?php
                    }
                    ?>


                    <?php
                    $query = "SELECT * FROM category";
                    $select_category = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_category)) {
                        $id = $row['id'];
                        $category_name = $row['category_name'];
                    ?>
                        <option value="<?php echo $id; ?>"><?php echo $category_name; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="edit_subcategory_block">
            <div class="edit__subcategory_desc">
                Добавление файлов в категорию: 
            </div>
                <a href="./index.php?source_page=add_files&sub_id=<?php echo $sub_id; ?>">Добавить файлы</a>

        </div>
        <input type="hidden" name="id" value="<?php echo $sub_id ?>">
        <div class="edit_subcategory_block_button">
            <button type="submit">Сохранить</button>
        </div>
        <p>
            <?php
            if (isset($_SESSION['edit_sub_cat_succesfull'])) {
                echo $_SESSION['edit_sub_cat_succesfull'];
            }
            ?>
        </p>
    </form>


    <form class="edit__sub_category__content" method="POST" action="./db/edit_subcategory_text.php">

        <div class="edit__subcategory__content_name">
            Редактирование контента
        </div>
        <div class="edit__subcategory__content_desc">
            Редактирование контента делается отдельно от редактирования других составляющих
        </div>
        <div class="add_subcategory_block_textarea">
            <textarea id="mytextarea" name="content">
                <?php echo $subcat_content; ?>
            </textarea>
        </div>

        <input name="sub_id" type="hidden" value="<?php echo $sub_id ?>">
        <div class="edit__sub__category__button">
            <button>Сохранить текст</button>
        </div>
    </form>

    <div class="edit_sub__link">
        <a href="./index.php?source_page=sub_page&sub_id=<?php echo $sub_id; ?>">Просмотреть публикацию</a>
    </div>



</div>
<?php
// (B) SAVE CONTENT ON FORM SUBMIT
if (isset($_POST["content"])) {
    // (B1) CONNECT TO DATABASE
    require "./db/2-database.php";

    // (B2) SAVE
    // NOTE - CONTENT ID FIXED TO 99 FOR THIS DEMO
    // USE YOUR OWN ID IN YOUR PROJECT!
    echo $_CONTENT->save($sub_id, $_POST["content"])
        ? "<div>SAVED</div>"
        : "<div>{$_CONTENT->error}</div>";
}
?>