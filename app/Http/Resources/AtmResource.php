<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AtmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ATM' => $this['ATM'],
            'Sitio' => $this['Sitio'],
            'CR' => $this['CR'],
            'Division' => $this['Division'],
            'Marca' => $this['Marca'],
            'Tipo_dispositivo' => $this['Tipo_dispositivo'],
            'Estatus_dispositivo', $this['Estatus_dispositivo'],
            'Calle' => $this['Calle'],
            'Num__Ext_' => $this['Num__Ext_'],
            'Estado' => $this['Estado'],
            'Ciudad' => $this['Ciudad'],
            'CP' => $this['CP'],
            'Del_Muni' => $this['Del_Muni'],
            'Colonia' => $this['Colonia'],
            'Latitud' => (float)$this['Latitud'],
            'Longitud' => (float)$this['Longitud'],
            'Tipo_localidad' => $this['Tipo_localidad'],
            'IDC' => $this['IDC'],
            'ETV' => $this['ETV']
        ];
    }
}
