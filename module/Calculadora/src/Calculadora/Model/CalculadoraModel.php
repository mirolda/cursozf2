<?php
namespace Calculadora\Model;
class CalculadoraModel
{
    /**
     * @var int
     */
    private $op1;
    /**
     * @var int
     */
    private $op2;
    /**
     * @var int
     */
    private $result;
    public function __construct()
    {
        $this->result = 0;
    }
    public function add()
    {
        $this->result = $this->op1 + $this->op2;
    }
    public function subtract()
    {
        $this->result = $this->op1 - $this->op2;
    }
    public function multiply()
    {
        $this->result = $this->op1 * $this->op2;
    }
    public function divide()
    {
        $this->result = (int) ($this->op1 / $this->op2);
    }
    public function getResult()
    {
        return $this->result;
    }
    /**
     * @param int $op1
     */
    public function setOp1($op1)
    {
        $this->op1 = $op1;
    }
    /**
     * @return int
     */
    public function getOp1()
    {
        return $this->op1;
    }
    /**
     * @param int $op2
     */
    public function setOp2($op2)
    {
        $this->op2 = $op2;
    }
    /**
     * @return int
     */
    public function getOp2()
    {
        return $this->op2;
    }
}
