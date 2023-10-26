<?php
$user_id =  $_GET['user_id'];
?>


<?php
$query_user = "SELECT * FROM users WHERE id = '{$user_id}'";
$select_user = mysqli_query($connection, $query_user);
while ($row = mysqli_fetch_assoc($select_user)) {
    $username = $row['username'];
    $user_id = $row['id'];
    $password = $row['password'];
    $role = $row['role'];
    $categories = $row['categories'];
?>
    <form action="./db/edit_user_code.php" id="frm1" class="form__add_user" method="post" style="width: 80%;">
        <div class="add_user__form_name">
            Редактирование пользователя
        </div>
        <div class="add_user__form__block">
            <div class="add_user__form_desc">
                Username:
            </div>
            <div class="add_user__form_input">
                <input type="text" name="username" id="username" value="<?php echo $username; ?>">
            </div>
        </div>
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
        <div class="add_user__form__block">
            <div class="add_user__form_desc">
                Role:
            </div>
            <div class="add_user__form_input">
                <select name="role" id="role">
                    <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                </select>
            </div>
        </div>
        <div class="add_user__form__block">
            <div class="add_user__form_desc">
                password:
            </div>
            <div class="add_user__form_input">
                <input type="text" name="password" id="password" value="<?php echo $password; ?>">
            </div>
        </div>

        <div class="edit__user__categories">
            <div class="edit__user__categories_name">
                Доступ к разделам:
            </div>
            <div class="edit_user__categories__wrapper">
                <?php
                $query = "SELECT * FROM category";
                $select_category = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_category)) {
                    $category_id = $row['id'];
                    $category_name = $row['category_name'];
                    $category_access = $row['category_access'];
                ?>
                    <div class="category__user__element">
                        <input type="checkbox" id="<?php echo $id; ?>" name="category[]" value="<?php echo $category_id; ?>">
                        <label for="<?php echo $id; ?>"> <?php echo $category_name; ?></label><br>
                    </div>

                <?php
                }
                ?>
            </div>
            <div class="select_all_checkbox">
                <div class="select_all_block">
                    <label for="checkall">Выделить всё</label>
                    <input type='checkbox' name='checkall' onclick='checkedAll(frm1);'>
                </div>
            </div>

        </div>


        <div class="users__content__addnew">
            <button type="submit" id="submit" name="submit">сохранить изменения </button>
        </div>
    </form>
<?php
}
?>