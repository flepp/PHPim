<?php
namespace Controller;
use \Manager\CategoryManager;
use \W\Controller\Controller;

class CategoryController extends Controller
{
    public function category(){
        $categoryManager = new CategoryManager();
        $categoryList = $categoryManager->findAll();
        $this->show('user/admin/addQuiz', array('categoryList' => $categoryList));
    }
}
?>