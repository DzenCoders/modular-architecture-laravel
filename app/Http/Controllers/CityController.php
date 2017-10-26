<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\City\CityService;
use Modules\City\Models\City;
use Request;

use App\Http\Requests;

class CityController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return $this->getCityService()->get()->toJson(JSON_NUMERIC_CHECK);
    }

    /**
     * @param Requests\CityRequest $request
     * @return array
     */
    public function create(Requests\CityRequest $request)
    {
        return $this->getCityService()->create($request->all());
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return $this->getCityService()->getById($id);
    }

    /**
     * @param Requests\CityRequest $request
     * @param $id
     * @return array
     */
    public function update(Requests\CityRequest $request, $id)
    {
        $params = $request->all();
        $params[City::ID] = $id;
        return $this->getCityService()->update($params);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        $this->getCityService()->delete($id);
        return response('', 204);
    }

    /**
     * @return CityService
     */
    private function getCityService()
    {
        return App::make(CityService::class);
    }
}
