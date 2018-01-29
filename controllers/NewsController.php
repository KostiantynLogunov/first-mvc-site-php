<?php

include_once ROOT.'/models/News.php';

class NewsController {

    public function actionIndex()
    {
        $newsList = [];
        $newsList = News::getNewsList();

        require_once(ROOT.'/views/news/index.php');

        /*echo '<pre>';
        print_r($newsList);
        echo '</pre>';*/

        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemById($id);

            echo '<pre>';
            print_r($newsItem);
            echo '</pre>';

            echo 'actionView';
        }

        return true;
    }
}
/**
 * Created by PhpStorm.
 * User: Kostiantyn
 * Date: 29.01.2018
 * Time: 0:46
 */