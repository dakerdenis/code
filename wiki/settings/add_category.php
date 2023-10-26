<?php

include './db/connection.php';
?>
<style>
    <?php
    include '../styles/style.css';
    ?>
</style>

<div class="add__category__wrapper">
    <div class="add__category__container">
        <div class="add__category__block">
            <div class="add_category__desc">
                Добавление категорий
            </div>
            <!----->
            <form action="./db/add_category.php" method="POST" class="add_category__form">
                <div class="add_category_form_block">
                    <p>Название категорий</p>
                    <div class="add_category_form_input">
                        <input name="category_name" id="category_name" type="text">
                    </div>
                </div>
                <div class="add_category_form_block">
                    <input name="submit" c id="submit" class="add_category_input" type="submit" value="Добавить категорию">
                </div>
            </form>
            <!----->
        </div>

        <div class="category__list">
            <div class="category__list_desc">Список всех имеющихся категорий:</div>
            <p class="delete__remark">
                * При удалений категорий восстановить её будет невозможно !
            </p>
            <div class="category__list__wrapper">
                <?php

                $query = "SELECT * FROM category";
                $select_category = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_category)) {
                    $id = $row['id'];
                    $category_name = $row['category_name'];
                ?>
                    <div class="category__element__list">
                        <p><?php echo $category_name; ?></p>
                        <a href="./db/delete_category.php?source=<?php echo $id; ?>">удалить</a>

                    </div>

                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>