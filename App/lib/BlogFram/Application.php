<?php
namespace BlogFram;

abstract class Application
{
    protected $httpRequest;
    protected $httpResponse;
    protected $name;

    public function __construct()
    {
        $this->httpRequest = new HTTPRequest;
        $this->httpResponse = new HTTPResponse;
        $this->name = '';
    }

    public function getController()
    {
        $router = new Router();

        $xml = new \DOMDocument();
        $xml->load(__DIR__. '/../../Config/routes.xml');

        $routes = $xml->getElementsByTagName('route');

        foreach ($routes as $route) {
            $vars = [];

            if($route->hasAttribute('vars')){
                $vars = explode(',', $route->getAttribute('vars'));
            }

            $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
        }

        try {
           $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
        } catch (Exception $e) {
          if($e->getCode() == Router::NO_ROUTE)
          {
              $this->httpResponse->redirect404();
          }
        }

        $_GET = array_merge($_GET, $matchedRoute->vars());
        $controllerClass = 'App\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';

        return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
    }


    abstract public function run();

    public function httpRequest()
    {
        return $this->httpRequest;
    }

    public function httpResponse()
    {
        return $this->httpResponse;
    }

    public function name()
    {
        return $this->name;
    }
}