<?php

namespace MyString\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use MyString\Model\MyStringModel;
use Zend\View\Model\ViewModel;

class MyStringController extends AbstractActionController
{
    /**
     * @var MyStringModel
     */
    private $model;

    /**
     * @param MyStringModel $model
     */
    public function __construct(MyStringModel $model)
    {
        $this->model = $model;
    }

    public function indexAction()
    {
        $title = $this->layout()->getVariable('title');
        $newTitle = $title . ' - MyString Home';
        $this->layout()->setVariable('title', $newTitle);
        return ['title' => $newTitle];
    }
    public function concatenarAction()
    {
        $title = $this->layout()->getVariable('title');
        $newTitle = $title . ' - MyString Concatenar';
        $this->layout()->setVariable('title', $newTitle);
        return ['title' => $newTitle];
    }
    public function concatenarDoAction()
    {
        $this->model->setStr1($this->params()->fromPost('str1'));
        $this->model->setStr2($this->params()->fromPost('str2'));
        $this->model->concatenar();
        $title = $this->layout()->getVariable('title');
        $newTitle = $title . ' - MyString Concatenar Resultado';
        $this->layout()->setVariable('title', $newTitle);
        $view = new ViewModel();
        $view->setTemplate('my-string/my-string/result.phtml');

        $result = $this->AddPrefix($this->model->getResult());

        $view->result = $result;

        return $view;
    }

    public function subcadenaAction()
    {
        $title = $this->layout()->getVariable('title');
        $newTitle = $title . ' - MyString Subcadena';
        $this->layout()->setVariable('title', $newTitle);
        return ['title' => $newTitle];
    }

    public function subcadenaDoAction()
    {
        $this->model->setStr1($this->params()->fromPost('str1'));
        $this->model->setStr2($this->params()->fromPost('str2'));
        $this->model->subcadena();
        $title = $this->layout()->getVariable('title');
        $newTitle = $title . ' - MyString Subcadena Resultado';
        $this->layout()->setVariable('title', $newTitle);
        $view = new ViewModel();
        $view->setTemplate('my-string/my-string/result.phtml');
        $view->result = $this->model->getResult();

        return $view;
//        return ['result' => $this->model->getResult(), 'title' => $newTitle];
    }

}