<?php
require_once PROJECT_ROOT_PATH . "/model/database.php";
 
class UserModel extends Database
{
    public function getNews($limit)
    {
        //return $this->select("SELECT * FROM users ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
        return $this->select("SELECT * FROM news_data ORDER BY id DESC LIMIT ?", ["i", $limit]);
    }
}