<h1>Поиск (найдено <?php echo count($search_result); ?>)</h1>

<?php foreach ($search_result as $key => $value): ?>
    <div class="well">
        <?php echo '<a href="/movie/view/'. $value['slag'].'">' . $value['name'] .'</a><br>'. $value['descriptions']; ?>
    </div>
<?php endforeach ?>