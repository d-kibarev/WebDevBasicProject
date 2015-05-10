<?php
/**
 * Created by PhpStorm.
 * User: Mitaka
 * Date: 10.5.2015 г.
 * Time: 10:48 ч.
 */

class CategoriesModel extends BaseModel{

    public function getCategories() {
        $statement = self::$db->query("SELECT id, name FROM categories");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function create($category_name, $category_description){
        $statement = self::$db->prepare(
            "SELECT COUNT(Id)FROM categories WHERE name = ?");
        $statement->bind_param("s", $category_name);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        if($result["COUNT(Id)"]) {
            return false;
        }

        $createStatement = self::$db->prepare( "INSERT INTO categories (name, description) VALUES (?, ?)" );
        $createStatement->bind_param("ss", $category_name, $category_description);
        $createStatement->execute();

        return true;
    }
}