<?php

namespace App\Http\Controllers;

use Exportable;
use Illuminate\Http\Request;
use App\Transcript;
use App\Clases;
use DB;
use Excel;
use App\Http\Requests\TranscriptRequest;
use lluminate\View\Middleware\ShareErrorsFromSession;
use vendor\laravel\framework\src\Illuminate\Validation\ValidationException;
use App\Exports\ExportTranscripts;
use App\Imports\ImportTranscripts;

class TranscriptController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['transcripts']=Transcript::with('class')->paginate(5);

        $data['clases']=DB::table('class')->get();

        return view('transcript',$data);
    }
    public function search(Request $request){
        $transcripts=Transcript::with('class')
            ->where('ten_mon_hoc', 'LIKE', '%' . $request->search . '%')
            ->get();
        if($transcripts->count()>0){
            return response()-> json([
                'status'=>'200',
                'data'=>$transcripts
            ]);
        }
        else{
            return response()-> json([
                'status'=>'404',
                'messenger'=>'Không tìm thấy kết quả'
            ]);
        }    


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TranscriptRequest $request)
    {
       
        Transcript::create($request->all());
        return response()-> json([
            'status'=>'200',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item_transcript=Transcript::with('class')
        ->where('id_transcript',$id)->first();
        return response()-> json([
            'status'=>'200',
            'data'=>$item_transcript
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['transcripts']=Transcript::with('class')
        ->where('id_transcript',$id)->first();
        $data['clases']=DB::table('class')->get();

            return response()-> json($data);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TranscriptRequest $request, $id)
    {
        // Transcript::whereId($id)->update($request->all());
        // $transcript=Transcript::find('id_transcript',$id);
        // // dd($transcript->id_class);
        // $transcript->ten_mon_hoc=$request->ten_mon_hoc;
        // $transcript->id_class=$request->id_class;
        // $transcript->save();
        
        return $transcript = DB::table('transcripts')
              ->where('id_transcript', $id)
              ->update(['ten_mon_hoc' => $request->ten_mon_hoc,'id_class' => $request->id_class]);
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('oooo');
        return $transcripts=Transcript::where('id_transcript',$id)->delete();
            
    }
    public function destroy_some(Request $request)
    {
        $array=$request->array;
        foreach($array as $id){
            $this->destroy($id);
        }
        return response()->json(['202']);
    }
    
    public function destroy_all()
    {        
        Transcript::query()->delete();
        return response()->json(['202']);
    }

    public function export(){
        // dd('ok');
        return Excel::download(new ExportTranscripts(), 'transcript.xlsx');
    }
    public function import(Request $request){
        // dd($request->all());
        // dd('ok');
        Excel::import(new ImportTranscripts,request()->file('import_file'));
        return back();
    }
}
