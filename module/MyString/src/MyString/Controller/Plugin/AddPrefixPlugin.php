<?php
namespace MyString\Controller\Plugin;


use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class AddPrefixPlugin extends AbstractPlugin
{
    /**
     * @var int The number of 0's to prepend
     */
    private $strPrefix;

    public function __construct($strPrefix)
    {
        $this->strPrefix = $strPrefix;
    }

    /**
     * __invoke
     *
     * @param int $number The number to prepend zeros in
     *
     * @return string
     */
    public function __invoke($cadena)
    {

        while (strlen($cadena)<$this->strPrefix){
             $cadena = '*'.$cadena;
        }
        return ($cadena);


    }
}