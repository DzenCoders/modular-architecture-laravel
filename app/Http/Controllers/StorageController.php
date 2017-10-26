<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorageRequest;
use Illuminate\Support\Facades\App;
use Modules\Storage\StorageService;
use Modules\Warehouse\Models\Warehouse;
use Request;

use App\Http\Requests;

class StorageController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return $this->getStorageService()->get()->toJson(JSON_NUMERIC_CHECK);
    }

    /**
     * @param StorageRequest $request
     * @return array
     */
    public function create(StorageRequest $request)
    {
        return $this->getStorageService()->create($request->all());
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return $this->getStorageService()->getById($id);
    }

    /**
     * @param StorageRequest $request
     * @param $id
     * @return array
     */
    public function update(StorageRequest $request, $id)
    {
        $params = $request->all();
        $params[Warehouse::ID] = $id;
        return $this->getStorageService()->update($params);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        $this->getStorageService()->delete($id);
        return response('', 204);
    }

    /**
     * @return StorageService
     */
    private function getStorageService()
    {
        return App::make(StorageService::class);
    }
}