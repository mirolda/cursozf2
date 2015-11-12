<?php

namespace Bookmark\Controller;

use Bookmark\Model\Interfaces\BookmarkDaoInterface;
use Zend\Mvc\Controller\AbstractActionController;

class AccountController extends AbstractActionController
{
    /**
     * @var BookmarkDaoInterface
     */
    private $model;

    function __construct(BookmarkDaoInterface $model)
    {
        $this->model = $model;
    }

    public function indexAction()
    {
        $this->layout()->title  = 'List Bookmarks';
        $bookmarks                  = $this->model->findAll();

        return ['bookmarks' => $bookmarks];
    }

    public function createAction()
    {
        $this->layout()->title = 'Create Bookmark';

        return [];
    }

    public function doCreateAction()
    {
        $this->model->save($this->params()->fromPost());

        $this->redirect()->toRoute('bookmark\account\index');
    }

    public function viewAction()
    {
        $this->layout()->title  = 'Bookmark Details';
        $id                     = $this->params()->fromRoute('id');
        $bookmark                   = $this->model->getById($id);

        return ['bookmark' => $bookmark];
    }

    public function deleteAction()
    {
        $this->model->delete($this->params()->fromRoute('id'));

        $this->redirect()->toRoute('bookmark\account\index');
    }

    public function updateAction()
    {
        $this->layout()->title = 'Update Bookmark';

        $bookmark = $this->model->getById($this->params()->fromRoute('id'));

        return ['bookmark' => $bookmark];
    }

    public function doUpdateAction()
    {
        $this->model->update($this->params()->fromPost());

        $this->redirect()->toRoute('bookmark\account\index');
    }
}