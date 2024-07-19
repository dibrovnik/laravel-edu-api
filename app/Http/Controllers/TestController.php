<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function dbTest()
    {
        try {
            DB::connection()->getPdo();
            return 'Connected to database: ' . DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
            return 'Connection failed: ' . $e->getMessage();
        }
    }
}
