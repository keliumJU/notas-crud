<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Nota;
use App\Estudiante;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_est_prom= DB::table('notas')
            ->join('estudiantes', 'notas.id_estudiante', '=', 'estudiantes.id')
            ->select('estudiantes.id as ident', 'estudiantes.name as nombre','estudiantes.last_name as apellido', DB::raw('round(AVG(notas.nota),0) as promedio'))
            ->groupBy('estudiantes.id')
            ->get();

        return view('notas.index', compact('list_est_prom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Estudiante::all();
        return view('notas.nuevo', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'est' => 'required|max: 100'
        ]);

        $ele= new Nota();
        $ele->nota= $request->input('nota_est');
        $ele->id_estudiante= $request->input('est');
        $ele->save();
        return redirect('/notas'); 
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
    public function edit($id){ 

        $est=Estudiante::where('id', $id)->first();
        $est_notas=Nota::where('id_estudiante', $id)->get();
        return view('notas.edit',compact('est', 'est_notas'));
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
        /*
        $notas_est = $request->input('nota_est');
            echo '<pre>';
    var_dump($notas_est);
    echo '</pre>';
        
        foreach($notas_est as $not){
            $notap = Nota::where('id', $not->id)->first(); 
            if($not->id != NULL){
                $notap->nota = $not->nota;
                $notap->save();
            }
       }
        return redirect('/notas');*/

        $notas_est = $request->input('nota_est');
        foreach ($notas_est as $clave => $valor) {
            if($valor != NULL){
                $notap = Nota::where('id', $clave)->first(); 
                $notap->nota = $valor;
                $notap->id_estudiante = $id;
                $notap->save();
            } 
        }

        return redirect('/notas');
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
