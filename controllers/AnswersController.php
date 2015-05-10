<?php

class AnswersController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Answers";
        $this->db = new AnswersModel();
    }

    public function index($question_id) {
        $this->authorize();
        $_SESSION['question-id'] = $question_id;
        $this->answers = $this->db->getAll($question_id);

        $this->renderView();
    }

    public function create() {
        $this->authorize();
        if ($this->isPost) {
            $answer_text = $_POST['answer-text'];
            $question_id = $_SESSION['question-id'];
            $user_id = $_SESSION['user-id'];

            if ($this->db->createAnswer($answer_text, $question_id, $user_id)) {
                $this->addInfoMessage("Answer created.");
                $this->redirectToUrl("/answers/index/$question_id");
            } else {
                $this->addErrorMessage("Error creating answer.");
            }
        }

        $this->renderView(__FUNCTION__);
    }
}