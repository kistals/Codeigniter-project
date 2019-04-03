<h1>Все новости</h1>
<a href="create">Добавить новость</a><br><br><br>
<?php foreach ($news as $key => $value): ?>
    <a href="view/<?=$value['slag'];?>"><?php echo $value['title']; ?></a>
    <?php if($this->dx_auth->is_admin()) { ?>
        <a href="edit/<?=$value['slag'];?>">Редоктировать</a>
        <a href="delete/<?=$value['slag'];?>">удалить</a><br>
    <?php   } ?>
<?php endforeach ?>