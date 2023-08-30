<?php

class Basket {
    private $catalogue = [];
    private $deliveryRules = [];
    private $offers = [];
    private $basket = [];

    public function __construct($catalogue, $deliveryRules, $offers) {
        $this->catalogue = $catalogue;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
    }

    public function add($productCode) {
        array_push($this->basket, $productCode);
    }

    public function total() {
        $total = 0;
        $redWidgetCount = 0;
        
        foreach ($this->basket as $item) {
            $total += $this->catalogue[$item];
            
            if ($item == 'R01') {
                $redWidgetCount++;
                if ($redWidgetCount % 2 == 0) {
                    $total -= $this->catalogue[$item] / 2;
                }
            }
        }
        
        foreach ($this->deliveryRules as $rule) {
            if ($total >= $rule['min']) {
                $delivery = $rule['cost'];
            }
        }
        
        return $total + $delivery;
    }
}

$catalogue = [
    'R01' => 32.95,
    'G01' => 24.95,
    'B01' => 7.95
];

$deliveryRules = [
    ['min' => 90, 'cost' => 0],
    ['min' => 50, 'cost' => 2.95],
    ['min' => 0, 'cost' => 4.95]
];

$offers = [
    'R01' => ['buy' => 1, 'get' => 0.5]
];

$basket = new Basket($catalogue, $deliveryRules, $offers);

$basket->add('B01');
$basket->add('G01');

echo $basket->total();
?>
