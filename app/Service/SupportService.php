<?php

namespace App\Service;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Repositories\SupportRepository;

class SupportService
{

    public function __construct(
        protected SupportRepository $repository
    ) {}

    public function getAll(string $filter = null)
    {
        $this->repository->getAll($filter);
    }

    public function findOne(string $id)
    {
        $this->repository->findOne($id);
    }

    public function new (CreateSupportDTO $dto)
    {
        $this->repository->new($dto);
    }

    public function update(UpdateSupportDTO $dto)
    {
        $this->repository->update($dto);
    }

    public function delete(string $id)
    {
        $this->repository->delete($id);
    }
}
