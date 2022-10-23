<?php

namespace App\Repositories\Contracts;

interface IAtm
{
    public function all();

    public function allWithLimit($limit);

    public function find($id);

    public function findByLatLng($lat, $lng);


}
