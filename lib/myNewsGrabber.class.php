<?php

class myNewsGrabber
{
    protected
        $source = null,
        $timeout = null,
        $feed = null;

    public function __construct($source, $timeout = 3600)
    {
        $this->source = $source;
        $this->timeout = $timeout;
    }

    public function getFeed()
    {
        if (is_null($this->feed)) {
            $this->loadFeed();
        }

        return $this->feed;
    }

    protected function loadFeed()
    {
        $sourcePath = sfConfig::get('sf_cache_dir') . '/feeds/' .
             md5($this->source) . '.txt';

        if (!file_exists($sourcePath) || (time() - filemtime($sourcePath)) > $this->timeout)
        {
            if (!is_dir($sourceDir = dirname($sourcePath))) {
                mkdir($sourceDir);
            }

            $browser = new sfWebBrowser();
            $browser->setUserAgent('sfFeedReader/0.9');

            if($browser->get($this->source)->responseIsError()) {
                $error = 'The given URL (%s) returns an error (%s: %s)';
                $error = sprintf($error, $uri, $browser->getResponseCode(), $browser->getResponseMessage());
                throw new Exception($error);
            }

            file_put_contents($sourcePath, $feedXml = $browser->getResponseText());
        } else {
            $feedXml = file_get_contents($sourcePath);
        }

        $this->feed = sfFeedPeer::createFromXml($feedXml, $this->source);
    }
}