<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.08.2022 / 11:17
 */

namespace App\Http\Controllers\Api\ThirdParty;

use App\Http\Controllers\Api\ApiController;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

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

    public function getToday()
    {
        $responseData = [];
        $client = new Client();
        $url = "https://ipakyulibank.uz:8888/webapi/physical/exchange-rates";
        $headers = [
            'Content-Type' => 'application/json',
            'Accept'       => "application/json",
            "X-AppKey"     => "blablakey",
            "X-AppLang"    => "uz",
            "X-AppRef"     => "/physical/valyuta-ayirboshlash/kurslar"
        ];

        try {
            $response = $client->post(
                $url,
                [
                    'headers' => $headers
                ]
            );
        } catch (Exception|GuzzleException $exception) {
            dd($exception->getMessage());
        }

        $data = json_decode($response->getBody()->getContents());

        if (empty($data)){
            return $this->composeData();
        }

        foreach ($data->data->rates as $key => $value){
            $responseData[] = [
                "valyuta" => $key,
                "cb" => $value->rates,
                "value" => $value,
            ];
        }

        $this->setData($responseData);

        return $this->composeData();
    }
}

