<?php

namespace Services\Website;
use Repositories\Website\culinaryRepository;

class CulinaryService {

    private $repository;

    function __construct() {
        $this->repository = new culinaryRepository();
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getManyByType($type) {
        return $this->repository->getManyByType($type);
    }

    public function getOne($id) {
        return $this->repository->getOne($id);
    }

    public function getTimespan($id) {
        return $this->repository->getTimespan($id);
    }
    public function getTypes() {
        return $this->repository->getTypes();
    }
}