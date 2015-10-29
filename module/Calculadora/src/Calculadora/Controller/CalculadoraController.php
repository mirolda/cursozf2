<?php
namespace Calculadora\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Calculadora\Model\CalculadoraModel;


class CalculadoraController extends AbstractActionController
{
    /**
     * @var CalculadoraModel
     */
    private $model;

    /**
     * @param CalculadoraModel $model
     */
    public function __construct(CalculadoraModel $model)
    {
        $this->model = $model;
    }

    public function indexAction()
    {
        $title = $this->layout()->getVariable('title');
        $newTitle = $title . ' - Calculadora Home';
        $this->layout()->setVariable('title', $newTitle);
        return ['title' => $newTitle];
    }
    public function addAction()
    {
        $title = $this->layout()->getVariable('title');
        $newTitle = $title . ' - Calculadora Add';
        $this->layout()->setVariable('title', $newTitle);
        return ['title' => $newTitle];
    }
    public function addDoAction()
    {
        $this->model->setOp1($this->params()->fromPost('op1'));
        $this->model->setOp2($this->params()->fromPost('op2'));
        $this->model->add();
        $title = $this->layout()->getVariable('title');
        $newTitle = $title . ' - Calculadora Add Result';
        $this->layout()->setVariable('title', $newTitle);
        return ['result' => $this->model->getResult(), 'title' => $newTitle];
    }
}