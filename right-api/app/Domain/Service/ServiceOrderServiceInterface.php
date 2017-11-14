<?php
/**
 * Created by PhpStorm.
 * User: diegoemerick
 * Date: 14/11/17
 * Time: 17:11
 */

namespace App\Domain\Service;

interface ServiceOrderServiceInterface
{
    /**
     * @param $order
     * @return mixed
     */
    public function createOrder($order);

    /**
     * @param $companyId
     * @return mixed
     */
    public function getOrders($companyId);
}