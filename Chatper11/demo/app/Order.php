<?php

namespace App;

use Exception;

class Order
{
    public function charge($amount, $gateway)
    {
        if ($amount <= 0) {
            return new Exception('amount cannot be 0');
        }

        return $amount;
    }
}