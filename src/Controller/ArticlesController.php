<?php
namespace App\Controller;

class ArticlesController extends AppController{
    
    public $helpers = ['Form', 'Html'];
    
    public function index($short = null){
        if($this->request->is('post')){
            $article = $this->Articles->newEntity($this->request->data);
            if($this->Article->save($article)){
                return $this->redirect(['action' => 'index']);
            }
        }
        if(!empty($short)){
            $result = $this->Articles->find('all',[
                'fields' => ['id', 'title']
            ]);
        }else{
            $result = $this->Articles->find();
        }
        $this->set([
            'title' => 'Articles',
            'articles' => $result
        ]);
    }
}