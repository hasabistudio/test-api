<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as Controller;
use App\Http\Resources\ParticipantResource;
use App\Models\Master\Participants;
use Illuminate\Http\Request;
use Validator;

class ParticipantController extends Controller{

    public function index(Request $request){
        $model = Participants::paginate(5);
        $data = [
            'total'=>$model->total(),
            'totalPerPage'=>$model->perPage(),
            'lastPage'=>$model->lastPage(),
            // 'item'=>$model->items(),
            'data'=> ParticipantResource::collection($model),
        ];

        return $this->sendResponse($data, 'Participant retrieved successfully.');
    }

    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name'=> 'required|regex:/^[a-zA-Z\s]+$/',
            'hp'=>'required|digits_between:10,15',
            'email'=>'required|email',
            'gender'=>'required|in:-1,0,1',
            'place_of_birth' => 'required|alpha',
            'date_of_birth' => 'required|date'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $model = Participants::create($input);
        return $this->sendResponse(new ParticipantResource($model), 'Participant created successfully.');

    }

    public function show(Participants $participants,$id){
        $validator= Validator::make(['id'=>$id],['id'=>'required|uuid']);
        if($validator->fails()){ return $this->sendError('Validation Error.', $validator->errors());}
        if($model = $participants::find($id)){
            return $this->sendResponse(new ParticipantResource($model), 'Participant retrieved successfully.');

        }
        return $this->sendResponse("", 'Participant not found.');
    }

    public function update(Request $request, Participants $participants,$id){
        $input = $request->all();
        $input['id'] = $id;

        $validator = \Illuminate\Support\Facades\Validator::make($input, [
            'id'=>'required|uuid',
            'name'=> 'required|regex:/^[a-zA-Z\s]+$/',
            'hp'=>'required|digits_between:10,15',
            'email'=>'required|email',
            'gender'=>'required|in:-1,0,1',
            'place_of_birth' => 'required|alpha',
            'date_of_birth' => 'required|date'
        ]);


        if($validator->fails()){
            $message = $validator->failed();
            if(isset($message['id'])){return $this->sendError("404 Not Found", '');}
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if($model = $participants::find($id)){
            unset($input['id']);
            if($model->update($input)){
            return $this->sendResponse(new ParticipantResource($model), 'Participant updated successfully.');
            }
        }
        return $this->sendResponse("", 'Participant not found.');
    }


    public function destroy(Participants $participants,$id){
        if($model = $participants::find($id)){
            if($model->delete()){
                return $this->sendResponse(new ParticipantResource($model), 'Participant delete successfully.');
            }
        }
        return $this->sendResponse("", 'Participant not found.');

    }
}
