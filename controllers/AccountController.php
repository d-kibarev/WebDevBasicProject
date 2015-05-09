<?php

class AccountController extends BaseController {
    private $db;

    public function onInit() {
        $this->db = new AccountModel();
    }

    public function register()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $pass_confirm = $_POST['pass-confirm'];
            $email = $_POST['email'];

            if ($password != $pass_confirm) {
                $this->addErrorMessage("Password is not confirmed!");
            } else {
                $isRegister = $this->db->register($username, $password, $email);
                if ($isRegister) {
                    $_SESSION['username'] = $username;
                    $this->db->getUserId($username);
                    $this->addErrorMessage("Successful registration!");
                    $this->redirectToUrl("/home/index/0/5");
                } else {
                    $this->addErrorMessage("Registration failed!");
                }
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
                $this->db->getUserId($username);
                $_SESSION['username'] = $username;

                $this->addInfoMessage("Successful login!");
                $this->redirectToUrl("/home/index/0/5");
            }
            else{
                $this->addErrorMessage("Login failed!");
            }
        }
        $this->renderView(__FUNCTION__);
    }

    public function logout(){
        unset($_SESSION['username']);
        unset($_SESSION['user-id']);
        $this->addInfoMessage("Successful logout!");
        $this->redirectToUrl("/");
    }
}