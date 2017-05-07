<?php

namespace Tests;

use Dotenv\Dotenv;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $env = new Dotenv(__DIR__.'/../');
        $env->load('.env.travis');

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
