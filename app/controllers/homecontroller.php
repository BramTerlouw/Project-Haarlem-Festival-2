<?php
namespace Controllers;
use Controllers\Controller;

use Services\Website\CulinaryService;
use Services\Cms\ArtistService;

class HomeController extends Controller {

    private $artistService;
    private $culinaryService;
    function __construct()
    {
        $this->artistService = new ArtistService();
        $this->culinaryService = new CulinaryService();
    }


    // ## index function of homepage
    public function index() {
        require __DIR__ . '/../views/home/index.php';
    }


    // ## fetch slider data
    public function fetchSliderData() {
        $elements = array_merge($this->getSliderRestaurants(), $this->getSliderDance());
        echo json_encode($elements);
    }


    // ## get slider restaurants
    public function getSliderRestaurants() {
        return $this->culinaryService->getManyFromArr();
    }


    // ## get slider dance event items
    public function getSliderDance() {
        return $this->artistService->getManyFromArr();
    }
}
?>