<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactoController extends Controller
{
    public function index(Request $request){

        $texto=$request->get('buscar');
        $contactos=DB::table('contactos')
                    ->select('id','nombre','apellido', 'correo_electronico', 'telefono')
                    ->where('nombre', 'LIKE', '%'.$texto.'%')
                    ->orwhere('apellido', 'LIKE', '%'.$texto.'%')
                    ->orwhere('correo_electronico', 'LIKE', '%'.$texto.'%')
                    ->orwhere('telefono', 'LIKE', '%'.$texto.'%')
                    ->paginate(10);
        return view ('Contacto.raizcontacto', compact('contactos','texto'));
    }

    public function show($id){
        $contacto = Contacto::findOrFail($id);
        return view ('Contacto.ContactoIndividual', compact('contacto'));
    }

    public function create(){
        return view('Contacto.FormularioContacto');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/
    public function store(Request $request){

        $request->validate([   //validar
            'nombre'=>'required|alpha',
            'apellido'=>'required|alpha',
            'correo_electronico'=>'required',
            'telefono'=>'required'
        ]);
        

        $nuevoContacto = new Contacto();

        //formulario
        $nuevoContacto->nombre =  $request->input("nombre");
        $nuevoContacto->apellido = $request->input("apellido");
        $nuevoContacto->correo_electronico= $request->input("correo");
        $nuevoContacto->telefono = $request->input("telefono");

        if($nuevoContacto->save()){
            return redirect()->route('contacto.index')->with('mensaje', 'El estudiante fue creado exitosamente.');
        }else{
            return back();
        }
    }

    public function update(Request $request, $id){

        $request->validate([   //validar
            'nombre'=>'required|alpha',
            'apellido'=>'required|alpha',
            'correo_electronico'=>'required',
            'telefono'=>'required'
        ]);
        

        $Contacto = Contacto::findOrFail($id);

        //formulario
        $Contacto->nombre =  $request->input("nombre");
        $Contacto->apellido = $request->input("apellido");
        $Contacto->correo_electronico= $request->input("correo");
        $Contacto->telefono = $request->input("telefono");

        if($Contacto->save()){
            return redirect()->route('contacto.index')->with('mensaje', 'El Estudiante fue modificado Exitosamente.');
        }else{
            return back();
        }
    }


    public function edit($id){
        $contacto = Contacto::findOrFail($id);
        return view ('Contacto.EditarContacto', compact('contacto'));
    }
    
    public function destroy($id){
        Contacto::destroy($id);

        //Se redigira

        return redirect('/contactos/')->with('mensaje', 'Estudiante borrado completamente');
    }

}
