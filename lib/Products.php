<?php

class Products
{

    // Private attributes
    private $name;
    private $ref;
    private $desc;

    // Constructor
    public function __construct($name, $ref, $desc)
    {
        $this->ref = $ref;
        $this->name = $name;
        $this->desc = $desc;
    }

    // methods
    public function getRef()
    {
        return $this->ref;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    /* Setters */

    public function setRef($_ref)
    {
        // TODO check format : #7234523 throw Exception if needed
        $this->ref = $_ref;
    }

    public function setName($_name)
    {
        $this->name = $_name;
    }

    public function setDesc($_desc)
    {
        $this->desc = $_desc;
    }
}
