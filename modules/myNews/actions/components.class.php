<?php

class myNewsComponents extends sfComponents
{
    public function executeList()
    {
        $grabber = new myNewsGrabber(sfConfig::get('app_news_feed_url'));
        $this->feed = $grabber->getFeed();
    }

    public function executePopular()
    {
        $this->executeList();
    }
}