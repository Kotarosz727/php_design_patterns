<?php

require_once("honda.php");
require_once("toyota.php");

$car_model = [
    1 => "honda",
    2 => "toyota"
];

$target = $car_model[rand(1,2)];

if($target === "honda"){
    $model = new HondaFactory();
} elseif($target == "toyota") {
    $model = new ToyotaFactory();
}

echo sprintf("<h1>Car model:%s</h1>", $target);

$engine = $model->engine();
$engine->add();

$tire = $model->tire();
$tire->add();

$handle = $model->handle();
$handle->add();

?>