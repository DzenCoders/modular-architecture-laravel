<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\Contractor\ContractorService;
use Modules\Contractor\Models\Contractor;
use Request;

use App\Http\Requests;

class ContractorController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return $this->getContractorService()->get()->toJson(JSON_NUMERIC_CHECK);
    }

    /**
     * @param Requests\ContractorRequest $request
     * @return array
     */
    public function create(Requests\ContractorRequest $request)
    {
        return $this->getContractorService()->create($request->all());
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return $this->getContractorService()->getById($id);
    }

    /**
     * @param Requests\ContractorRequest $request
     * @param $id
     * @return array
     */
    public function update(Requests\ContractorRequest $request, $id)
    {
        $params = $request->all();
        $params[Contractor::ID] = $id;
        return $this->getContractorService()->update($params);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        $this->getContractorService()->delete($id);
        return response('', 204);
    }

    /**
     * @return ContractorService
     */
    private function getContractorService()
    {
        return App::make(ContractorService::class);
    }
}
