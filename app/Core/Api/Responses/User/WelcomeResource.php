<?php

namespace App\Core\Api\Responses\User;

use App\Core\Api\Resources;

/**
 * Class WelcomeResource
 *
 * @package App\Core\Api\Responses\User
 * @nickname <alphazet>
 *
 * Date: 13/02/25
 */
class WelcomeResource extends Resources
{
    private static $TITLE = 'title';
    private static $TEXT = 'text';
    private static $SLOGAN = 'slogan';
    private static $LANGUAGE = 'language';
    public $user_name;

    public function toArray($request)
    {
        return [
            self::$TITLE => (string) $this->getTitle() . ' ' . $this->user_name,
            self::$TEXT => (string) $this->getText(),
            self::$SLOGAN => (string) $this->getSlogan(),
            self::$LANGUAGE => (string) $this->getLanguage(),
        ];
    }
}
