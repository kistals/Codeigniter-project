
        <!-- MENU start -->
        <div class="col-lg-3 col-lg-pull-9"> <!-- Меняем блоки местами col-lg-pull-9 -->
          
          <div class="panel panel-info hidden-xs">
            <div class="panel-heading"><div class="sidebar-header">Поиск</div></div>
            <div class="panel-body">
              <form role="search" action="/search/" method="GET">
                <div class="form-group">
                  <div class="input-group">
                    <input type="search" name="q_search" class="form-control input-lg" placeholder="Ваш запрос">
                    <div class="input-group-btn">
                      <button class="btn btn-default btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </div>
                </div>
              </form> 
            </div>
          </div>
    
          <div class="panel panel-info">
            <div class="panel-heading"><div class="sidebar-header">Вход</div></div>
            <div class="panel-body">

              <?php if(!$this->dx_auth->is_logged_in()) {?>
              <form role="form" method="POST" action="/auth/login/">
                <div class="form-group">
                  <input type="text"  class="form-control input-lg" placeholder="Логин" name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control input-lg" placeholder="Пароль" name="password">
                </div>

                <button type="submit" class="btn btn-warning pull-right">вход</button>

              </form>

              <?php }else{?>

              Здравствуйте, <?php $this->dx_auth->get_username();?>

              <a href="/auth/logout/" class="btn btn-warning pull-right">выход</a>
              <?php }?>
            </div>
          </div>  


          <div class="panel panel-info">
            <div class="panel-heading"><div class="sidebar-header">Новости</div></div>
            <div class="panel-body">
              <?php foreach ($news as $key => $value): ?>
                <p><a href="/news/view/<?php echo $value['slag']; ?>"><?php echo $value['title']; ?></a></p>
                <p>Мы запустили новый сервис</p>
              <?php endforeach ?>
              
            </div>
          </div>


          <div class="panel panel-info">
            <div class="panel-heading"><div class="sidebar-header">Рейтинг фильмов</div></div>
            <div class="panel-body">
                
                <ul class="list-group">
                  
                <?php foreach ($films as $key => $value): ?>
                  <li class="list-group-item list-group-warning">
                    <span class="badge"><?php echo $value['rating']; ?></span>
                    <a href="/movie/view/<?=$value['slag'];?>"><?php echo $value['name']; ?></a>
                  </li>
                <?php endforeach ?>

                </ul>

            </div>
          </div>  
          


        </div>      

      <!-- MENU end -->