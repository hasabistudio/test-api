<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParticipantResource extends JsonResource{

    public function toArray($request){
        $gender = '-';
        if($request->gender == 1){ $gender = 'Laki-Laki';};
        if($request->gender == 0){ $gender = 'Perempuan';};

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'dateOfBirth'   => $this->date_of_birth,
            'PlaceOfBirth'  => $this->place_of_birth,
            'gender'          => $gender,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
           // 'created_at'    => $this->created_at->format('d/m/Y'),
           // 'updated_at'    => $this->updated_at->format('d/m/Y'),
        ];
        //return parent::toArray($request);
    }
}
