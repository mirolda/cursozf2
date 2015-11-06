<?php

namespace Bookmark\Controller;

use Bookmark\Form\Bookmark as BookmarkForm;
use Bookmark\Model\Interfaces\BookmarkDaoInterface;
use Bookmark\Model\Bookmark;
use Zend\View\Model\ViewModel;

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
        $form = new BookmarkForm();
        $form->get('submit')->setValue('Create New Bookmark');
        $form->setAttribute('action', $this->url()->fromRoute('bookmark\account\doCreate'));
        return ['form' => $form, 'isUpdate' => false];
    }

    public function doCreateAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form = new BookmarkForm();
            $bookmarkEntity = new Bookmark();
            $form->setInputFilter($bookmarkEntity->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $formData = $form->getData();
                $data['url'] = $formData['url'];
                $data['title'] = $formData['title'];
                $data['description'] = $formData['description'];
                $this->model->save($data);
                $this->redirect()->toRoute('bookmark\account\index');
            }
            $form->prepare();
            $this->layout()->title = 'Create Bookmark - Error - Review your data';
// we reuse the create view
            $view = new ViewModel(['form' => $form, 'isUpdate' => false]);
            $view->setTemplate('bookmark/account/create.phtml');
            return $view;
        }
        $this->redirect()->toRoute('bookmark\account\create');
    }

    public function updateAction()
    {
        $this->layout()->title = 'Update Bookmark';
        $bookmark = $this->model->getById($this->params()->fromRoute('id'));
        $form = new BookmarkForm();
        $form->setAttribute('action', $this->url()->fromRoute('bookmark\account\doUpdate'));
        $form->bind($bookmark);
        $form->get('submit')->setAttribute('value', 'Edit Bookmark');
// we reuse the create view
        $view = new ViewModel(['form' => $form, 'isUpdate' => true]);
        $view->setTemplate('bookmark/account/create.phtml');
        return $view;
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

    public function doUpdateAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form = new BookmarkForm();
            $bookmarkEntity = new Bookmark();
            $form->setInputFilter($bookmarkEntity->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $formData = $form->getData();
                $data['id']         = $formData['id'];
                $data['url'] = $formData['url'];
                $data['title'] = $formData['title'];
                $data['description'] = $formData['description'];

                $this->model->update($data);
                $this->redirect()->toRoute('bookmark\account\index');

            }

            $form->prepare();

            $this->layout()->title = 'Update Bookmark - Error - Review your data';

            // we reuse the create view
            $view = new ViewModel(['form' => $form, 'isUpdate' => true]);
            $view->setTemplate('bookmark/account/create.phtml');

            return $view;
        }

        $this->redirect()->toRoute('bookmark\account\index');
    }
}
