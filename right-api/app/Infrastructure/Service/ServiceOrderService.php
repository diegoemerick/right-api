<?php
/**
 * Created by PhpStorm.
 * User: diegoemerick
 * Date: 14/11/17
 * Time: 17:07
 */

namespace App\Infrastructure\Service;

use App\Domain\Model\ServiceOrder;
use App\Domain\Service\ServiceOrderServiceInterface;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;

class ServiceOrderService implements ServiceOrderServiceInterface
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getOffersByOrder($orderId)
    {
        $res = $this->client->post(
            ServiceOrder::URL . '/offer/' . $orderId
        )->getBody()->getContents();

        return json_decode($res);
    }

    public function createOffer($orderId, $lawyerId)
    {
        $res = $this->client->post(
            ServiceOrder::URL . '/offer/', [
                'form'=> [
                    'lawyer_id' => $lawyerId,
                    'order_id' => $orderId
                ]
            ]
        )->getBody()->getContents();

        return json_decode($res);
    }

    public function createOrder($order)
    {
        $res = $this->client->post(
            ServiceOrder::URL . '/order'
        )->getBody()->getContents();

        return json_decode($res);
    }

    public function getOrders($companyId)
    {
        $res = $this->client->get(
            ServiceOrder::URL . '/order/'
        )->getBody()->getContents();

        return json_decode($res);
    }
}