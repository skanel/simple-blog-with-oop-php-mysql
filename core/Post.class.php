<?php

class Post extends BaseTable {

    var $title = null;
    var $content = null;
    var $creation_date = null;
    var $table = "posts";
    var $comments = array();

    public function getPosts() {
        $dbo = Db::getInstance();
        $sql = "
                SELECT * FROM 
                    {$this->table} AS p
                ORDER BY p.creation_date DESC Limit 5
            ";

        $dbo->doQuery($sql);
        $postList = array();
        while ($row = $dbo->loadObjectList()) {
            $postList[] = $row;
        }
        return $postList;
    }

}

?>
