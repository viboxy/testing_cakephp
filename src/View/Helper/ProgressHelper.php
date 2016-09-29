<?php
namespace App\View\Helper;

use Cake\View\Helper;

class ProgressHelper extends Helper{
    public function bar($value){
        $width = round($value/100, 2) * 100;
        return sprintf(
            '<div class="progress-container">
                <div class="progress-bar" id="b" style="width: %s%%"></div>
            </div>', $width);
    }
    
    public function value($value){
        return $value;
    }
    
    public function echoCheck(){
        return 'echo statement';
    }
}