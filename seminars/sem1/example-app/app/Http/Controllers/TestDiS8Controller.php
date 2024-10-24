<?php

namespace App\Http\Controllers;

use App\Services\CustomLogServiceS8Interface;
use App\Services\SmsSenderS8Interface;
use Illuminate\Http\Request;

class TestDiS8Controller extends Controller
{
    public function showUrl(Request $request, CustomLogServiceS8Interface $customLog)
    {
        echo $request->getUri();
        $customLog->rotateLogs();
    }

    public function sendSms(SmsSenderS8Interface $sender)
    {
        $sender->send('Hello, world!');
    }
}
