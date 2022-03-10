<?php
require __DIR__ . '/../repositories/culinaryRepository.php';

class CulinaryService {

    public function getRestaurants($Restaurant_ID, $Name, $Type, $Max_visitors, $Wheelchair_accessible) {
        $repository = new CulinaryRepository();
        return $repository->getRestaurants($Restaurant_ID, $Name, $Type, $Max_visitors, $Wheelchair_accessible);
    }
}