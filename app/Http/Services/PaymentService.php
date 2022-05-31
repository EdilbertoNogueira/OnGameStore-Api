<?php 

namespace App\Http\Services;

use App\Http\Repositories\PaymentRepository\PaymentRepository;

class PaymentService
{

    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        
        $this->paymentRepository = $paymentRepository;

    }


    public function store($params)
    {
        
        $this->paymentRepository->store($params);

    }

}