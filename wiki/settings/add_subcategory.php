<div class="add__subcategory__wrapper">
    <form name="add_subcategory_form" role="form" method="post" id="add_subcategory_form" action="./db/add_subcategory.php" class="add_subcategory_form">
        <div class="add_subcategory_desc">Добавить подкатегорию</div>
        <!-----блок------>
        <div class="add_subcategory_block">
            <div class="add_subcategory_block-desc">Название</div>
            <div class="add_subcategory_block-input">
                <input type="text" id="subcategory_name" name="subcategory_name">
            </div>
        </div>
        <!-----блок------>
        <div class="add_subcategory_block">
            <div class="add_subcategory_block-desc">
                Родительская категория
            </div>
            <div class="add_subcategory_block-select">
                <select name="sub_id" id="sub_id">
                    <option value="">выберите родительскую категорию</option>
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


        <div class="add_subcategory_block">
            <button class="add_susb_button">Додбавить подкатегорию</button>
        </div>
    </form>



    <div class="all__subcategories_wrapper">
        <div class="all__subcategories__name">
            Список всех подкатегорий:
        </div>
        <p class="delete__remark">
            * При удалений подкатегорий восстановить её будет невозможно !
        </p>
        <div class="subcategori__wrapper_container">
            <?php
            $query1 = "SELECT * FROM sub_category";
            $select_category1 = mysqli_query($connection, $query1);
            while ($row1 = mysqli_fetch_assoc($select_category1)) {
                $id1 = $row1['id'];
                $category_name1 = $row1['name'];
                $sub123 = $row1['sub_id'];
            ?>
                <div class="subcategory__element">
                    <div class="subcategory__element__id">
                        <?php echo $id1; ?>
                    </div>
                    <div class="subcategory__element__name">
                        <?php echo $category_name1; ?>
                    </div>
                    <div class="subcategory__element__rfer">
                        <?php
                        $query2 = "SELECT * FROM category WHERE id = '{$sub123}' ";
                        $select_category2 = mysqli_query($connection, $query2);
                        while ($row2 = mysqli_fetch_assoc($select_category2)) {

                            $category_name2 = $row2['category_name'];
                        ?>
                            <p><?php echo $category_name2; ?></p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="subcategory__element__delete">
                        <a href="./db/delete_subcategory.php?source=<?php echo $id1; ?>">удалить</a>
                    </div>
                    <div class="subcategory__element__link">
                        <a href="./index.php?source_page=edit_category&sub_cat_id=<?php echo $id1; ?>">Редактировать</a>
                    </div>

                </div>



            <?php
            }
            ?>
        </div>

    </div>
</div>