<?php

use Modules\Document\Models\Document;

$I = new ApiTester($scenario);

$document = [
    Document::ID => 123,
    Document::PARENT_ID => '0',
    Document::TYPE => 'receipt',
    Document::STATE => Document::STATE_DRAFT,
    Document::WAREHOUSE_ID => 0,
    Document::CONTRACTOR_ID => 0,
    Document::CHARGE => 133,
    Document::MANAGER_ID => 0,
];

$I->haveInDatabase('documents', $document);

$I->wantTo('delete document');

$I->sendDELETE('document/123');

$I->seeResponseCodeIs(204);
$I->cantSeeInDatabase('documents', [Document::ID => 123]);
