<form action="/news/edit/" method="POST">
    <input type="input" name="slag" value="<?=$slag_news;?>" placeholder="Slag" class="form-control"><br>
    <input type="input" name="title" value="<?=$title_news;?>" placeholder="Название новости" class="form-control"><br>
    <textarea name="text" placeholder="текст новости" class="form-control"> <?=$content_news;?></textarea><br>
    <button type="submit" name="submit" class="btn btn-priemer">Создать</button>
</form>