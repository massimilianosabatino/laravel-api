<?php

namespace App\Functions;



class RssReader
{
     /**
     * Get feed from an url
     *
     * Create an array from a feed rss.
     * TO-DO:
     * - Output type
     * - Add multiple input
     * - remove tag in description
     * - use oop
     * @param String $url Feed rss url
     * @param int $elementNumber Number of element to extract from feed
     * @return array $list Return an array with single news
     */
    public static function readUrl(String $url, int $elementNumber)
    {
        $list = [];

        //$url = "https://feed.laravel-news.com/";

        $invalidurl = false;
        if (@simplexml_load_file($url)) {
            $feeds = simplexml_load_file($url);
        } else {
            $invalidurl = true;
            var_dump('Invalid RSS feed URL:' . $url);
        }

        $i = 0;

        if (!empty($feeds)) {
            foreach ($feeds->channel->item as $item) {

                $title = $item->title;
                $link = $item->link;
                $description = $item->description;
                $postDate = $item->pubDate;
                $pubDate = date('D, d M Y', strtotime($postDate));
                
                
                $news = array (
                    'name' => $title,
                    'description' => $description,
                    'link' => $link,
                    'pubDate' => $pubDate
                );

                if ($i >= $elementNumber) break;

                // echo "<h3>$title</h3>";
                // echo "<div class=\"news-description\">$description</div>";
                // echo "<div><a href=\"$link\">leggi la notizia</a> <span class=\"news-date\">$pubDate</span></div>";
                
                $i++;
                $list[] = $news;
            }
        } else {
            if (!$invalidurl) {
                echo "<h3>No item found</h3>";
            }
        }
        return $list;
    }
}
