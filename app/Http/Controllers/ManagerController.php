<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\Manager\ManagerService;
use Modules\Manager\Models\Manager;
use Request;

use App\Http\Requests;

class ManagerController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return $this->getManagerService()->get()->toJson(JSON_NUMERIC_CHECK);
    }

    /**
     * @param Requests\ManagerRequest $request
     * @return array
     */
    public function create(Requests\ManagerRequest $request)
    {
        return $this->getManagerService()->create($request->all());
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return $this->getManagerService()->getById($id);
    }

    /**
     * @param Requests\ManagerRequest $request
     * @param $id
     * @return array
     */
    public function update(Requests\ManagerRequest $request, $id)
    {
        $params = $request->all();
        $params[Manager::ID] = $id;
        return $this->getManagerService()->update($params);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        $this->getManagerService()->delete($id);
        return response('', 204);
    }

    /**
     * @return ManagerService
     */
    private function getManagerService()
    {
        return App::make(ManagerService::class);
    }
}
