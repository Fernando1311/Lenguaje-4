<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    public function index(Request $request){
        $texto=$request->get('buscar');
        $eventos=DB::table('eventos')
                    ->select('id','titulo','descripcion', 'fecha_inicio', 'fecha_fin', 'contacto_id')
                    ->where('titulo', 'LIKE', '%'.$texto.'%')
                    ->orwhere('descripcion', 'LIKE', '%'.$texto.'%')
                    ->orwhere('fecha_inicio', 'LIKE', '%'.$texto.'%')
                    ->orwhere('fecha_fin', 'LIKE', '%'.$texto.'%')
                    ->paginate(10);
        return view ('Evento.raizevento', compact('eventos','texto'));
    }

    public function show($id){
        $evento = Evento::findOrFail($id);
        return view ('Evento.EventoIndividual', compact('evento'));
    }

    public function create(){
        return view('Evento.FormularioEvento');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/
    public function store(Request $request){

        $request->validate([   //validar
            'titulo'=>'required|regex:/[a-zA-Z áéíóúñ]+/i',
            'descripcion'=>'required|regex:/[a-zA-Z áéíóúñ]+/i',
        ]);
        

        $nuevoEvento = new Evento();

        //formulario
        $nuevoEvento->titulo =  $request->input("titulo");
        $nuevoEvento->descripcion = $request->input("descripcion");
        $nuevoEvento->fecha_inicio= $request->input("fechaI");
        $nuevoEvento->fecha_fin = $request->input("fechaF");
        $nuevoEvento->contacto_id = $request->input("idC");

        if($nuevoEvento->save()){
            return redirect()->route('evento.index')->with('mensaje', 'El nuevo Evento fue creado exitosamente.');
        }else{
            return back();
        }
    }

    public function update(Request $request, $id){

        $request->validate([   //validar
            'titulo'=>'required|regex:/[a-zA-Z áéíóúñ]+/i',
            'descripcion'=>'required|regex:/[a-zA-Z áéíóúñ]+/i',
        ]);
        

        $Evento = Evento::findOrFail($id);

        //formulario
        $Evento->titulo =  $request->input("titulo");
        $Evento->descripcion = $request->input("descripcion");
        $Evento->fecha_inicio= $request->input("fechaI");
        $Evento->fecha_fin = $request->input("fechaF");
        $Evento->contacto_id = $request->input("idC");

        if($Evento->save()){
            return redirect()->route('evento.index')->with('mensaje', 'El Evento fue modificado Exitosamente.');
        }else{
            return back();
        }
    }


    public function edit($id){
        $evento = Evento::findOrFail($id);
        return view ('Evento.EditarEvento', compact('evento'));
    }
    
    public function destroy($id){
        Evento::destroy($id);

        //Se redigira

        return redirect('/eventos/')->with('mensaje', 'Evento borrado completamente');
    }
}
