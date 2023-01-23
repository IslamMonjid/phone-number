<?php

namespace App\Repositories\Eloquent;

use App\Models\Customer;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**      
     * @var Model      
     */  
    protected $model;  

    /**
     * CustomerRepository constructor.
     *
     * @param Customer $model
     */
    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function getPaginatedPhoneNumbers($per_page): Paginator
    {
        return $this->model->simplePaginate($per_page);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
