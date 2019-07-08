<?php
//DATABASE INFO
define('DB_HOST',                      'localhost');
define('DB_PORT',                      '3306');
define('DB_USER',                      'root');
define('DB_PASS',                      '');
define('DB_NAME',                      'blockchain');

//PEERS
define('PEERS_REQUIRED',                1);
define('PEERS_MAX',                     10);

//MINER INFO
define('MINER_MAX_SUBPROCESS',          5);
define('MINER_TIMEOUT_CLOSE',           30);
define('SHOW_INFO_SUBPROCESS',          true);

//PHP RUN
define('PHP_RUN_COMMAND',               'php');
//define('PHP_RUN_COMMAND',             'C:\php\php.exe');

define('DISPLAY_DEBUG',                 false);
define('DISPLAY_DEBUG_LEVEL',           1); //Levels: 1-4

// MXC BOOTSTRAP NODE INFO
define('NODE_BOOTSTRAP',                'mainnet.j4f.dev');
define('NODE_BOOSTRAP_PORT',            80);
define('NODE_BOOTSTRAP_TESTNET',        'testnet.j4f.dev');
define('NODE_BOOSTRAP_PORT_TESTNET',    80);

//OS INFO
define('IS_WIN',                        (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? true:false);
?>