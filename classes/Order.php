<?php

namespace app\classes;

class Order
{
    private $operationType;  // 0 - seller 1 - customer
    private $amount;
    private $price;
    private $name;

    public function __toString()
    {
        $type = 'Продавец';
        if ($this->operationType) {
            $type = 'Покупатель';
        }
        return $type . ' ' . $this->name . ' | объём валюты: ' . $this->amount . ' | по цене: ' . $this->price . "\n";
    }

    /**
     * Order constructor.
     * @param boolean $operationType
     * @param int $amount
     * @param float $price
     * @param string $name
     */
    public function __construct(bool $operationType, int $amount, float $price, string $name)
    {
        $this->operationType = $operationType;
        $this->amount = $amount;
        $this->price = $price;
        $this->name = $name;
    }


    /**
     * @return boolean
     */
    public function getOperationType(): bool
    {
        return $this->operationType;
    }

    /**
     * @param boolean $operationType
     */
    public function setOperationType(bool $operationType): void
    {
        $this->operationType = $operationType;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }


}