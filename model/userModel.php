<?php
require_once PROJECT_ROOT_PATH . "/model/database.php";
 
class UserModel extends Database
{
    public function getNews($limit, $topic)
    {
        if ($topic == "") {
          return $this->select("SELECT * FROM news_data ORDER BY id DESC LIMIT ?", ["i", $limit]);

        }
        else {
          $topic = "%".$topic."%";
          return $this->select("SELECT * FROM news_data  WHERE topic LIKE ? ORDER BY id DESC LIMIT ?", ["si", $topic, $limit]);
        }
        
    }
}