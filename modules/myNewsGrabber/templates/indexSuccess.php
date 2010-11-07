<?php
/**
 * index
 */
?>

<h1>Новости</h1>

<?php foreach($feeds->getItems() as $item): ?>
    <h2><?php echo $item->getTitle() ?></h2>
    <div class="content">
        <?php echo $item->getDescription(ESC_RAW) ?>
    </div>
<?php endforeach ?>