<?php

class HomeModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query(
            "SELECT q.*, c.name, u.username FROM questions as q
              JOIN categories as c on c.id = q.category_id
              JOIN users as u on u.id = q.user_id
              ORDER BY q.record_date DESC");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getWithPaging($page, $count_per_page) {
        $page = $count_per_page.$page;
        $statement = self::$db->query(
            "SELECT q.*, c.name, u.username FROM questions as q
              JOIN categories as c on c.id = q.category_id
              JOIN users as u on u.id = q.user_id
              ORDER BY q.record_date DESC
              LIMIT $page, $count_per_page");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function create($category_name, $tag_name, $text, $username) {
        if ($text == '') {
            return false;
        }
        $user_id = "(select id from users where username='$username')";
        $statement = self::$db->prepare(
            "INSERT INTO questions (content, user_id, record_date, category_id, tag_id)
             VALUES(?, $user_id, now(), 1, 1)");
        $statement->bind_param("s", $text);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}
