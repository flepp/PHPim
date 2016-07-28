<?php
namespace Controller;
use \Manager\CategoryManager;
use \W\Controller\Controller;

class CategoryController extends Controller
{
    public function manage(){
        $this->allowTo(['admin']); 
        $categoryManager = new CategoryManager();
        $categoryList = $categoryManager->findAll();
        $this->show('user/admin/manageCategory', array('categoryList' => $categoryList));
    }

    public function managePost(){
        $categoryManager = new CategoryManager();
        $catName = isset($_POST['catName']) ? strip_tags($_POST['catName']) : '';
        $data = array(
            'cat_name' => $catName,
            'cat_created' => date('Y-m-d')
            );
        $dataUpdate = array(
            'cat_name' => $catName,
            'cat_updated' => date('Y-m-d')
            );
        $id = $_POST['catId'];
        if (isset($_POST['add'])) {
            if(empty($catName)) {
                $_SESSION['errorList'][] = 'Le champ ajout est vide.';
            }
            if(!empty($catName) && strlen($catName) < 3){
                $_SESSION['errorList'][] = 'Le champ doit comporter au moins trois caractères';
            }
            if(empty($_SESSION['errorList'])){
                $categoryManager->insert($data);
                $_SESSION['successList'][] = 'Catégorie '.$catName.' ajoutée!';
            }
            $this->redirectToRoute('category_manage');
        }
        if (isset($_POST['delete'])) {
            $categoryManager->delete($id);
            $catName = $_POST['catName'];
            $_SESSION['successList'][] = 'Catégorie '.$catName.' supprimée!';
            $this->redirectToRoute('category_manage');
        }
         if (isset($_POST['modify'])) {
                if (strlen($catName) > 2) {
                    $_SESSION['successList'][] = 'Catégorie '.$catName.' modifiée!';
                    $categoryManager->update($dataUpdate,$id);
                }
                else{
                    $_SESSION['errorList'][] = 'Une erreur s\'est produite lors de la modification.';
                }
            $this->redirectToRoute('category_manage');
        }
    }
}
?>