<?php

class CharacterModel extends CoreModel {
    protected $name;

    protected $description;

    protected $picture;

    protected $type_name;

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of type_name
     */ 
    public function getTypeName()
    {
        return $this->type_name;
    }

    /**
     * Set the value of type_name
     *
     * @return  self
     */ 
    public function setTypeName($type_name)
    {
        $this->type_name = $type_name;

        return $this;
    }
}