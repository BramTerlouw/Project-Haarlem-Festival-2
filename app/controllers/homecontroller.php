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

    public function index() {
        require __DIR__ . '/../views/home/index.php';
    }

    public function fetchSliderData() {
        $elements = array_merge($this->getSliderRestaurants(), $this->getSliderDance());
        echo json_encode($elements);
    }

    public function getSliderRestaurants() {
        return $this->culinaryService->getManyFromArr();
    }

    public function getSliderDance() {
        return $this->artistService->getManyFromArr();
    }
}
?>