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

            if($username == null || strlen($username) < 3){
                $this->addErrorMessage("Username should be longest than 2 symbols!");
            }
            $isRegister = $this->db->register($username, $password);
            if($isRegister) {
                $_SESSION['username'] = $username;
                $this->redirect("home", "index");
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

            $isLogin = $this->db->login($username, $password);
            if($isLogin) {
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Successful login!");
                $this->redirect("home", "index");
            }
            else{
                $this->addErrorMessage("Login failed!");
            }
        }

        $this->renderView(__FUNCTION__);
    }

    public function logout(){

        unset($_SESSION['username']);
        $this->addInfoMessage("Successful logout!");
        $this->redirectToUrl("/");
    }
}