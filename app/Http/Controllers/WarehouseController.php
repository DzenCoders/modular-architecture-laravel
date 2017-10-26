<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use Illuminate\Support\Facades\App;
use Modules\Warehouse\Models\Warehouse;
use Modules\Warehouse\WarehouseService;
use Request;

use App\Http\Requests;

class WarehouseController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return $this->getWarehouseService()->get()->toJson(JSON_NUMERIC_CHECK);
    }

    /**
     * @param WarehouseRequest $request
     * @return array
     */
    public function create(WarehouseRequest $request)
    {
        return $this->getWarehouseService()->create($request->all());
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return $this->getWarehouseService()->getById($id);
    }

    /**
     * @param WarehouseRequest $request
     * @param $id
     * @return array
     */
    public function update(WarehouseRequest $request, $id)
    {
        $params = $request->all();
        $params[Warehouse::ID] = $id;
        return $this->getWarehouseService()->update($params);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        $this->getWarehouseService()->delete($id);
        return response('', 204);
    }

    /**
     * @return WarehouseService
     */
    private function getWarehouseService()
    {
        return App::make(WarehouseService::class);
    }
}