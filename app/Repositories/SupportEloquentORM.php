<?php

namespace App\Repositories;

use App\Repositories\SupportRepository;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Models\Support;

class SupportEloquentORM implements SupportRepository
{
    public function __construct(
        protected Support $model
    ) {}

    public function getAll(string $filter = null)
    {
        return $this->model->where(function ($query) use ($filter) {
                          if($filter) {
                            $query->where('subject', 'LIKE', "%{$filter}%");
                            $query->orWhere('body', 'LIKE', "%{$filter}%");
                          }
                        })->get()
                          ->toArray();
    }

    public function findOne(string $id)
    {
        return $this->model->find($id);
    }

    public function delete(string $id)
    {
        return $this->model->find($id)->delete();
    }

    public function new(CreateSupportDTO $dto)
    {
        $support = $this->model->create(
            (array) $dto
        );

        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $dto)
    {
        $support = Support::find($dto->id);
        if(isset($support) && $support != null) {
            $support->update((array)$dto);

            return (object) $support->toArray();
        } else {
            return null;
        }
    }
}
