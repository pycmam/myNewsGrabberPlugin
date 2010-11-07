<?php
/**
 * Список новостей
 *
 * @param sfFeed $feed
 */
?>

<?php foreach($feed->getItems() as $item): ?>
<div class="news-item">
    <h2>
        <?php echo link_to($item->getTitle(), $item->getLink(), array(
            'target' => '_blank',
        )) ?>
        <span class="date"><?php echo format_date($item->getPubdate()) ?></span>
    </h2>
    <div class="content">
        <?php echo str_replace('[...]', link_to(__('Read more') .'...', $item->getLink(), array(
            'target' => '_blank',
        )), $item->getDescription(ESC_RAW)) ?>
    </div>

</div>
<?php endforeach ?>