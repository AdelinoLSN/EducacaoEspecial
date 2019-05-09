<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Aluno;
use App\Objetivo;
use App\Status;
use App\StatusObjetivo;
use DateTime;


class StatusController extends Controller
{
  public function cadastrar($id_aluno, $id_objetivo){
      $statuses = Status::all();

      $aluno = Aluno::find($id_aluno);
      $objetivo = Objetivo::find($id_objetivo);

      return view("status.cadastrar", ['aluno' => $aluno,
                                       'objetivo' => $objetivo,
                                       'statuses' => $statuses]);
  }

  public function criar(Request $request){
      $validator = Validator::make($request->all(), [
          'status' => ['required'],
      ]);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors())->withInput();
      }

      $statusObjetivo = new StatusObjetivo();
      $statusObjetivo->data = new DateTime();

      $statusObjetivo->objetivo_id = $request->id_objetivo;
      $statusObjetivo->status_id = $request->status;

      $statusObjetivo->save();

      return redirect()->route("objetivo.listar", ["id_aluno" => $request->id_aluno])->with('success','Status atualizado.');
  }
}