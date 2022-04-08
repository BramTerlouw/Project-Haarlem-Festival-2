<?php
namespace Routers;
use Exception;


class PatternRouter
{

    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }

    public function route($uri)
    {
        // check if we are requesting an api route
        $website = false;
        $cms = false;
        // $api = false;
        
        if (str_starts_with($uri, "hf/")) {
            $uri = substr($uri, 3);
            $website = true;
        }
        if (str_starts_with($uri, "cms/")) {
            $uri = substr($uri, 4);
            $cms = true;
        }

        // set default controller/method
        $defaultcontroller = 'home';
        $defaultmethod = 'index';

        // ignore query parameters
        $uri = $this->stripParameters($uri);

        // read controller/method names from URL
        $explodedUri = explode('/', $uri);

        if (!isset($explodedUri[0]) || empty($explodedUri[0])) {
            $explodedUri[0] = $defaultcontroller;
        }
        $controllerName = $explodedUri[0] . "controller";

        if (!isset($explodedUri[1]) || empty($explodedUri[1])) {
            $explodedUri[1] = $defaultmethod;
        }
        $methodName = $explodedUri[1];

        // dynamically call relevant controller method
        try {
            $controllerClass = "Controllers\\" . $controllerName;
            if ($website) {
                $controllerClass = "Controllers\\" . "website\\" . $controllerName;
            }

            if ($cms) {
                $controllerClass = "Controllers\\" . "cms\\" . $controllerName;
            }

            $controllerObj = new $controllerClass;
            $controllerObj->{$methodName}();
        } catch (Exception $e) {
            http_response_code(404);
            die();
        }
    }
}
