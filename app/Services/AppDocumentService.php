<?php

namespace App\Services;

use App\Services\StateMachine\StateMachine;
use Modules\Document\DocumentService;

class AppDocumentService
{
    /**
     * @var StateMachine
     */
    private $stateMachine = null;

    /**
     * @var DocumentService
     */
    private $documentService = null;

    /**
     * AppDocumentService constructor.
     * @param StateMachine $stateMachine
     * @param DocumentService $documentService
     */
    public function __construct(StateMachine $stateMachine, DocumentService $documentService)
    {
        $this->setStateMachine($stateMachine)->setDocumentService($documentService);
    }

    /**
     * @return StateMachine
     */
    private function getStateMachine()
    {
        return $this->stateMachine;
    }

    /**
     * @param StateMachine $stateMachine
     * @return AppDocumentService
     */
    private function setStateMachine(StateMachine $stateMachine)
    {
        $this->stateMachine = $stateMachine;
        return $this;
    }

    /**
     * @return DocumentService
     */
    private function getDocumentService()
    {
        return $this->documentService;
    }

    /**
     * @param DocumentService $documentService
     * @return AppDocumentService
     */
    private function setDocumentService(DocumentService $documentService)
    {
        $this->documentService = $documentService;
        return $this;
    }
}
