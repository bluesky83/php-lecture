<?php

require_once './vendor/autoload.php';

// 데이터베이스 연결
// 세션을 켜는 일
// 에러 핸들러 등록하기,
// 환경 설정하기 ...

// ServiceProvider -> 설정하도록 설계할 것이다.

use Eclair\Support\ServiceProvider;
use Eclair\Application;

class SessionServiceProvider extends ServiceProvider {
    public function register() {
        // session_set_save_hanlder
    }

    public function boot() {
        session_start();
    }
}


$app = new Application([
    SessionServiceProvider::class
]);

$app->boot();

?> 