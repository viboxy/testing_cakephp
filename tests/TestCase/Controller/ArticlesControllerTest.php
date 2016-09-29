<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

class ArticlesControllerTest extends IntegrationTestCase{
    public $fixtures = ['app.articles'];

    public function testIndex(){
        $this->get('/articles');
        $this->assertResponseOk();
    }
    
    public function testIndexQueryData(){
        $this->get('/articles?page=1');
        $this->assertResponseOk();
        //$this->markTestIncomplete('incomplete');
    }
    
    public function testIndexShort(){
        $this->get('/articles/index/short');
        $this->assertResponseOk();
        $this->assertResponseContains('Articles');
    }
    
    /*public function testIndexPostData(){
        $data = [
            'user_id' => 1,
            'published' => 1,
            'slug' => 'new-article',
            'title' => 'New Article',
            'body' => 'New Body'
        ];
        $this->post('/articles', $data);
        
        $this->assertResponseSuccess();
        $articles = TableRegistry::get('Articles');
        $query = $articles->find()->where(['title' => $data['title']]);
        $this->assertEquals(1, $query->count());
    }*/
}