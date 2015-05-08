<?php

class HomeController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Questions";
        $this->db = new HomeModel();
    }

    public function index(){

        $this->questions = $this->db->getAll();

        $this->renderView();
    }

}