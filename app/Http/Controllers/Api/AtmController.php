<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\IAtm;
use Illuminate\Http\Request;

class AtmController extends Controller
{

    protected $atm;

    public function __construct(IAtm $atm)
    {
        $this->atm = $atm;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->atm->all();
    }


    public function show($id)
    {
        return $this->atm->find($id);
    }

}
