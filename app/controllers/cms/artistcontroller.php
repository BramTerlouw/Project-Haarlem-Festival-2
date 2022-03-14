<?php

namespace Controllers;
namespace Controllers\Cms;

use Controllers\Controller;
use Services\Cms\ArtistService;

class ArtistController extends Controller{
    
    private $artistService;
    function __construct()
    {
        $this->artistService = new ArtistService();
    }
}
?>