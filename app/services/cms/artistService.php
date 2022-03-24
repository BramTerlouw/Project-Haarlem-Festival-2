<?php

namespace Services\Cms;

use Repositories\Cms\ArtistRepository;

class ArtistService {
    private $repository;

    function __construct() {
        $this->repository = new ArtistRepository();
    }


    // ## get all performers
    public function getAll() {
        return $this->repository->getAll();
    }


    // ## get specific performers for event
    public function getMany($id) {
        return $this->repository->getMany($id);
    }


    // ## get random performers for home page
    public function getManyFromArr() {
        return $this->repository->getManyFromArr();
    }

    // ## update artist
    public function updateOne($id, $name, $desc, $type) {
        $this->repository->updateOne($id, $name, $desc, $type);
    }

    // ## insert artist
    public function insertOne($name, $desc, $type) {
        $this->repository->insertOne($name, $desc, $type);
    }

    // ## delete artist
    public function deleteOne($id) {
        $this->repository->deleteOne($id);
    }
}