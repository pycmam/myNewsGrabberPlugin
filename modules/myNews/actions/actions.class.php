<?php

class myNewsActions extends myActions
{
    public function executeIndex($request)
    {
        $grabber = new myNewsGrabber(sfConfig::get('app_news_feed_url'));
        $this->feed = $grabber->getFeed();
    }
}