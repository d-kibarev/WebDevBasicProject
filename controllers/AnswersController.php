<?php

class AnswersController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Answers";
        $this->db = new AnswersModel();
    }

    public function index($question_id) {

        $this->currentQuestionId = $question_id;
        $this->answers = $this->db->getAll($question_id);

        $this->renderView();
    }

    public function create($question_id) {
        if ($this->isPost) {
            $answer_text = $_POST['answer-text'];

            if ($this->db->createAnswer($answer_text, $question_id)) {
                $this->addInfoMessage("Answer created.");
                $this->redirectToUrl('/');
            } else {
                $this->addErrorMessage("Error creating answer.");
            }
        }

        $this->renderView(__FUNCTION__);
    }
}