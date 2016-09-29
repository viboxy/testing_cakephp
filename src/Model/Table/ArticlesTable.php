<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table{

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator){
        $validator
            ->notEmpty('title')
            ->requirePresence('title')
            ->notEmpty('body')
            ->requirePresence('body');
        echo $validator->count();
        return $validator;
    }

    public function findPublished(Query $query, array $options){
        $query->where([
            $this->alias().'.published' => 1
        ]);
        return $query;
    }
}