<?php

namespace core;

class Container {
    protected array $bindings;

    public function bind(string $key, $resolver) : void
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolver(string $key) : mixed
    {
        if(! array_key_exists($key, $this->bindings)) {
            throw new \Exception('There is no resolver associated with this '.$key);
        }
        
        $function = $this->bindings[$key];
        
        return $function();
    }


}