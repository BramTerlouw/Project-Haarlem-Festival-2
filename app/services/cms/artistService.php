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
}