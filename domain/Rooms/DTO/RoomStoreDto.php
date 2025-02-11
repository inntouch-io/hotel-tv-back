<?php

/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * Created: 10.02.2025 / 11:33
 */

namespace Domain\Rooms\DTO;

/**
 * Class RoomStoreDto
 * @package Domain\Rooms\DTO
 *
 * @property string|null $roomNumber
 * @property string      $deviceId
 * @property string      $deviceIp
 * @property int         $max_volume
 * @property string|null $roomStatus
 * @property string|null $isVerified
 */
class RoomStoreDto
{
    /** @var string|null $roomNumber */
    protected ?string $roomNumber = null;

    /** @var string $deviceId */
    protected string $deviceId;

    /** @var string $deviceIp */
    protected string $deviceIp;

    /** @var int $max_volume */
    protected int $max_volume;

    /** @var string|null $roomStatus */
    protected ?string $roomStatus = null;

    /** @var string $categoryId */
    protected string $categoryId;

    /** @var string|null $isActive */
    protected ?string $isActive = null;

    public function __construct(
        string  $deviceId,
        string  $deviceIp,
        int     $max_volume,
        string  $categoryId,
        ?string $roomNumber = null,
        ?string $roomStatus = null,
        ?string $isActive = null
    ) {
        $this->deviceId = $deviceId;
        $this->deviceIp = $deviceIp;
        $this->max_volume = $max_volume;
        $this->roomNumber = $roomNumber;
        $this->roomStatus = $roomStatus;
        $this->categoryId = $categoryId;
        $this->isActive = $isActive;
    }

    /**
     * @return string|null
     */
    public function getRoomNumber(): ?string
    {
        return $this->roomNumber;
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    /**
     * @return string
     */
    public function getDeviceIp(): string
    {
        return $this->deviceIp;
    }

    /**
     * @return string|null
     */
    public function getIsActive(): ?string
    {
        return $this->isActive;
    }

    /**
     * @return int
     */
    public function getMaxVolume(): int
    {
        return $this->max_volume;
    }

    /**
     * @return string|null
     */
    public function getRoomStatus(): ?string
    {
        return $this->roomStatus;
    }

    /**
     * @return string
     */
    public function getCategoryId(): string
    {
        return $this->categoryId;
    }
}
