<?php
/**
 * Блок "Новости системы" на главной
 *
 * @param sfFeed $feed
 */

$items = $feed->getItems();
$count = count($items) <= sfConfig::get('app_popular_news_count', 3)
    ? count($items)
    : sfConfig::get('app_popular_news_count', 3);
?>

<div id="last-news-block" class="popular">
    <span class="h2-title"><?php echo __('Our News') ?></span>
    <?php for ($i = 0; $i < $count; $i++): ?>
        <div>
            <span class="date"><?php echo format_date($items[$i]->getPubdate()) ?></span>
        <?php echo link_to($items[$i]->getTitle(). ' &rarr;', $items[$i]->getLink(), array(
            'target' => '_blank',
            'class' => 'title',
        )) ?>
        </div>
    <?php endfor ?>
    <p><?php echo link_to(__('Other news') . ' &rarr;', 'news') ?></p>
</div>