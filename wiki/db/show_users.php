<div class="users__content_desc">
    Список всех пользователей
</div>

<form action="./db/add_user.php" class="form__add_user" method="post">
    <div class="add_user__form_name">
        Добавление нового пользователя
    </div>
    <div class="add_user__form__block">
        <div class="add_user__form_desc">
            Username:
        </div>
        <div class="add_user__form_input">
            <input type="text" name="username" id="username">
        </div>
    </div>
    <div class="add_user__form__block">
        <div class="add_user__form_desc">
            Role:
        </div>
        <div class="add_user__form_input">
            <select name="role" id="role">
                <option value="admin">admin</option>
                <option value="user">User</option>
            </select>
        </div>
    </div>
    <div class="add_user__form__block">
        <div class="add_user__form_desc">
            password:
        </div>
        <div class="add_user__form_input">
            <input type="text" name="password" id="password">
        </div>
    </div>

    <div class="users__content__addnew">
        <button type="submit" id="submit" name="submit">Добавить нового пользователя </button>
    </div>
</form>
<p class="delete__remark">
    * При удалений пользователя восстановить его будет невозможно !
</p>
<div class="users__block">
    <?php

    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_users)) {
        $id = $row['id'];
        $username = $row['username'];
        $role = $row['role'];
    ?>
        <div class="user_block">
            <p><?php echo $username; ?></p>
            <p><?php echo $role; ?></p>
            <p>
                <a class="user_block_delete" href="./db/delete_user.php?source=<?php echo $id ?>">Удалить</a>
            </p>
            <p>
                <a class="user__block__edit" href="./index.php?source_page=add_user&user_id=<?php echo $id; ?>">Редактировать</a>
            </p>
        </div>

    <?php
    }
    ?>
</div>