<?php
namespace core;

class Router
{

    protected array $routes = [];

    protected function add(string $uri, string $controller, string $method): void
    {
        $this->routes[] = compact('uri', 'controller', 'method');
       
    }

    public function get(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'GET');
    }

    public function post(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'POST');
    }

    public function delete(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'DELETE');
    }

    public function path(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'PATH');
    }

    public function put(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'PUT');
    }

    public function route(string $uri, string $method) 
    {
        foreach ($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
               return require base_path($route['controller']);
            }
        }

        abort();
    }



}

