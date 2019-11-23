<?php
return array(
    // set your paypal credential
    'client_id' => 'AX2NkAY8hHgWf5bPNT4Ujc8WVljO27dZFbKV722izdj9QNwTUB3ccwVVwio9ObOzAY-ECSqnTZTuEk-S',
    'secret' => 'EGV6YHGSjQqhz2dRY_An9QpEx_vvel4aIjeloIL35LEhXtAiB_TvCAzNMXWQTcRJ3gjcCMGZaZL3fWwq',
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);