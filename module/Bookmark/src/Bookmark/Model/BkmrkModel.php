<?php
/**
 * xenFramework (http://xenframework.com/)
 *
 * This file is part of the xenframework package.
 *
 * (c) Ismael Trascastro <itrascastro@xenframework.com>
 *
 * @link        http://github.com/xenframework for the canonical source repository
 * @copyright   Copyright (c) xenFramework. (http://xenframework.com)
 * @license     MIT License - http://en.wikipedia.org/wiki/MIT_License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bookmark\Model;


class BkmrkModel
{
    private $id;
    private $url;
    private $title;
    private $description;
    private $creationAt;
    private $modifiedAt;

    function __construct($id = null, $url = null, $title = null, $description = null, $creationAt = null, $modifiedAt = null )
    {
        $this->id           = $id;
        $this->url          = $url;
        $this->title        = $title;
        $this->description  = $description;
        $this->creationAt   = $creationAt;
        $this->modifiedAt   = $modifiedAt;
    }

    public function exchangeArray($data)
    {
        $this->id          = (!empty($data['id'])) ? $data['id'] : null;
        $this->url       = (!empty($data['url'])) ? $data['url'] : null;
        $this->title    = (!empty($data['title'])) ? $data['title'] : null;
        $this->description        = (!empty($data['description'])) ? $data['description'] : null;
        $this->creationAt        = (!empty($data['creationAt'])) ? $data['creationAt'] : null;
        $this->modifiedAt        = (!empty($data['modifiedAt'])) ? $data['modifiedAt'] : null;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreationAt()
    {
        return $this->creationAt;
    }

    /**
     * @param mixed $creationAt
     */
    public function setCreationAt($creationAt)
    {
        $this->creationAt = $creationAt;
    }

    /**
     * @return mixed
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * @param mixed $modifiedAt
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;
    }

    /**
     * getArrayCopy
     *
     * Needed for use in form binding
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    /**
     * Set input filter
     *
     * @param  InputFilterInterface $inputFilter
     *
     * @return InputFilterAwareInterface
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception('Not used');
    }
    /**
     * Retrieve input filter
     *
     * @return InputFilterInterface
     */
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $inputFilter->add(array(
                'name' => 'id',
                'continue_if_empty' => true,
            ));
            $inputFilter->add(array(
                'name' => 'creationAt',
                'continue_if_empty' => true,
            ));
            $inputFilter->add(array(
                'name' => 'modifiedAt',
                'continue_if_empty' => true,
            ));
            $inputFilter->add(array(
                'name' => 'url',
                'required' => true,
                'filters' => array(
                    array('name' => 'StringTrim'), // clean blank spaces
                    array('name' => 'StripTags'), // clean malicious code
                    array('name' => 'StringToLower'),
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'La Url es obligatoria',
                            ),
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name' => 'title',
                'required' => true,
                'filters' => array(
                    array('name' => 'Alnum'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'description',
                'required' => true,
                'filters' => array(
                    array('name' => 'Alnum'),
                ),
            ));
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}