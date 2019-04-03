<h1>Статьи</h1>

<?php if($this->dx_auth->is_admin()) { ?>
    <p><a href="create">Добавить статью</a></p><br>
<?php   } ?>

<?php foreach ($posts as $key => $value): ?>

    <a href="/posts/view/<?=$value['slag']?>"><h3><?=$value['title']?></h3></a>
    <hr>
    <p>
        <?=$value['text']?>
    </p>
    <a href="/posts/view/<?=$value['slag']?>" class="btn btn-warning pull-right">читать</a>
    <?php if($this->dx_auth->is_admin()) { ?>
        | <a href="edit/<?php echo $value['slag']; ?>" class="btn btn-warning pull-right">edit</a> | <a href="delete/<?php echo $value['slag']; ?>" class="btn btn-warning pull-right">delete</a></p>
    <?php   } ?>

    <div class="margin-8"></div>
<?php endforeach ?>