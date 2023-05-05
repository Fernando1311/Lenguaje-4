<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    public function index(Request $request){

        $texto=$request->get('buscar');
        $notas=DB::table('notas')
                    ->select('id','texto','fecha', 'contacto_id')
                    ->where('texto', 'LIKE', '%'.$texto.'%')
                    ->orwhere('fecha', 'LIKE', '%'.$texto.'%')
                    ->paginate(10);
        return view ('Nota.raiznota', compact('notas', 'texto'));
    }

    public function show($id){
        $notas = Nota::findOrFail($id);
        return view ('Nota.NotaIndividual', compact('notas'));
    }

    public function create(){
        return view('Nota.FormularioNota');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/
    public function store(Request $request){

        $request->validate([   //validar
            'texto'=>'required',
            'fecha'=>'required',
        ]);
        

        $nuevoNota = new Nota();

        //formulario
        $nuevoNota->texto =  $request->input("texto");
        $nuevoNota->fecha = $request->input("fecha");
        $nuevoNota->contacto_id = $request->input("idC");

        if($nuevoNota->save()){
            return redirect()->route('nota.index')->with('mensaje', 'El estudiante fue creado exitosamente.');
        }else{
            return back();
        }
    }

    public function update(Request $request, $id){

        $request->validate([   //validar
            'texto'=>'required',
            'fecha'=>'required',
        ]);
        

        $Nota = Nota::findOrFail($id);

        //formulario
        $Nota->texto =  $request->input("texto");
        $Nota->fecha = $request->input("fecha");
        $Nota->contacto_id = $request->input("idC");

        if($Nota->save()){
            return redirect()->route('nota.index')->with('mensaje', 'El Estudiante fue modificado Exitosamente.');
        }else{
            return back();
        }
    }


    public function edit($id){
        $notas = Nota::findOrFail($id);
        return view ('Nota.EditarNota', compact('notas'));
    }
    
    public function destroy($id){
        Nota::destroy($id);

        //Se redigira

        return redirect('/contactos/')->with('mensaje', 'Estudiante borrado completamente');
    }
}
