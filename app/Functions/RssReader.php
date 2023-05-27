<?php

namespace App\Functions;

class RssReader
{
    public static function readUrl()
    {
///DA TESTARE
        $url = "https://www.ansa.it/sito/ansait_rss.xml";
        if (isset($_POST['submit'])) {
            if ($_POST['feedurl'] != '') {
                $url = $_POST['feedurl'];
            }
        }

        $invalidurl = false;
        if (@simplexml_load_file($url)) {
            $feeds = simplexml_load_file($url);
        } else {
            $invalidurl = true;
            echo "<h2>Invalid RSS feed URL.</h2>";
        }

        $i = 0;
        if (!empty($feeds)) {

            $site = $feeds->channel->title;
            $sitelink = $feeds->channel->link;

            echo "<h2>" . $site . "</h2>";
            foreach ($feeds->channel->item as $item) {

                $title = $item->title;
                $link = $item->link;
                $description = $item->description;
                $postDate = $item->pubDate;
                $pubDate = date('D, d M Y', strtotime($postDate));

                if ($i >= 5) break;

                echo $link; ?>"><?php echo $title;
                echo $pubDate;

                implode(' ', array_slice(explode(' ', $description), 0, 20)) . "...";
                echo $link;


                $i++;
            }
        } else {
            if (!$invalidurl) {
                echo "<h2>No item found</h2>";
            }
        }
    }
}
