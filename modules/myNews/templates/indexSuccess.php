<?php
/**
 * index
 */
?>

<h1><?php echo __('News') ?></h1>

<?php include_partial('myNews/list', array('feed' => $feed)) ?>