<?php

class ArticleController extends Controller{
    
    function index(){
        echo 'IndexController -> index action';
    }
    
    function view($id){
        $article = Load::model("articles");
        $row = $article->get_row('*' , " id = $id ");
        $this->view->set('data',$row);
        $this->view->render('view');
    }
}