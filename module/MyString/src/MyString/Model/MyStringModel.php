<?php
namespace MyString\Model;
class MyStringModel
{
    /**
     * @var int
     */
    private $str1;
    /**
     * @var int
     */
    private $str2;
    /**
     * @var int
     */
    private $result;
    public function __construct()
    {
        $this->result = "";
    }

    public function concatenar()
    {
        $this->result = $this->str1 . $this->str2;
    }
    public function subcadena()
    {
        $this->result ="";
        if (strpos($this->str1,$this->str2)=== false)
        $this->result = "La cadena '$this->str2' no fue encontrada en la cadena '$this->str1'";
      else
          $this->result = "La cadena '$this->str2' fue encontrada en la cadena '$this->str1'";
    }

    public function getResult()
    {
        return $this->result;
    }
    /**
     * @param string $str1
     */
    public function setStr1($str1)
    {
        $this->str1 = $str1;
    }
    /**
     * @return string
     */
    public function getStr1()
    {
        return $this->str1;
    }
    /**
     * @param strin $str2
     */
    public function setStr2($str2)
    {
        $this->str2 = $str2;
    }
    /**
     * @return string
     */
    public function getStr2()
    {
        return $this->str2;
    }
}