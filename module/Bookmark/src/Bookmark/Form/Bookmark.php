<?php

namespace Bookmark\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Bookmark extends Form
{
    function __construct($name = null)
    {
        parent::__construct();
        $this->setName('Bookmark');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'creationAt',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'modifiedAt',
            'type' => 'Hidden',
        ));

        /*$url = new Element\Url('webpage-url');
        $url->setName('url');

        $this->add($url);*/
       // $url = new Element\Url('webpage-url');
        /*$this->add(array(
            'name' => 'url',
            'type' => 'Zend\Form\Element\Url',
            'attributes' => array(
                'required' => 'required',
            ),
        ));*/

        $this->add(array(
            'name' => 'url',
            'type' => 'Zend\Form\Element\Url',
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'attributes' => array(
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'description',
            'type' => 'Text',
            'attributes' => array(
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'id' => 'submitbutton',
            ),
        ));
    }


}