<?php

namespace App\Services\StateMachine;

use Illuminate\Support\Facades\App;
use Modules\Document\Models\Document;

class StateMachine
{

    const STATE_CREATE = 'create';
    const STATE_POSTING = 'posting';
    const STATE_CANCEL_POSTING = 'cancelPosting';
    const STATE_DELETE = 'delete';
    const STATE_CANCEL_DELETE = 'cancelDelete';

    public function changeState($state, Document $document)
    {
        $commands = config('transitionMap.' . $document->type . '.' . $state);

        foreach ($commands as $command) {
            $document = App::make($command)->execute($document);
        }

        return $document;
    }

}