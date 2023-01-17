<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetTopController extends Controller
{

    public function show(){
        $tableNames=array('14130001'=>'Аношко',
            '14130002'=>'Арцименя',
        );
        $funNames=array('14130001'=>'Окрошка Артем',
            '14130002'=>'Цыцыменя Даниил',
        );

        echo 'hello';
        $json = file_get_contents('https://iis.bsuir.by/api/v1/rating?year=2021&sdef=20028');
        $obj = json_decode($json, true);
        //var_dump($obj[0]);
        $topOneRezi=$funNames[$obj[0]['studentCardNumber']];
        //echo"\n\nСЕЙЧАС ТОП 1 РЭЗИ ЭТО: ".$tableNames[$obj[0]['studentCardNumber']];





        return view('mainView', ['topOneRezi' => $topOneRezi,'topArray'=>$obj,'table'=>$tableNames, 'funNames'=>$funNames] );

    }
}
