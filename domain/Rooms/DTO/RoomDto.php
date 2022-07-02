<?php

namespace Domain\Rooms\DTO;


use App\Core\Dtos;

/**
 * Class RoomDto.php
 *
 * @package Domain\Rooms\DTO  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 02/07/22
 */
class RoomDto extends Dtos
{
    public function __construct()
    {
        parent::__construct();
    }

    private $roomNumber = null;
    private $deviceId = null;
    private $isVerified = null;
    private $deviceIp = null;

    /**
     * @return RoomDto
     */
    public static function getInstance(): RoomDto
    {
        return new static();
    }

    /**
     * @return null
     */
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    /**
     * @return null
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * @return null
     */
    public function getIsVerified()
    {
        return $this->isVerified;
    }

    /**
     * @return null
     */
    public function getDeviceIp()
    {
        return $this->deviceIp;
    }

    /**
     * @param null $roomNumber
     */
    public function setRoomNumber($roomNumber = null): void
    {
        $this->roomNumber = $roomNumber;
    }

    /**
     * @param null $deviceId
     */
    public function setDeviceId($deviceId = null): void
    {
        $this->deviceId = $deviceId;
    }

    /**
     * @param null $deviceIp
     */
    public function setDeviceIp($deviceIp = null): void
    {
        $this->deviceIp = $deviceIp;
    }

    /**
     * @param null $isVerified
     */
    public function setIsVerified($isVerified = null): void
    {
        $this->isVerified = $isVerified;
    }

}
