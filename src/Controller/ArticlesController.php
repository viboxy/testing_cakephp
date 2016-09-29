<?php
namespace App\Controller;

class ArticlesController extends AppController{
    
    //public $helpers = ['Form', 'Html'];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    
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
        $articles = $this->Articles->find('all');
        $this->set(compact('articles'));
    }

    public function view($id = null){
        $article = $this->Articles->get($id);
        echo $article;
        $this->set(compact('article'));
    }
    
    public function add(){
        $article = $this->Articles->newEntity();
        if($this->request->is('post')){
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if($this->Articles->save($article)){
                $this->Flash->success(__('Your article has been saved'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article'));
        }
        $this->set('article', $article);
    }
}