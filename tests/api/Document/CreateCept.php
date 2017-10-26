<?php

use Modules\Document\Models\Document;

$I = new ApiTester($scenario);

$I->wantTo('create document');

$document = [
    Document::PARENT_ID => '0',
    Document::TYPE => Document::TYPE_RECEIPT,
    Document::STATE => Document::STATE_DRAFT,
    Document::WAREHOUSE_ID => 0,
    Document::CONTRACTOR_ID => 0,
    Document::CHARGE => 133.01,
    Document::MANAGER_ID => 0,
];

$I->dontSeeInDatabase('documents', $document);

$I->sendPOST('document', $document);

$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson($document);
$I->seeInDatabase('documents', $document);
