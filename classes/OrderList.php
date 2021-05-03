<?php

namespace app\classes;

class OrderList
{
    private $customers = [];

    /**
     * @return array
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }

    /**
     * @return array
     */
    public function getSellers(): array
    {
        return $this->sellers;
    }

    private $sellers = [];
    private $transactions = [];

    public function push_order(Order $order)
    {
        if ($order->getOperationType()) {
            $this->customers[] = $order;
        } else {
            $this->sellers[] = $order;
            $this->bubbleSort($this->sellers);
        }
    }

    public function get_spread(): float
    {
        $cost = -1;
        foreach ($this->customers as $customer) {
            if ($customer->getPrice() > $cost) {
                $cost = $customer->getPrice();
            }
        }
        return $cost - $this->sellers[0]->getPrice();
    }

    public function process(): array
    {
        foreach ($this->customers as $c => $customer) {
            foreach ($this->sellers as $s => $seller) {
                if ($seller->getAmount() > $customer->getAmount()) {
                    $seller->setAmount($seller->getAmount() - $customer->getAmount());
                    $this->transactions[] = new Transaction($customer->getName(), $seller->getName(), $customer->getAmount(), $seller->getPrice());
                    unset($this->customers[$c]);
                    break;
                } elseif ($seller->getAmount() < $customer->getAmount()) {
                    $customer->setAmount($customer->getAmount() - $seller->getAmount());
                    $this->transactions[] = new Transaction($customer->getName(), $seller->getName(), $seller->getAmount(), $seller->getPrice());
                    unset($this->sellers[$s]);
                } else {
                    $this->transactions[] = new Transaction($customer->getName(), $seller->getName(), $seller->getAmount(), $seller->getPrice());
                    unset($this->sellers[$s]);
                    unset($this->customers[$c]);
                    break;
                }
            }
        }
        return $this->transactions;
    }

    private function bubbleSort(&$arr): void
    {
        $n = sizeof($arr);

        // Traverse through all array elements
        for ($i = 0; $i < $n; $i++) {
            // Last i elements are already in place
            for ($j = 0; $j < $n - $i - 1; $j++) {
                // traverse the array from 0 to n-i-1
                // Swap if the element found is greater
                // than the next element
                if ($arr[$j]->getPrice() > $arr[$j + 1]->getPrice()) {
                    $t = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $t;
                }
            }
        }
    }
}