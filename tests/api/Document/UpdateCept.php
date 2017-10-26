<?php
use Modules\Document\Models\Document;

$I = new ApiTester($scenario);

$document = [
    Document::ID => 230,
    Document::PARENT_ID => '0',
    Document::TYPE => 'receipt',
    Document::STATE => Document::STATE_DRAFT,
    Document::WAREHOUSE_ID => 0,
    Document::CONTRACTOR_ID => 0,
    Document::CHARGE => 150,
    Document::MANAGER_ID => 0,
];

$I->haveInDatabase('documents', $document);

$I->wantTo('update document');

$updatedDocument = array_merge($document, [Document::CHARGE => 155]);

$I->sendPUT('document/230', $updatedDocument);

$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson($updatedDocument);
$I->seeInDatabase('documents', $updatedDocument);
