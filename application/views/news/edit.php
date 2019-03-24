<form action="/news/edit/" method="POST">
    <input type="input" name="slag" value="<?=$slag_news;?>" placeholder="Slag"><br>
    <input type="input" name="title" value="<?=$title_news;?>" placeholder="Название новости"><br>
    <textarea name="text" placeholder="текст новости"> <?=$content_news;?></textarea><br>
    <button type="submit" name="submit">Создать</button>
</form>