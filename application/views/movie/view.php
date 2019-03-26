<h1><?=$name;?></h1>
          <hr>

          <div class="embed-responsive embed-responsive-16by9">
            <!--iframe class="embed-responsive-item" src="https://www.youtube.com/embed/R5KHoE_8dgo?showinfo=0" frameborder="0" allowfullscreen></iframe-->
            <img src="<?=$poster;?>" alt="">
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

          <div class="panel panel-info">
            <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <span>Сергей</span> </div>
            <div class="panel-body">
              Отличный фильм, 3 часа пролетели не заметно.
            </div>
          </div>
