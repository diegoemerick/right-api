<?php
/**
 * Created by PhpStorm.
 * User: diegoemerick
 * Date: 14/11/17
 * Time: 17:06
 */

namespace App\Infrastructure\Service;

use App\Domain\Model\Lawyer;
use App\Domain\Service\LawyerServiceInterface;
use GuzzleHttp\Client;

class LawyerService implements LawyerServiceInterface
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getLawyer($id)
    {
        $res = $this->client->get(
            Lawyer::URL . '/lawyer/' . $id
        )->getBody()->getContents();

        return json_decode($res);
    }

    public function getLawyers()
    {
        $res = $this->client->get(
            Lawyer::URL . '/lawyer/'
        )->getBody()->getContents();

        return json_decode($res);
    }
}