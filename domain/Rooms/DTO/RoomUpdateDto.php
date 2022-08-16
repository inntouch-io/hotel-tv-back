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
 * @property string      $deviceId
 * @property int         $max_volume
 * @property string|null $isVerified
 */
class RoomUpdateDto
{
    /** @var string|null $roomNumber */
    protected ?string $roomNumber = null;

    /** @var string $deviceId */
    protected string $deviceId;

    /** @var int $max_volume */
    protected int $max_volume;

    /** @var string|null $isVerified */
    protected ?string $isVerified = null;

    public function __construct(
        string  $deviceId,
        int     $max_volume,
        ?string $roomNumber = null,
        ?string $isVerified = null
    )
    {
        $this->deviceId = $deviceId;
        $this->max_volume = $max_volume;
        $this->roomNumber = $roomNumber;
        $this->isVerified = $isVerified;
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
     * @return string|null
     */
    public function getIsVerified(): ?string
    {
        return $this->isVerified;
    }

    /**
     * @return int
     */
    public function getMaxVolume(): int
    {
        return $this->max_volume;
    }
}
