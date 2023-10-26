<style>
    <?php
    include './styles/back.css';
?>
</style>
<div class="wiki__wrapper">
    <div class="wiki_infoblock">
        <div class="wiki__infoblock_test">
            A-Group Wiki
        </div>
        <div class="wiki_infoblock_content">

            <div class="infoblock__category_wrapper">






                <?php

                $categories =  $_SESSION['category_access'];
                $username = $_SESSION['username'];

                $query_users = "SELECT * FROM `users` WHERE `username` LIKE '$username'";
                $users = mysqli_query($connection, $query_users);
                if (!$users) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                $row = mysqli_fetch_assoc($users);

                $db_username = $row['username'];
                $db_password = $row['password'];
                $db_access = $row['categories'];

                $array_cat = $db_access;
                //!--------------------------------
                //!--------------------------------
                //!--------------------------------
                $categories  = explode(",", $array_cat);
                //!--------------------------------
                //!--------------------------------
                //!--------------------------------
                foreach ($categories as $suka) {
                    $query__category = "SELECT * FROM `category` WHERE `id` LIKE '$suka'";
                    $categories = mysqli_query($connection, $query__category);
                    while ($row = mysqli_fetch_assoc($categories)) {

                        $id = $row['id'];
                        $category_name = $row['category_name'];
                        $category_access = $row['category_access'];
                ?>
                        <div class="sitemap__item">
                            <a href="#"><?php echo $category_name; ?></a>
                            <ul class="sitemap__subitem">
                                <?php
                                $query_sub = "SELECT * FROM sub_category WHERE sub_id = '{$id}'";
                                $select_sub_category = mysqli_query($connection, $query_sub);
                                while ($row = mysqli_fetch_assoc($select_sub_category)) {
                                    $sub_id = $row['id'];
                                    $sub_name = $row['name'];
                                ?>
                                    <li>
                                        <a title="<?php echo $sub_name; ?>" href="./index.php?source_page=sub_page&sub_id=<?php echo $sub_id; ?>"><?php echo $sub_name; ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>


                <?php
                    }
                }

                ?>


            </div>
        </div>
    </div>
</div>