<?php

namespace App\Repositories\Eloquent;

use App\Models\Atm;
use App\Repositories\Contracts\IAtm;

class AtmRepository implements IAtm
{


    public function all()
    {
        return Atm::all();
    }

    public function find($id)
    {
        return Atm::find($id);
    }

    public function findByLatLng($lat, $lng)
    {
        $whereSentences = Atm::whereMultipleSQL(array(
            [
                'field' => "Latitud",
                'operator' => "=",
                'value' => $lat
            ],
            [
                'field' => "Longitud",
                'operator' => "=",
                'value' => $lng
            ],
        ));

        $whereSentences .= Atm::limitSQL(1);

        return Atm::select('*', $whereSentences)->firstOrFail();

    }

    public function allWithLimit($limit)
    {
        return Atm::all('*', $limit);
    }
}
