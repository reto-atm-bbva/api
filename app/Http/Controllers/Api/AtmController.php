<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AtmResource;
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
    public function index(Request $request)
    {

        if ($limit = $request->get('limit')) {
            $atms = $this->atm->allWithLimit($limit);
        }else{

            $atms = $this->atm->all();
        }

        return  AtmResource::collection($atms);
    }


    public function show($id)
    {
        $atm = $this->atm->find($id);
        return new AtmResource($atm);
    }

    public function findByLatLng(Request $request)
    {
        $lat = $request->get('lat');
        $lng = $request->get('lng');

        if ($lat && $lng) {
            $atm = $this->atm->findByLatLng($lat, $lng);
            return new AtmResource($atm);
        }

        throw new \Exception("Invalid data params", 429);

    }


}
