<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 03.12.2022 / 12:21
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class OperaController
 * @package App\Http\Controllers
 */
class OperaController extends Controller
{
    public function linkStart(Request $request)
    {
        $data = $request->input('data');

        if (mb_substr($data, 0, 2) === "LS") {
            $regexDate = '/DA([0-9]*)/';
            preg_match($regexDate, $data, $matchesDate);

            $regexTime = '/TI([0-9]*)/';
            preg_match($regexTime, $data, $matchesTime);

            $date = substr(date('Ymd'), 2);
            $time = date('His');
            $version = 1.01;
            $interfaceType = 'PB';

            return "LD|DA$date|TI$time|V#$version|IF$interfaceType|";

        } else {
            return 'Incorrect';
        }
    }

    /**
     * @param Request $request
     * @return array|string
     */
    public function guestIn(Request $request)
    {
        $data = $request->input('data');
        if (mb_substr($data, 0, 2) === "GI") {
            $regexDate = '/DA([0-9]*)/';
            preg_match($regexDate, $data, $matchesDate);

            $regexTime = '/TI([0-9]*)/';
            preg_match($regexTime, $data, $matchesTime);

            $regexRoomNumber = '/RN([0-9]*)/';
            preg_match($regexRoomNumber, $data, $matchesRoomNumber);

            $regexGuestName = '/GN([\w]*)/';
            preg_match($regexGuestName, $data, $matchesGuestName);

            $regexGuestFirstName = '/GF([\w]*)/';
            preg_match($regexGuestFirstName, $data, $matchesGuestFirstName);

            $regexGuestArrivalTime = '/GA([0-9]*)/';
            preg_match($regexGuestArrivalTime, $data, $matchesGuestArrivalTime);

            $regexGuestDepartureTime = '/GD([0-9]*)/';
            preg_match($regexGuestDepartureTime, $data, $matchesGuestDepartureTime);

            $regexGuestNumber = '/G#([0-9]*)/';
            preg_match($regexGuestNumber, $data, $matchesGuestNumber);


            return [
                'request_type'         => 'CHECK_IN',
                'date'                 => $matchesDate[1],
                'time'                 => $matchesTime[1],
                'room_number'          => $matchesRoomNumber[1],
                'guest_name'           => $matchesGuestName[1],
                'guest_first_name'      => $matchesGuestFirstName[1],
                'guest_arrival_time'   => $matchesGuestArrivalTime[1],
                'guest_departure_time' => $matchesGuestDepartureTime[1],
                'guest_number'         => $matchesGuestNumber[1]
            ];

        } else {
            return "Incorrect";
        }
    }


    public function guestOut(Request $request)
    {
        $data = $request->input('data');

        if (mb_substr($data, 0, 2) === "GO") {
            $regexDate = '/DA([0-9]*)/';
            preg_match($regexDate, $data, $matchesDate);

            $regexTime = '/TI([0-9]*)/';
            preg_match($regexTime, $data, $matchesTime);

            $regexRoomNumber = '/RN([0-9]*)/';
            preg_match($regexRoomNumber, $data, $matchesRoomNumber);

            $regexGuestNumber = '/G#([0-9]*)/';
            preg_match($regexGuestNumber, $data, $matchesGuestNumber);

            return [
                'request_type' => 'CHECK_OUT',
                'date'         => $matchesDate[1],
                'time'         => $matchesTime[1],
                'room_number'  => $matchesRoomNumber[1],
                'guest_number' => $matchesGuestNumber[1]
            ];
        } else {
            return "Incorrect";
        }
    }

}
