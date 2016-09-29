<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;

class ArticlesTable extends Table{
    public function findPublished(Query $query, array $options){
        $query->where([
            $this->alias().'.published' => 1
        ]);
        return $query;
    }
}