<?php

class AnswersModel extends BaseModel {
    public function getAll($question_id) {
        $statement = self::$db->query(
            "SELECT content, username FROM forum.answers AS a
              JOIN forum.users AS u ON u.id = a.user_id
              WHERE question_id = $question_id
              ORDER BY a.record_date");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function createAnswer($text, $question_id, $user_id) {
        if ($text == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO answers (content, user_id, question_id, record_date)
              VALUES(?, ?, ?, now())");
        $statement->bind_param("sii", $text, $user_id, $question_id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}
