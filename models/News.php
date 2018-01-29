<?php

class News {

    /**
     * returns single news item with specified id
     * @param integer $id
     */
    public static function getNewsItemById($id) {
        $id = intval($id);
        //query to DB
        //параметри зєднання
        if ($id) {
            /*$host = 'localhost';
            $dbname = 'mvc_site';
            $user = 'root';
            $password = '540232';
            $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);*/

            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM news WHERE id=' . $id);

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }

    /**
     * Returns an array of news items
     */
    public static function getNewsList() {
        //query to DB
        //параметри зєднання
        $db = Db::getConnection();

        $newsList = [];

        $result = $db->query('SELECT id, title, date, short_content FROM news ORDER BY date DESC LIMIT 10');

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;
    }
}
/**
 * Created by PhpStorm.
 * User: Kostiantyn
 * Date: 29.01.2018
 * Time: 17:03
 */