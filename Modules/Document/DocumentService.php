<?php

namespace Modules\Document;

use Analogue\ORM\EntityCollection;
use Analogue\ORM\System\Mapper;
use Modules\Document\Mappers\DocumentMapper;
use Modules\Document\Models\Document;
use Modules\LibraryModule\BaseService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DocumentService extends BaseService
{
    public function __construct()
    {
        app('analogue')->register(Document::class, DocumentMapper::class);
    }

    /**
     * @return EntityCollection
     */
    public function get()
    {
        return $this->getMapper()->get();
    }

    /**
     * @param $id
     * @return Document
     * @throws BadRequestHttpException
     */
    public function getById($id)
    {
        $document = $this->getMapper()->find($id);
        if (!$document) {
            throw new BadRequestHttpException('Wrong Id number for document!');
        }
        return $document;
    }

    public function create(array $params)
    {
        $params[Document::ID] = 0;
        return $this->getMapper()->store($this->build($params));
    }

    public function update(array $params)
    {
        $document = $this->getById($params[Document::ID]);
        $this->setAllParams($document, $params);

        return $this->getMapper()->store($document);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $this->getMapper()->delete($this->getById($id));
        return true;
    }

    /**
     * @param array $params
     * @return Document
     */
    public function build(array $params)
    {
        return new Document(
            $params[Document::ID],
            $params[Document::PARENT_ID],
            $params[Document::TYPE],
            $params[Document::STATE],
            $params[Document::WAREHOUSE_ID],
            $params[Document::CONTRACTOR_ID],
            $params[Document::CHARGE],
            $params[Document::MANAGER_ID]
        );
    }

    /**
     * @return Mapper
     */
    private function getMapper()
    {
        return app('analogue')->mapper(Document::class);
    }
}