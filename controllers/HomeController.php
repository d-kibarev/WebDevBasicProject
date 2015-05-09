<?php

class HomeController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Movie forum";
        $this->db = new HomeModel();
    }

    public function index(){

        $this->questions = $this->db->getAll();

        $this->renderView();
    }

    public function create(){
        if ($this->isPost) {
            $category_name = $_POST['category-name'];
            $tag_name = $_POST['tag-name'];
            $question_text = $_POST['question-text'];
            $username = $_SESSION['username'];

            if ($this->db->create($category_name, $tag_name, $question_text, $username)) {
                $this->addInfoMessage("Question created.");
                $this->redirectToUrl('/');
            } else {
                $this->addErrorMessage("Error creating question.");
            }
        }

        $this->renderView(__FUNCTION__);
    }
}