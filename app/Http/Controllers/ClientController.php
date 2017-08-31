<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Person;
use App\Client;
use App\Country;
use App\City;
use App\Department;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //inicialmente se cargaran los combobox con datos de la BD
        $catCountries = Country::orderBy('nompais','ASC')->lists('nompais','id');
        $catDepartments = Department::orderBy('nomdepartamento','ASC')->lists('nomdepartamento','id');
        $catCities = City::orderBy('nomciudad','ASC')->lists('nomciudad','id');
              
        $catSellers = \DB::table('sellers')
        ->select('sellers.id','people.nombrecompleto')
        ->join('people', 'sellers.persona_id', '=', 'people.id')
        ->lists('people.nombrecompleto','sellers.id');

        return view('client.create',compact('catCountries','catDepartments','catCities','catSellers'));
    }

    public function selectAjax(Request $request){
  
        $foreign_id =  request()->get('foreign_id');
        $foreign_name = request()->get('foreign_name');
        $field = request()->get('field');
        $class_name = 'App\\'.request()->get('class_name');
        
        if($request->ajax())
        {
           $selectModel = $class_name::orderBy($field,'ASC')->where($foreign_name,$foreign_id)->lists($field,'id');
           $data = view('partials.ajax-select',compact('selectModel'))->render();
           return response()->json(['options'=>$data]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //petición mediante ajax
        if($request->ajax())
        {
          $person = new Person;
          $person->nit = $request->nit;
          $person->nombrecompleto = $request->nombrecompleto;
          $person->direccion = $request->direccion;
          $person->telefono = $request->telefono;
          $person->ciudad_id =$request->ciudad;
          $person->save();

          $client = new Client;
          $client->cupo  = $request->cupo;
          $client->saldocupo = $request->saldocupo;
          $client->porcentajevisitas = $request->porcentajevisitas;
          $client->person_id = $person->id;
          $client->save();

          return response()->json(['message'=>'EL registro ha sido guardado exitósamente']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
