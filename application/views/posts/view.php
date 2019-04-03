<h1><?php echo $title; ?>
    <?php if($this->dx_auth->is_admin()) { ?>
        <a href="/posts/edit/<?php echo $slag; ?>"><button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
    <?php   } ?>
</h1>
<p><?php echo $text; ?></p>
<br><br><br><a href="/posts/">Все посты</a>