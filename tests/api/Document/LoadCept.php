<?php
use Modules\Document\Models\Document;

$I = new ApiTester($scenario);

$documentOne = [
    Document::ID => 224,
    Document::PARENT_ID => '0',
    Document::TYPE => 'receipt',
    Document::STATE => Document::STATE_DRAFT,
    Document::WAREHOUSE_ID => 0,
    Document::CONTRACTOR_ID => 0,
    Document::CHARGE => 150,
    Document::MANAGER_ID => 0,
];

$documentTwo = [
    Document::ID => 225,
    Document::PARENT_ID => '0',
    Document::TYPE => 'receipt',
    Document::STATE => Document::STATE_DRAFT,
    Document::WAREHOUSE_ID => 0,
    Document::CONTRACTOR_ID => 0,
    Document::CHARGE => 155,
    Document::MANAGER_ID => 0,
];

$I->haveInDatabase('documents', $documentOne);
$I->haveInDatabase('documents', $documentTwo);

$I->wantTo('load document');

$I->sendGET('document');

$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson($documentOne);
$I->seeResponseContainsJson($documentTwo);
