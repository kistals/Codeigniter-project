<h1>Статьи</h1>

<?php if($this->dx_auth->is_admin()) { ?>
    <p><a href="create">Добавить статью</a></p><br>
<?php   } ?>

<?php foreach ($posts as $key => $value): ?>
    <p><a href="view/<?php echo $value['slag']; ?>"><?php echo $value['title']; ?></a>
    <?php if($this->dx_auth->is_admin()) { ?>
        | <a href="edit/<?php echo $value['slag']; ?>">edit</a> | <a href="delete/<?php echo $value['slag']; ?>">delete</a></p>
    <?php   } ?>
<?php endforeach ?>