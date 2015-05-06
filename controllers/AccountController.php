<?php

class AccountController extends BaseController {
    private $db;

    public function onInit() {
        $this->db = new AccountModel();
    }

    public function register(){
        if($this->isPost){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $isRegister = $this->db->register($username, $password);
            if($isRegister) {
                $this->redirect("books", "index");
            }
            else{
                $this->addErrorMessage("Registration failed!");
            }
        }

        $this->renderView(__FUNCTION__);
    }

    public function login(){
        if($this->isPost){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $isLogin = $this->db->register($username, $password);
            if($isLogin) {
                $this->redirect("home", "index");
            }
            else{
                $this->addErrorMessage("Login failed!");
            }
        }

        $this->renderView(__FUNCTION__);
    }

    public function logout(){

    }
}