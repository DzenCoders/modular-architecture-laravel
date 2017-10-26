<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\Document\DocumentService;
use Modules\Document\Models\Document;
use Request;

use App\Http\Requests;

class DocumentController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return $this->getDocumentService()->get()->toJson(JSON_NUMERIC_CHECK);
    }

    /**
     * @param Requests\DocumentRequest $request
     * @return array
     */
    public function create(Requests\DocumentRequest $request)
    {
        return $this->getDocumentService()->create($request->all());
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return $this->getDocumentService()->getById($id);
    }

    /**
     * @param Requests\DocumentRequest $request
     * @param $id
     * @return array
     */
    public function update(Requests\DocumentRequest $request, $id)
    {
        $params = $request->all();
        $params[Document::ID] = $id;
        return $this->getDocumentService()->update($params);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        $this->getDocumentService()->delete($id);
        return response('', 204);
    }

    /**
     * @return DocumentService
     */
    private function getDocumentService()
    {
        return App::make(DocumentService::class);
    }
}
