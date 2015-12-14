<?php

namespace Bookmark\Controller;
use Bookmark\Form\BookmarkForm;
use Bookmark\Model\BookmarksModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class BookmarksRESTController extends AbstractRestfulController
{

    /**
     * @var BookmarksModel
     */
    private $model;
    /**
     * @var BookmarkForm
     */
    private $form;
    /**
     * @param BookmarksModel $model
     * @param BookmarkForm $form
     */
    function __construct(BookmarksModel $model, BookmarkForm $form)
    {
        $this->model = $model;
        $this->form = $form;
    }

    // The following methods will be mapped from the HTTP request
    // http://framework.zend.com/manual/current/en/modules/zend.mvc.controllers.html#theabstractrestfulcontroller

    /**
     * getList
     *
     * Maps HTTP Request Method: GET
     *
     * Using from the client
     *
     * Curl
     * curl -i -H "Accept: application/json" http://localhost:8080/bookmarks-rest/
     * Browser
     * http://localhost:8080/bookmarks-rest/
     *
     * @return JsonModel
     */
    public function getList()
    {
        $bookmarks = $this->model->findAll(false);
        foreach ($bookmarks as $bookmark) {
            $bookmarkArray = $bookmark->getArrayCopy();
            $data[] = $bookmarkArray;
        }
        return new JsonModel([
            'data' => $data
        ]);
    }

    /**
     * get
     *
     * Maps HTTP Request Method: GET
     *
     * Curl
     * curl -i -H "Accept: application/json" http://localhost:8080/bookmarks-rest/id/?/
     * Browser
     * http://localhost:8080/bookmarks-rest/id/?/
     *
     * @param int $id
     * @return JsonModel
     */
    public function get($id)
    {
        $bookmark = $this->model->getById($id);
        $bookmarkArray = $bookmark->getArrayCopy();
        return new JsonModel([
            'data' => $bookmarkArray
        ]);
    }

    /**
     * create
     *
     * Maps HTTP Request Method: POST
     *
     * Curl
     * curl -i -H "Accept: application/json" -X POST -d
    "url=http://www.url.com&title=theTitle&despription=desc" http://localhost:8080/bookmarks-rest/
     * *
     * @param mixed $data
     * @return mixed|JsonModel
     */
    public function create($data)
    {
        $this->form->setData($data);
        if ($this->form->isValid()) {
            $formData = $this->form->getData();
            $data['url'] = $formData['url'];
            $data['title'] = $formData['title'];
            $data['description'] = $formData['description'];
            $data['creationAt'] = date('Y-m-d H:i:s');
            $data['modifiedAt'] = date('Y-m-d H:i:s');
            $id = $this->model->save($data);
// We cannot call $this->get($id) because the request method now is POST instead of GET
            $bookmark = $this->model->getById($id);
            $bookmarkArray = $bookmark->getArrayCopy();
            return new JsonModel([
                'data' => $bookmarkArray,
            ]);
        }
    }

    /**
     * update
     *
     * Maps HTTP Request Method: PUT
     *
     * Curl
     * curl -i -H "Accept: application/json" -X PUT -d "url=URLUPDATE"
    http://localhost:8080/bookmarks-rest/id/14/
     *
     * @param mixed $id
     * @return mixed|JsonModel
     */
    public function update($id, $data)
    {
        $bookmark = $this->model->getById($id);
        $bookmark->exchangeArray2($data);
        $this->form->bind($bookmark);
        if ($this->form->isValid()) {
            $formData = $this->form->getData();
            $data['id'] = $formData->getId();
            $data['url'] = $formData->getUrl();
            $data['title'] = $formData->getTitle();
            $data['description'] = $formData->getDescription();
            $data['creationAt'] = $formData->getCreationAt;
            $data['modifiedAt'] = $formData->getModifiedAt;
            $id = $this->model->update($data);
// We cannot call $this->get($id) because the request method now is POST instead of GET
            $bookmark = $this->model->getById($id);
            $bookmarkArray = $bookmark->getArrayCopy();
            return new JsonModel([
                'data' => $bookmarkArray,
            ]);
        }

        return new JsonModel([
            'error' => true,
        ]);
    }

    /**
     * delete
     *
     * Maps HTTP Request Method: DELETE
     *
     * Curl
     * curl -i -H "Accept: application/json" -X DELETE http://localhost:8080/bookmarks-rest/id/?/
     *
     * @param mixed $id
     * @return mixed|JsonModel
     */
    public function delete($id)
    {
        $this->model->delete($id);

        return new JsonModel([
            'data' => 'deleted',
        ]);
    }
}

