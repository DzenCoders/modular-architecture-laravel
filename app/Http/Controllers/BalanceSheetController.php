<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\BalanceSheet\BalanceSheetService;
use Request;

use App\Http\Requests;

class BalanceSheetController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return $this->getBalanceSheetService()->get()->toJson(JSON_NUMERIC_CHECK);
    }

    /**
     * @return BalanceSheetService
     */
    private function getBalanceSheetService()
    {
        return App::make(BalanceSheetService::class);
    }
}