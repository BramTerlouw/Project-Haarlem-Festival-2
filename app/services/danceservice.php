<?php
require __DIR__ . '/../repositories/dancerepository.php';

class danceservice {

public function getDanceEvents() {
        $repository = new dancerepository();
        return $repository->getDanceEvents();
    }
}