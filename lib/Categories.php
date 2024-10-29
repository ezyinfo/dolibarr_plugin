<?php

class Categories
{

    // Private
    private $name;

    // Constructor
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    /* Setters */
    public function setName($_name)
    {
        $this->name = $_name;
    }
}
