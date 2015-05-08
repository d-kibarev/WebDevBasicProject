<?php

class HomeModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query(
            "SELECT q.*, c.name FROM questions as q JOIN categories as c on c.id = q.category_id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function createQuestion($category_name, $tag_name, $text) {
        if ($text == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO questions (content, user_id, record_date, category_id, tag_id) VALUES(?, 1, now(), 1, 1)");
        $statement->bind_param("s", $text);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function deleteAuthor($id) {
        $statement = self::$db->prepare(
            "DELETE FROM authors WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}
