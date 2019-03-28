<h1><?=$name;?></h1>
          <hr>

          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?=$player_code;?>" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="well info-block text-center">
            Год: <span class="badge"><?=$year;?></span>
            Рейтинг: <span class="badge"><?=$rating;?></span>
            <!--ежиссер: <span class="badge">Кристофер Нолан</span-->
          </div>

          <div class="margin-8"></div>

          <h2>Описание <?=$name;?></h2>
          <hr>

          <div class="well">
            <?=$descriptions;?>
          </div>

          <div class="margin-8"></div>

          <h2>Отзывы об <?=$name;?></h2>
          <hr>
        <?php foreach ($comments as $key => $value): ?>
          <div class="panel panel-info">
            <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <span><?php echo getUserNameById($value['user_id'])->username; ?></span> </div>
            <div class="panel-body">
                <?php echo $value['comments_text']; ?>
            </div>
          </div>

        <?php endforeach ?>
