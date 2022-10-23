<?php

namespace App\Repositories\Contracts;

interface IAtm
{
    public function all();
    public function find($id);
}
