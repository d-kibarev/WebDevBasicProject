<?php

class HomeController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Movie forum";
        $this->db = new HomeModel();
    }

    public function index($page=0, $items=5){
        //$this->questions = $this->db->getAll();
        $this->page = $page;
        $this->items = $items;
        $this->questions = $this->db->getWithPaging($page, $items);

        $this->renderView();
    }

    public function create(){
        if ($this->isPost) {
            $category_id = $_POST['category-id'];
            $tag_name = $_POST['tag-name'];
            $question_text = $_POST['question-text'];
            $username = $_SESSION['username'];

            if ($this->db->create($category_id, $tag_name, $question_text, $username)) {
                $this->addInfoMessage("Question created.");
                $this->redirectToUrl('/');
            } else {
                $this->addErrorMessage("Error creating question.");
            }
        }

        $this->categories = $this->db->getCategories();
        $this->renderView(__FUNCTION__,false);
    }
}