<?php

class comment extends BaseTable {

    var $id_post;
    var $owner;
    var $comment;
    var $table = "comments";

    public function getCommentsbyPostId($id_post) {
        $id = (int) $id_post;
        $dbo = Db::getInstance();
        $sql = "
		SELECT * FROM
			{$this->table} AS c
		WHERE 
			id_post={$id}
		ORDER BY 
			c.comment
		DESC
		";

        $dbo->doQuery($sql);
        $commentList = array();
        while ($row = $dbo->loadObjectList()) {
            $commentList [] = $row;
        }
        return $commentList;
    }

}
