<?php
namespace App\View\Helper;

use Cake\View\Helper;

class CurrencyRendererHelper extends Helper{
    public function usd($amount){
        return'USD '.number_format($amount, 2, '.', ',');
    }
}
?>