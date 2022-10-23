<?php

namespace App\Models;

use App\Base\BigQueryModel;

class Atm extends BigQueryModel
{

    public  $table = 'atm';
    public $dataset = 'dev';
    public $primaryKey = 'ATM';

    protected $fillable = [
        'ATM',
        'Sitio',
        'CR',
        'Division',
        'Marca',
        'Tipo_dispositivo',
        'Estatus_dispositivo',
        'Calle',
        'Num__Ext_',
        'Estado',
        'Ciudad',
        'CP',
        'Del_Muni',
        'Colonia',
        'Latitud',
        'Longitud',
        'Tipo_localidad',
        'IDC',
        'ETV'
    ];


}
