<?php

namespace Modules\Document\Models;

use Modules\LibraryModule\BaseModel;

class Document extends BaseModel
{
    const ID = 'id';
    const PARENT_ID = 'parentId';
    const TYPE = 'type';
    const STATE = 'state';
    const WAREHOUSE_ID = 'warehouseId';
    const CONTRACTOR_ID = 'contractorId';
    const CHARGE = 'charge';
    const MANAGER_ID = 'managerId';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const STATE_DRAFT = 'draft';
    const STATE_POSTED = 'posted';
    const STATE_DELETED = 'deleted';

    const TYPE_RECEIPT = 'receipt';
    const TYPE_ORDER = 'order';
    const TYPE_INVOICE = 'invoice';

    public static $allowedStates = [
        self::STATE_DRAFT,
        self::STATE_POSTED,
        self::STATE_DELETED
    ];

    public static $allowedTypes = [
        self::TYPE_RECEIPT,
        self::TYPE_ORDER,
        self::TYPE_INVOICE
    ];

    protected static $allowedFields = [
        self::ID,
        self::PARENT_ID,
        self::TYPE,
        self::STATE,
        self::WAREHOUSE_ID,
        self::CONTRACTOR_ID,
        self::CHARGE,
        self::MANAGER_ID,
        self::CREATED_AT,
        self::UPDATED_AT
    ];

    public function __construct($id, $parentId, $type, $state, $warehouseId, $contractorId, $charge, $managerId)
    {
        $this->attributes[self::ID] = $id;
        $this->attributes[self::PARENT_ID] = $parentId;
        $this->attributes[self::TYPE] = $type;
        $this->attributes[self::STATE] = $state;
        $this->attributes[self::WAREHOUSE_ID] = $warehouseId;
        $this->attributes[self::CONTRACTOR_ID] = $contractorId;
        $this->attributes[self::CHARGE] = $charge;
        $this->attributes[self::MANAGER_ID] = $managerId;
    }
}