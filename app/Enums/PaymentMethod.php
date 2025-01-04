<?php

namespace App\Enums;

enum PaymentMethod: string
{
    // paymentMethod: 'e-money' | 'cod'
    case EMONEY = 'e-money';
    case COD = 'cod';
}
