<?php
/**
 * Created by PhpStorm.
 * User: diegoemerick
 * Date: 14/11/17
 * Time: 17:06
 */

namespace App\Infrastructure\Service;

use App\Domain\Model\Company;
use App\Domain\Service\CompanyServiceInterface;
use GuzzleHttp\Client;

class CompanyService implements CompanyServiceInterface
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getCompany($id)
    {
        $res = $this->client->get(
            Company::URL . '/company/' . $id
        )->getBody()->getContents();

        return json_decode($res);
    }

    public function getCompanies()
    {
        $res = $this->client->get(
            Company::URL . '/company/'
        )->getBody()->getContents();

        return json_decode($res);
    }
}