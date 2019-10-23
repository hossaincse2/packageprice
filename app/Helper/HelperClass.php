<?php
namespace App\Helper;

class HelperClass {

    public static function randomNumber(){
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
       return $string = str_shuffle($pin);
    }

    public static function macaddress() {

        ob_start();
        //Get the ipconfig details using system commond
                system('ipconfig /all');

        // Capture the output into a variable
                $mycom = ob_get_contents();
        // Clean (erase) the output buffer
                ob_clean();

                $findme = "Physical";
        //Search the "Physical" | Find the position of Physical text
                $pmac = strpos($mycom, $findme);

        // Get Physical Address
                $mac = substr($mycom, ($pmac + 36), 17);
        //Display Mac Address
                return $mac;
    }

}


