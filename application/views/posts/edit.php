<form action="" method="post">

    <input class="form-control input-lg" type="input" name="slag" value="<?php echo $slag_posts; ?>" placeholder="слизняк"><br>
    <input class="form-control input-lg" type="input" name="title" value="<?php echo $title_posts; ?>" placeholder="название поста"><br>
    <textarea class="form-control input-lg" name="text" placeholder="текст поста"><?php echo $text_posts; ?></textarea><br>
    <input type="submit" class="btn btn-success" name="submit" value="Редактировать пост">

</form>