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
}
