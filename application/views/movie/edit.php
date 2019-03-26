<form action="/movie/edit/" method="POST">
    <input type="input" value="<?=$slag_item;?>" name="slag" placeholder="Slag" class="form-control"><br>
    <input type="input" value="<?=$name_item;?>" name="name" placeholder="Название видео" class="form-control"><br>
    <input type="input" value="<?=$year_item;?>" name="year" placeholder="Год" class="form-control"><br>
    <input type="input" value="<?=$rating_item;?>" name="rating" placeholder="рейтинг" class="form-control"><br>
    <textarea name="descriptions" placeholder="текст видео" class="form-control"><?=$descriptions_item;?></textarea><br>
    <button type="submit" name="submit" class="btn btn-priemer">Сохранить</button>
</form>