<?php

interface ExchangeInterface
{
    public function currencyConversion();
    public function symbol($money);
}

class DollerExchange implements ExchangeInterface
{
    private $yen = 0;
    private $rate = 1.104;
    private $symbol = "USD";

    public function __construct($yen)
    {
        $this->yen = $yen;
    }

    public function currencyConversion()
    {
        return $this->yen * $this->rate;
    }

    public function symbol($money)
    {
        return sprintf('%s %.2f', $this->symbol, $money);
    } 
}

class PoundExchange implements ExchangeInterface
{
    private $yen = 0;
    private $rate = 1.546;
    private $symbol = "GBP";

    public function __construct($yen)
    {
        $this->yen = $yen;
    }

    public function currencyConversion()
    {
        return $this->yen * $this->rate;
    }

    public function symbol($money)
    {
        return sprintf('%s %.2f', $this->symbol, $money);
    } 
}

class EuroExchange implements ExchangeInterface
{
    private $yen = 0;
    private $rate = 1.333;
    private $symbol = "EUR";

    public function __construct($yen)
    {
        $this->yen = $yen;
    }

    public function currencyConversion()
    {
        return $this->yen * $this->rate;
    }

    public function symbol($money)
    {
        return sprintf('%s %.2f', $this->symbol, $money);
    } 
}

$jpy = 1000;

$doller = new DollerExchange($jpy);
$pound = new PoundExchange($jpy);
$euro = new EuroExchange($jpy);

echo $doller->symbol($doller->currencyConversion());
echo "<br>";
echo $pound->symbol($pound->currencyConversion());
echo "<br>";
echo $euro->symbol($euro->currencyConversion());
echo "<br>";


?>