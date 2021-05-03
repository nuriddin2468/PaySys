<?php

namespace app\classes;

class Transaction
{

    private $customer;
    private $seller;
    private $amount;
    private $price;

    public function __toString()
    {
        return 'Покупатель ' . $this->customer . ' купил у ' . $this->seller . ' товар в количестве '
            . $this->amount . ' по цене ' . $this->price . "\n";
    }

    /**
     * Transaction constructor.
     * @param string $customer
     * @param string $seller
     * @param int $amount
     * @param float $price
     */
    public function __construct(string $customer, string $seller, int $amount, float $price)
    {
        $this->customer = $customer;
        $this->seller = $seller;
        $this->amount = $amount;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * @param string $customer
     */
    public function setCustomer(string $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return string
     */
    public function getSeller(): string
    {
        return $this->seller;
    }

    /**
     * @param string $seller
     */
    public function setSeller(string $seller)
    {
        $this->seller = $seller;
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
    public function setAmount(int $amount)
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
}