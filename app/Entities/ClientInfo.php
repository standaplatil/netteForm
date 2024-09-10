<?php

namespace App\Entities;

class ClientInfo
{
    private int $id;
    private string $name;
    private string $email;
    private string $phone;
    private int $age;
    private \DateTime $createdAt;

    public function __construct(int $id, string $name, string $email, string $phone, int $age, \DateTime $createdAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->age = $age;
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ClientInfo
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ClientInfo
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): ClientInfo
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): ClientInfo
    {
        $this->phone = $phone;
        return $this;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): ClientInfo
    {
        $this->age = $age;
        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): ClientInfo
    {
        $this->createdAt = $createdAt;
        return $this;
    }

}