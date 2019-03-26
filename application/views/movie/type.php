<h1><?=$title;?></h1>
<hr>
<a href="create">Добавить фильм</a><br>

<?php foreach ($movie_data as $key => $value): ?>
    <div class="row">
            <div class="well clearfix">
              <div class="col-lg-3 col-md-2 text-center">
                <img class="img-thumbnail" src="<?php echo $value['poster']; ?>" alt="<?php echo $value['name']; ?>">
                <p><?php echo $value['name']; ?></p>
              </div>

              <div class="col-lg-9 col-md-10">
                <p>
                <?php echo $value['descriptions']; ?>
                </p>
              </div>
              
              <div class="col-lg-12 col-md-12">
                <a href="view/<?php echo $value['slag']; ?>" class="btn btn-lg btn-warning pull-right">подробнее</a>
                <a href="edit/<?php echo $value['slag']; ?>" class="btn btn-lg btn-warning pull-right">редактировать</a>
                <a href="delete/<?php echo $value['slag']; ?>" class="btn btn-lg btn-warning pull-right">удалить</a>
              </div>

            </div>

          </div>
<?php endforeach ?>