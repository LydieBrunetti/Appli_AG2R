<?php


class User
{
    private $email;
    private $name;
    private $surname;
    private $phoneNumber;
    private $companyName;
    private $companyFunction;
    private $photo;
    private $metPeople = array();


    public function __construct($name,$surname,$email,$phoneNumber,$companyName,$companyFunction)
    {
        $this->email = $email;
        $this->name = $name;
        $this->surname = $surname;
        $this->phoneNumber = $phoneNumber;
        $this->companyFunction = $companyFunction;
        $this->companyName = $companyName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function setPhoneNumber($phoneNumber){
        $this->phoneNumber = $phoneNumber;
    }
    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

    public function setCompanyName($companyName){
        $this->companyName = $companyName;
    }
    public function getCompanyName(){
        return $this->companyName;
    }

    public function setCompanyFunction($companyFunction){
        $this->companyFunction = $companyFunction;
    }

    public function getCompanyFunction(){
        return $this->companyFunction;
    }
}