<?php

/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 21.07.2022 / 11:33
 */

namespace Domain\Rooms\DTO;

/**
 * Class RoomUpdateDto
 * @package Domain\Rooms\DTO
 *
 * @property string|null $roomNumber
 * @property string|null $roomStatus
 * @property string      $deviceId
 * @property string      $categoryId
 * @property int         $max_volume
 * @property string|null $isVerified
 */
class RoomUpdateDto
{
    /** @var string|null $roomNumber */
    protected ?string $roomNumber = null;

    /** @var string|null $roomStatus */
    protected ?string $roomStatus = null;

    /** @var string $deviceId */
    protected string $deviceId;

    /** @var string $categoryId */
    protected string $categoryId;

    /** @var int $max_volume */
    protected int $max_volume;

    /** @var string|null $isVerified */
    protected ?string $isActive = null;

    public function __construct(
        string  $deviceId,
        string  $categoryId,
        int     $max_volume,
        ?string $roomNumber = null,
        ?string $roomStatus = null,
        ?string $isActive = null
    ) {
        $this->deviceId = $deviceId;
        $this->categoryId = $categoryId;
        $this->max_volume = $max_volume;
        $this->roomNumber = $roomNumber;
        $this->roomStatus = $roomStatus;
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
     * @return string|null
     */
    public function getRoomStatus(): ?string
    {
        return $this->roomStatus;
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
    public function getCategoryId(): string
    {
        return $this->categoryId;
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
}
