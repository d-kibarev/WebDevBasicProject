<?php
/**
 * Created by PhpStorm.
 * User: Mitaka
 * Date: 10.5.2015 г.
 * Time: 10:49 ч.
 */

class CategoriesController extends BaseController {
    private $db;

    public function onInit() {
        $this->db = new CategoriesModel();
    }

    public function index(){
        $this->authorize();
        $this->categories = $this->db->getCategories();
        $this->renderView(__FUNCTION__, false);
    }

    public function create()
    {
        $this->authorize();
        if ($this->isPost) {
            $category_name = $_POST['category-name'];
            $category_description = $_POST['category-description'];

            $isCreated = $this->db->create($category_name, $category_description);
            if ($isCreated) {
                $this->addInfoMessage("Successful creating category!");
                $this->redirectToUrl("/home/index");
            } else {
                $this->addErrorMessage("Category already exists!");
            }
        }
        $this->renderView(__FUNCTION__, false);
    }
}