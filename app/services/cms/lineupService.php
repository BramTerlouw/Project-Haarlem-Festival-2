<?php

namespace Services\Cms;

use Repositories\Cms\LineupRepository;


class LineupService
{

    private $repository;
    function __construct()
    {
        $this->repository = new LineupRepository();
    }


    // get line up
    public function getOne($id)
    {
        return $this->repository->getOne($id);
    }


    // ## update line up
    public function updateLineUp($eventID, $performerArr) {
        foreach ($performerArr as $performer) {
            $this->updateOne($eventID, $performer);
        }
    }
    // update lineup
    public function updateOne($eventID, $performerID)
    {
        $this->repository->updateOne($eventID, $performerID);
    }



    // // ## delete line up item
    public function deleteLineUp($deleteArr) {
        foreach ($deleteArr as $item) {
            $this->deleteOne($item->LineUp_ID);
        }
    }
    // delete line up item
    public function deleteOne($lineupID)
    {
        $this->repository->deleteOne($lineupID);
    }
}
