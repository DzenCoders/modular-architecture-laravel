<?php

namespace App\Services\StateMachine;

use Modules\Document\Models\Document;

interface Command
{

    /**
     * @param Document $document
     * @return Document
     */
    public function execute(Document $document);

}