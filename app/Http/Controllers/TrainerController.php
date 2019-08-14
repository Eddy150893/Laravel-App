<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;
use LaraDex\Trainer;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers=Trainer::all();//Consulta todos los datos de la tabla asociada a este modelo
        return view('trainers.index',compact('trainers'));//y con compact le mandamos los datos
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|max:10',
            'avatar'=>'required|image',
            'description'=>'required'
        ]);
         if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
        }
        $trainer=new Trainer();
        $trainer->name=$request->input('name');
        $trainer->description=$request->input('description');
        $trainer->avatar=$name;
        $trainer->slug = time().Str_slug($trainer->name);//para que guarde automaticamente el slug
        $trainer->save();
        return 'Saved';
       
        //return $request->all();//->metodo para obtener todos los datos que nos envia el usuario
        //return $request->input('name');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(/*$id podemos utilizar id pero ahora usamos $slug*/Trainer $trainer )
    {
        /*1. Pasando el id tanto en la vista como de parametro aca en esta funcion
        $trainer=Trainer::find($id);
        return view('trainers.show',compact('trainer'));*/
        /*2. Pasando el slug tanto en la vista como de parametro en esta funcion
        $trainer=Trainer::where('slug','=',$slug)->firstOrFail();
        */
        /*3. Pasando el slug o id pero utilizando implicit binding entonces el parametro es un objeto del modelo
            tener en cuenta que en este ejemplo se pasa el slug en la vista y por ello modificamos el modelo para
            utilizar tambien splicit binding
        */
        return view('trainers.show',compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer )
    {
        return view('trainers.edit',compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $trainer->fill($request->except(['avatar','slug']));//actualiza todos los datos excepto el avatar, ya que se trata de otra manera
        if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $name=time().$file->getClientOriginalName();
            $trainer->avatar=$name;
            $file->move(public_path().'/images/',$name);
        }
        $trainer->save();
        return "actualizado";
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
