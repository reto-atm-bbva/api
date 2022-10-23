<?php

namespace App\Http\Controllers;

use App\Models\Atm;
use Google\Cloud\BigQuery\BigQueryClient;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function getData()
    {
        //SELECT * FROM `bbva-latam-hack22mex-5012.dev.atm` WHERE `ATM` = '3343' LIMIT 10
//        return (new Atm())->execute('SELECT * FROM `bbva-latam-hack22mex-5012.dev.atm` WHERE `ATM` = ' . " '3343'" . ' LIMIT 10');
//        return (new Atm())->execute('SELECT ATM,Sitio FROM `bbva-latam-hack22mex-5012.dev.atm` WHERE `ATM` = ' . "'3343'" . ' LIMIT 10');
//        return (new Atm())->execute('SELECT ATM,Sitio FROM `bbva-latam-hack22mex-5012.dev.atm` LIMIT 2');
//        return Atm::select('ATM,Sitio', 2);
//        return Atm::all('ATM', 1);
        return Atm::find(3343);
    }
}
