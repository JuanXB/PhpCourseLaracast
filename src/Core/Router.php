<?php
namespace Core;

use Core\Middleware\Middleware;

class Router
{

    protected array $routes = [];

    protected function add(string $uri, string $controller, string $method): Router
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ]; 

        return $this;

    }

    public function get(string $uri, string $controller): Router
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post(string $uri, string $controller): Router
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function delete(string $uri, string $controller): Router
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function path(string $uri, string $controller): Router
    {
        return $this->add($uri, $controller, 'PATH');
    }

    public function put(string $uri, string $controller): Router
    {
        return $this->add($uri, $controller, 'PUT');
    }

    public function only(string $key) : Router
    {
        $key = strtolower($key);

        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        
        return $this;
    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                
                Middleware::resolve($route['middleware']);
                
                
                return require base_path('Http/Controllers/'.$route['controller']);
            }
        }

        abort();
    }



}

