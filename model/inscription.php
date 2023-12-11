<?php

class sign_up
{
    private ?int $id = null;
    private ?string $email = null;
    private ?string $birthdate = null;
    private ?string $username = null;
    private ?string $password = null;

    public function __construct($id = null, $email, $birthdate, $username, $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->birthdate = $birthdate;
        $this->username = $username;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getemail()
    {
        return $this->email;
    }

    public function setemail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
}
?>
