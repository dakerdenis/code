<style>
    <?php
    include './styles/back.css';
?>
</style>
<?php

if (isset($_GET['sub_id'])) {
    $id = $_GET['sub_id'];

    $query_subpage = "SELECT * FROM sub_category WHERE id = '{$id}'";
    $select_sub_category = mysqli_query($connection, $query_subpage);



    $row = mysqli_fetch_assoc($select_sub_category);
    $id = $row['id'];
    $sub_id = $row['sub_id'];
    $sub_name = $row['name'];
    $sub_content = $row['content'];
    $image = $row['image'];
    $key_words = $row['key_words'];



    $user_list = '';
    $q = "SELECT username FROM users WHERE categories LIKE '%$sub_id%'";
    $select_main_category = mysqli_query($connection, $q);
    $row2 = mysqli_fetch_assoc($select_main_category);
    while ($row2 = mysqli_fetch_assoc($select_main_category)) {

        $user_list .= $row2['username'] . ",";
    }



    $username = $_SESSION['username'];

    // echo $user_list;
    echo '<br>';
    echo '<br>';
?>

    <div class="sub__page__wrapper">
        <?php

        $users = explode(",", $user_list);
        if (in_array($username, $users)) {
            //  echo "Access Granted";
        ?>
            <div class="sub_page_container">
                <!------------>
                <div class="sub_page_desc">
                    <!--назад к списку статей-->
                    <div class="sub_page_desc_back">
                        <a href="./index.php"> <span>&#8678;</span>
                            <p>Назад к списку статей</p>
                        </a>
                    </div>
                    <!--название статьи--->
                    <div class="sub_page_desc-name">
                        <a href="./index.php">Главная</a><span>&#8250;</span>
                        <p><?php echo $sub_name; ?></p>
                    </div>
                    <!---номер статьи в БД------>
                    <div class="sub_page_desc-number">
                        Номер статьи: <span><?php echo $id; ?></span>
                    </div>
                    <!---ключевые слова-->
                    <div class="sub_page_key_words">


                        Ключевые слова: <?php
                                        $key_words_array = explode(",", $key_words);
                                        foreach ($key_words_array as $key) {
                                        ?>
                            <a href="./index.php?source_page=search_result&search_element=<?php echo $key; ?>"><?php echo $key; ?></a>
                        <?php
                                        }
                        ?>

                    </div>

                </div>
                <!------------>
                <div class="sub_page__image"></div>
                <div class="sub_page_content">
                    <div class="sub_page_text">
                        <?php echo $sub_content; ?>
                    </div>


                </div>
                <div class="sub_page_files">
                    <div class="sub_page_files_h">
                        Загружаемые файлы
                    </div>
                    <div class="sub_page_files_wrapper">
                        <?php

                        $query_show_files = "SELECT * FROM `files` WHERE `file_sub_id` = '{$id}'";
                        $query__files =   mysqli_query($connection, $query_show_files);
                        while ($row4 = mysqli_fetch_assoc($query__files)) {
                            $file_name = $row4['name'];
                        ?>
                            <div class="sub_page_files_element">
                                <div class="sub_page_files_name">
                                    <p>
                                    <?php echo $file_name; ?>
                                    </p>
                                </div>
                                <div class="sub_page_files_download">
                                    <a href="./files/<?php echo $file_name;  ?>">Скачать</a>
                                </div>
                            </div>

                        <?php
                        }
                        ?>



                    </div>

                </div>

                <!--редактировать статью-->
                <div class="sub_page__edit_link">
                    <?php
                    if (isset($_SESSION['role'])) {
                        if ($_SESSION['role'] == 'admin') {
                            echo '
                                <a href=./index.php?source_page=edit_category&sub_cat_id=' . $id . '">Редактировать публикацию</a>
                                ';
                        } else if ($_SESSION['role'] == 'user') {
                            echo '';
                        } else if ($_SESSION['role'] == 'superadmin') {
                            echo '
                    <a href="./index.php?source_page=edit_category&sub_cat_id=' . $id . '">Редактировать публикацию</a>
                                ';
                        }
                    }
                    ?>
                </div>

            </div>

        <?php
        } else {

        ?>

            <div class="sub_page_container">
                <!------------>
                <div class="sub_page_desc">
                    <!--назад к списку статей-->
                    <div class="sub_page_desc_back">
                        <a href="./index.php"> <span>&#8678;</span>
                            <p>Назад к списку статей</p>
                        </a>
                    </div>
                    <!--название статьи--->
                    <div class="sub_page_desc-name">
                        Доступ к публикации запрещён , запросите доступ у IT отдела
                    </div>
                </div>
                <!------------>

            </div>


        <?php

        }






        ?>



    </div>

<?php
}
?>