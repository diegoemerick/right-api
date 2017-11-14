<?php

namespace App\Http\Controllers;

use App\Infrastructure\Service\CompanyService;
use App\Infrastructure\Service\LawyerService;
use App\Infrastructure\Service\ServiceOrderService;
use Illuminate\Http\Request;

class YourRightsController extends Controller
{
    private $companyService;
    private $lawyerService;
    private $orderService;

    public function __construct
    (
        CompanyService $companyService,
        LawyerService $lawyerService,
        ServiceOrderService $orderService
    )
    {
        $this->companyService = $companyService;
        $this->lawyerService = $lawyerService;
        $this->orderService = $orderService;
    }

    public function createOrder(Request $request)
    {
        if (! $request->get('form')) {
            throw new \Exception('Invalid params');
        }
        return $this->orderService->createOrder($request->get('form'));
    }

    public function createOffer($orderId, $lawyerId)
    {
        return $this->orderService->createOffer($orderId, $lawyerId);
    }

    public function getOffersByOrder($orderId)
    {
        return $this->orderService->getOffersByOrder($orderId);
    }

    public function getOrder($companyId)
    {
        if (! $companyId) {
            throw new \Exception('Company not send');
        }

        $company = $this->companyService->getCompany($companyId);
        if (! $company) {
            throw new \Exception('Company not found');
        }

        return $this->orderService->getOrders($companyId);
    }

    public function getCompanies()
    {
        return $this->companyService->getCompanies();
    }

    public function getLawyers()
    {
        return $this->lawyerService->getLawyers();
    }
}
