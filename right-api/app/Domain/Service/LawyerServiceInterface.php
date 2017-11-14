<?php
/**
 * Created by PhpStorm.
 * User: diegoemerick
 * Date: 14/11/17
 * Time: 17:11
 */

namespace App\Domain\Service;

interface LawyerServiceInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getLawyer($id);

    /**
     * @return mixed
     */
    public function getLawyers();
}