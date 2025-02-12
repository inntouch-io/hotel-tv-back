<?php

/**
 * Hotel-alphazet.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.08.2023 / 17:21
 */

namespace Domain\Users\DTO;

use App\Core\Dtos;

class UserDto extends Dtos
{
    public function __construct()
    {
        parent::__construct();
    }

    private $firstName = null;
    private $lastName = null;
    private $telephoneNumber = null;
    private $passportNumber = null;
    private $language = null;
    private $arrivalTime = null;
    private $departureTime = null;
    private $roomId = null;

    /**
     * @return UserDto
     */
    public static function getInstance(): UserDto
    {
        return new static();
    }

    /**
     * @return null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param null $firstName
     */
    public function setFirstName($firstName = null): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param null $lastName
     */
    public function setLastName($lastName = null): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return null
     */
    public function getTelephoneNumber()
    {
        return $this->telephoneNumber;
    }

    /**
     * @param null $telephoneNumber
     */
    public function setTelephoneNumber($telephoneNumber = null): void
    {
        $this->telephoneNumber = $telephoneNumber;
    }

    /**
     * @return null
     */
    public function getPassportNumber()
    {
        return $this->passportNumber;
    }

    /**
     * @param null $passportNumber
     */
    public function setPassportNumber($passportNumber = null): void
    {
        $this->passportNumber = $passportNumber;
    }

    /**
     * @return null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param null $language
     */
    public function setLanguage($language = null): void
    {
        $this->language = $language;
    }

    /**
     * @return null
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    /**
     * @param null $arrivalTime
     */
    public function setArrivalTime($arrivalTime = null): void
    {
        $this->arrivalTime = $arrivalTime;
    }

    /**
     * @return null
     */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    /**
     * @param null $departureTime
     */
    public function setDepartureTime($departureTime = null): void
    {
        $this->departureTime = $departureTime;
    }

    /**
     * @return null|int
     */
    public function getRoomId(): ?int
    {
        return $this->roomId;
    }

    /**
     * @param null $roomId
     */
    public function setRoomId($roomId = null): void
    {
        $this->roomId = $roomId;
    }
}
