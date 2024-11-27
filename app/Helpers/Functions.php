<?php

    // Arquivo de Funções básicas do Sistema

    function printa($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    function memory() {
        printa(memory_get_peak_usage());
        printa(memory_get_peak_usage()/1024/1024);
    }

    function convertSize($size) {
        $unit = [ 'b', 'kb', 'mb', 'gb', 'tb', 'pb' ];
        return [ @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2), $unit[$i] ];
    }

    function forceFloat($number, $decimals) {
        $number = $decimals < 5 ? round($number, $decimals) : number_format($number, $decimals, '.', '');

        $explode = explode('.', $number);

        $whole = (float) $explode[0];

        $fraction = isset($explode[1]) ? makeIdentReverse($explode[1], $decimals) : makeIdent(0, $decimals);

        $number = $whole;

	    while (true) {
	        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);

	        if ($replaced != $number) {
	            $number = $replaced;
	        } else {
	            break;
	        }
		}

		$number = str_replace(',', '.', str_replace('.', '*', $number));
		$number = str_replace('*', ',', $number);

    	return $number.','.$fraction;
    }
    
    // ===================================================================================
    // ===== Conversão de data
    // ===================================================================================
    
        function dateToSql($date) {
            return !$date ? $date : implode('-', array_reverse(explode('/', $date)));
        }

        function sqlToDateBR($date) {
            return !$date ? $date : \Carbon\Carbon::parse($date)->format('d/m/Y');
        }

        function sqlToDateBRFull($date) {
            return !$date ? $date : \Carbon\Carbon::parse($date)->format('d/m/Y - H:i');
        }

        function sqlToDateBRFullWithSeconds($date) {
            return !$date ? $date : \Carbon\Carbon::parse($date)->format('d/m/Y H:i:s');
        }

        function agora() {
            return \Carbon\Carbon::now();
        }

        function agora_dmy() {
            return \Carbon\Carbon::now()->format('d/m/Y');
        }

        function agora_my() {
            return \Carbon\Carbon::now()->format('m/Y');
        }

        function agora_dmyhi() {
            return \Carbon\Carbon::now()->format('d/m/Y H:i');
        }

        function agora_ymd() {
            return \Carbon\Carbon::now()->toDateString();
        }

        function agora_ymdhi() {
            return \Carbon\Carbon::now()->toDateTimeString();
        }

        function isNotValidDate($function, $compare1, $compare2) {
            if(!$compare1) return false;
            return \Carbon\Carbon::parse($compare1)->$function($compare2);
        }

        function getTimeInterval($start, $end) {
            return \Carbon\Carbon::parse($start)->floatDiffInHours(\Carbon\Carbon::parse($end));
        }
    
        function getTimeIntervalAbs($start, $end) {
            return \Carbon\Carbon::parse($start)->floatDiffInHours(\Carbon\Carbon::parse($end), false);
        }
    
        function getTimeIntervalInMinutes($start, $end) {
            return \Carbon\Carbon::parse($start)->floatDiffInMinutes(\Carbon\Carbon::parse($end));
        }
    
        function getTimeIntervalInDays($start, $end) {
            return \Carbon\Carbon::parse($start)->floatDiffInDays(\Carbon\Carbon::parse($end));
        }
    
    // ===================================================================================

    function getIp() {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        } return request()->ip();
    }

?>