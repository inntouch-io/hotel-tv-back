<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 27.09.2022 / 12:06
 */

namespace App\Http\Controllers\Api\ThirdParty;

use App\Http\Controllers\Api\ApiController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use RuntimeException;

/**
 * Class CurrencyController
 * @package App\Http\Controllers\Api\ThirdParty
 */
class CurrencyController extends ApiController
{
    /**
     * CurrencyController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCurrency()
    {
        $url = "https://cbu.uz/uz/arkhiv-kursov-valyut/json/";
        $responseData = [];

        try {
            $data = Cache::get('get_currency_today');
            if (is_null($data)) {
                $client = new Client();
                $response = $client->get($url);

                $data = json_decode($response->getBody()->getContents());

                if (is_null($data)) {
                    throw new RuntimeException('Data not found', 404);
                }

                Cache::add('get_currency_today', $data, 3600); // 1 hour
            }

            $locale = strtoupper($this->getLanguage());
            $currency_name = "CcyNm_{$locale}";

            foreach ($data as $item) {
                if (in_array($item->id, [15, 69, 21, 57])) {
                    $responseData[] = [
                        'currency-type' => $item->Ccy,
                        'currency-name' => $item->{$currency_name},
                        'rate'          => $item->Rate,
                        'date'          => $item->Date
                    ];
                }
            }
            $this->setData($responseData);

            return $this->composeData();

        } catch (Exception|GuzzleException $exception) {
            return $this->composeData();
        }
    }
}
