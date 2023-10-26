<div class="users_wrapper">
    <div class="users__container">

    <?php

        $user_edit_id = '';
        if(isset($_GET['user_id'])){
            $user_edit_id = $_GET['user_id'];
        }

        switch($user_edit_id){
            case '';
            include './db/show_users.php';
            break;

            case true;
            include './db/edit_user.php';
            break;

            default: 
            include './db/show_users.php';
            break;
        }

    ?>











    </div>
</div>