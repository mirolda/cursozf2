<?php
namespace Bookmark\Model;


class Bookmark
{
    private $id;
    private $url;
    private $title;
    private $description;
    private $creationAt;
    private $modifiedAt;


    function __construct($id = null, $url = null, $title = null, $description = null, $creationAt = null,
                         $modifiedAt = null )
    {
        $this->id           = $id;
        $this->url          = $url;
        $this->title        = $title;
        $this->description  = $description;
        $this->creationAt   = $creationAt;
        $this->modifiedAt   = $modifiedAt;
    }

    /**
     * exchangeArray
     *
     * This method is required to work with TableGateWay
     *
     * @param $data
     */
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
}