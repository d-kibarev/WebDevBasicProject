<?php

class AnswersModel extends BaseModel {
    public function getAll($question_id) {
        $statement = self::$db->query(
            "SELECT * FROM answers WHERE question_id = $question_id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function createAnswer($text, $question_id) {
        if ($text == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO answers (content, user_id, question_id, record_date)
              VALUES(?, 1, ?, now())");
        $statement->bind_param("si", $text, $question_id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}
