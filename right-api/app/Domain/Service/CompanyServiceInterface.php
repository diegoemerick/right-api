<?php
/**
 * Created by PhpStorm.
 * User: diegoemerick
 * Date: 14/11/17
 * Time: 17:11
 */

namespace App\Domain\Service;

interface CompanyServiceInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getCompany($id);

    /**
     * @return mixed
     */
    public function getCompanies();
}