<form action="" method="post">

    <input class="form-control input-lg" type="input" name="slag" value="<?php echo $slag_movie; ?>" placeholder="слизняк"><br>
    <input class="form-control input-lg" type="input" name="name" value="<?php echo $name_movie; ?>" placeholder="название фильма"><br>
    <textarea class="form-control input-lg" name="descriptions" placeholder="описание"><?php echo $descriptions_movie; ?></textarea><br>
    <input class="form-control input-lg" type="input" name="year" value="<?php echo $year_movie; ?>" placeholder="год"><br>
    <input class="form-control input-lg" type="input" name="rating" value="<?php echo $rating_movie; ?>" placeholder="рейтинг"><br>
    <input class="form-control input-lg" type="input" name="poster" value="<?php echo $poster_movie; ?>" placeholder="ссылка на постер"><br>
    <input class="form-control input-lg" type="input" name="player_code" value="<?php echo $player_code_movie; ?>" placeholder="ссылка на плеер"><br>
    <input class="form-control input-lg" type="input" name="director" value="<?php echo $director_movie; ?>" placeholder="режиссер"><br>
    <input class="form-control input-lg" type="input" name="add_date" value="<?php echo $add_date_movie; ?>" placeholder="дата добавления"><br>
    <input class="form-control input-lg" type="input" name="category_id" value="<?php echo $category_id_movie; ?>" placeholder="категория (1=фильм; 2=сериал)"><br>
    <input type="submit" class="btn btn-success" name="submit" value="Редактировать фильм/сериал">

</form>