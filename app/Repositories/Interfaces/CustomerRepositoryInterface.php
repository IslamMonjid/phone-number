<?php
namespace App\Repositories\Interfaces;




interface CustomerRepositoryInterface
{
   public function getPaginatedPhoneNumbers($per_page);
   public function all();
}