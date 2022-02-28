<?php
// ServiceProvider 처리한다.

namespace Eclair;

use Elciar\Support\ServiceProvider;

class Application {

    private $providers = [];

    public function __construct($providers = []) {
        $this->provider = $providers;
        array_walk($this->providers, fn ($providers) => $providers::register());
    }

    
    public function boot() {
        array_walk($this->providers, fn ($provider) => $provider::boot());
    }
}





?>