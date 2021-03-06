<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\CurrencyRendererHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

class CurrencyRendererHelperTest extends TestCase{
    public $helper = null;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $view = new View();
        $this->helper = new CurrencyRendererHelper($view);
    }
    
    public function testUsd(){
        $this->assertEquals('USD 5.30', $this->helper->usd(5.30));
        $this->assertEquals('USD 1.00', $this->helper->usd(1));
        $this->assertEquals('USD 2.05', $this->helper->usd(2.05));
        $this->assertEquals('USD 12,000.70', $this->helper->usd(12000.70));
    }
}
?>