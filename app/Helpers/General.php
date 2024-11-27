<?php
    namespace App\Helpers;

    use Illuminate\Foundation\Inspiring;

    class General {

        public static function GetQuote() {
            $quote = \App\Helpers\Inspiring::quote();
            return explode(' - ', $quote);
        }

    }
?>