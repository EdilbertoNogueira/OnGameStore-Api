<?php 

namespace App\Http\Repositories\PaymentRepository;

use App\Models\Payments;

class PaymentRepository implements PaymentInterface
{

    public function store($params)
    {

        $params = (Object) $params;

        $payment = new Payments;

        $payment->payment = $params->payment;

        return $payment->save();

    }

}