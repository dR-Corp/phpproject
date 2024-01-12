<?php

namespace Classes\models;

class ContactModel
{
    private $id;

    private $nomc;

    private $prenomc;

    private $email;

    private $tel;

    public function __construct($nomc=null, $prenomc=null, $email=null, $tel=null) {

        $this->nomc = $nomc;

        $this->prenomc = $prenomc;

        $this->email = $email;

        $this->tel = $tel;

    }
    public function getId() {

        return $this->id;

    }




    public function getEmail() {

        return $this->email;

    }



    public function getTel() {

        return $this->tel;

    }

    

    

    public function setId($id) {

        $this->id=$id;

    }

    public function setEmail($email) {

        $this->email=$email;

    }



    public function setTel($tel) {

        $this->tel=$tel;

    }



        // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact
    

    /**
     * Get the value of nomc
     */ 
    public function getNomc()
    {
        return $this->nomc;
    }

    /**
     * Set the value of nomc
     *
     * @return  self
     */ 
    public function setNomc($nomc)
    {
        $this->nomc = $nomc;

        return $this;
    }

    /**
     * Get the value of prenomc
     */ 
    public function getPrenomc()
    {
        return $this->prenomc;
    }

    /**
     * Set the value of prenomc
     *
     * @return  self
     */ 
    public function setPrenomc($prenomc)
    {
        $this->prenomc = $prenomc;

        return $this;
    }
}
