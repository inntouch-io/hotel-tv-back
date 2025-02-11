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
    private $roomStatus = null;
    private $categoryId = null;
    private $deviceId = null;
    private $isActive = null;
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
    public function getRoomStatus()
    {
        return $this->roomStatus;
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
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @return null
     */
    public function getIsActive()
    {
        return $this->isActive;
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
     * @param null $roomStatus
     */
    public function setRoomStatus($roomStatus = null): void
    {
        $this->roomStatus = $roomStatus;
    }

    /**
     * @param null $deviceId
     */
    public function setDeviceId($deviceId = null): void
    {
        $this->deviceId = $deviceId;
    }

    /**
     * @param null $categoryId
     */
    public function setCategoryId($categoryId = null): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @param null $deviceIp
     */
    public function setDeviceIp($deviceIp = null): void
    {
        $this->deviceIp = $deviceIp;
    }

    /**
     * @param null $isActive
     */
    public function setIsActive($isActive = null): void
    {
        $this->isActive = $isActive;
    }
}
