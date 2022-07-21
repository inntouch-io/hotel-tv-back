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
 */
class RoomUpdateDto
{
    /** @var string|null $roomNumber */
    protected ?string $roomNumber = null;

    /** @var string $deviceId */
    protected string $deviceId;

    /** @var string|null $isVerified */
    protected ?string $isVerified = null;

    public function __construct(
        ?string $roomNumber,
        string  $deviceId,
        ?string $isVerified
    )
    {
        $this->roomNumber = $roomNumber;
        $this->deviceId = $deviceId;
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
}
