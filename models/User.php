<?php

declare(strict_types=1);

namespace app\models;

use app\core\Model;

class User extends Model
{

    private string $first_name;
    private string $second_name;
    private int $age;
    private string $job;
    private string $email;
    private string $phone;

    /**
     * @param int|null $id
     * @param string $first_name
     * @param string $second_name
     * @param int $age
     * @param string $job
     * @param string $email
     * @param string $phone
     */
    public function __construct(?int $id, string $first_name, string $second_name, int $age, string $job, string $email, string $phone)
    {
        parent::__construct($id);
        $this->first_name = $first_name;
        $this->second_name = $second_name;
        $this->age = $age;
        $this->job = $job;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getSecondName(): string
    {
        return $this->second_name;
    }

    /**
     * @param string $second_name
     */
    public function setSecondName(string $second_name): void
    {
        $this->second_name = $second_name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getJob(): string
    {
        return $this->job;
    }

    /**
     * @param string $job
     */
    public function setJob(string $job): void
    {
        $this->job = $job;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

}