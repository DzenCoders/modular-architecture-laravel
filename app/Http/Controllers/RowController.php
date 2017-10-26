<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\Row\RowService;
use Modules\Row\Models\Row;
use Request;

use App\Http\Requests;

class RowController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return $this->getRowService()->get()->toJson(JSON_NUMERIC_CHECK);
    }

    /**
     * @param Requests\RowRequest $request
     * @return array
     */
    public function create(Requests\RowRequest $request)
    {
        return $this->getRowService()->create($request->all());
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return $this->getRowService()->getById($id);
    }

    /**
     * @param Requests\RowRequest $request
     * @param $id
     * @return array
     */
    public function update(Requests\RowRequest $request, $id)
    {
        $params = $request->all();
        $params[Row::ID] = $id;
        return $this->getRowService()->update($params);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        $this->getRowService()->delete($id);
        return response('', 204);
    }

    /**
     * @return RowService
     */
    private function getRowService()
    {
        return App::make(RowService::class);
    }
}
