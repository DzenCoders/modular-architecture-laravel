<?php

namespace App\Providers;

use App\Services\StateMachine\StateMachine;
use Illuminate\Support\ServiceProvider;

class StateMachineProvider extends ServiceProvider
{

    protected $defer = true;

    public function register()
    {
        $this->app->bind(StateMachine::class, StateMachine::class);
        require_once __DIR__ . '/../Injections/commandsStateMachine.php';
    }

}