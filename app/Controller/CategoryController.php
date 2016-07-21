<?php
namespace Controller;
use \Manager\CategoryManager;
use \W\Controller\Controller;

class CategoryController extends Controller
{
    public function manage(){
        $categoryManager = new CategoryManager();
        $categoryList = $categoryManager->findAll();
        $this->show('user/admin/manageCategory', array('categoryList' => $categoryList));
    }

    public function managePost(){
        $categoryManager = new CategoryManager();
        $catName = $_POST['catName'];
        $data = array('cat_name' => $catName);
        if (isset($_POST['add'])) {
            if (strlen($catName) > 3) {
                $categoryManager->insert($data);
                $_SESSION['successList'][] = 'Catégorie '.$catName.' ajoutée!';
            }
            else{
                $_SESSION['errorList'][] = 'Une erreur s\'est produite lors de l\'ajout.';
            }
            $this->redirectToRoute('category_manage');
        }
        $id = $_POST['catId'];
        if (isset($_POST['delete'])) {
            $categoryManager->delete($id);
            $catName = $_POST['catName'];
            $_SESSION['successList'][] = 'Catégorie '.$catName.' supprimée!';
            $this->redirectToRoute('category_manage');
        }
         if (isset($_POST['modify'])) {
                if (strlen($catName) > 3) {
                    $_SESSION['successList'][] = 'Catégorie '.$catName.' modifiée!';
                    $categoryManager->update($data,$id);
                }
                else{
                    $_SESSION['errorList'][] = 'Une erreur s\'est produite lors de la modification.';
                }
            $this->redirectToRoute('category_manage');
        }
    }

    public function modify($id){
        $categoryManager = new CategoryManager();
        $singleCategory = $categoryManager->find($id);
        $this->show('user/admin/modifyCategory', array('singleCategory' => $singleCategory));
    }

    public function modifyPost($id){
        $categoryManager = new CategoryManager();
        $singleCategory = $categoryManager->find($id);
        $catName = $_POST['catName'];
        $data = array(
            'cat_name' => $catName
        );
        $id=$_POST['catId'];
        if (!empty($_POST)) {
            $categoryManager->update($data,$id);
        }
        $this->redirectToRoute('category_modify', ['id' => $singleCategory['id']]);
    }
}
?>