<?php

namespace App\Http\Controllers\admin;

use App\Models\Portopolio;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables as datatable;


class PortopolioController extends Controller
{
    //
    public function index()
    {
        $action  = request()->get('action');
        if ($action == 'datatable') {
            return $this->datatablePortopolio();
        }
        return view('portopolio/index',['title'=>"Portopolio"]);
    }
    public function create()
    {
        return view('portopolio/create');
    }
    public function edit($ref="")
    {
        $record = Portopolio::where("id",$ref)->get()->first();
        return view('portopolio/edit',[
            "record"=>$record
        ]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_project' => 'required',
            'tag' => 'required',
        ]);
        $validator->validate();
        $record = Portopolio::where("id",$id)->get()->first();
        // file foto
        $file = $request->file('image_preview');
        if($file){
            if($record->image_preview){
                $image_path = public_path('assets/img/portfolio/').$record->image_preview;  // Value is not URL but directory file path
                // die($image_path);
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $nama_project_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path('assets/img/portfolio/'),$nama_project_file);
            $record->image_preview = $nama_project_file;
        }
        $record->nama_project = $request->nama_project;
        $record->tag = $request->tag;
        $record->save();
        // $request->session()->flash('warning', 'Update berhasil!');
        return redirect()->route("portopolio")->with('success', 'Update berhasil!');
    }
    public function datatablePortopolio()
    {
        $query = Portopolio::with([]);
        $query->orderBy('id', 'ASC');
        $totalCount = $query->count();
        $inputs = request()->post('form_search_values');
        if (is_array($inputs)) {
            foreach ($inputs as $input) {
                if ($input['name'] == 'nama_project') {
                    $query->where(function ($query) use ($input) {
                        $query->where('nama_project','like','%'.$input['value'].'%');
                    });
                }
                if ($input['name'] == 'tag') {
                    $query->where(function ($query) use ($input) {
                        $query->where('tag','like','%'.$input['value'].'%');
                    });
                }
            }
        }
        $query->orderBy('id','asc');
        $dt = datatable::of($query);

        $dt->addColumn('id', function ($row) {
            return $row->id;
        });
        $dt->addColumn('nama_project', function ($row) {
            return $row->nama_project;
        });
       
        $dt->addColumn('image_preview', function ($row) {
            return $row->image_preview;
        });

        $dt->addColumn('edit_url', function ($row) {
            return route("portopolio.edit",$row->id);
        });
        $dt->addColumn('delete_url', function ($row) {
            return route("portopolio.destroy", "action=delete&ref={$row->id}");
        });
        return $dt->make(true);
    }
    public function portopoliodestroy()
    {
        $ref = request()->get('ref');
        $record = Portopolio::where('id', $ref)->get()->first();
        if (!$record) {
            return response()->json([
                'success' => false,
                'msg' => 'Data tidak ditemukan'
            ]);
        }
        if($record->foto){
            $image_path = public_path('assets/img/portfolio/').$record->image_preview;  // Value is not URL but directory file path
            // die($image_path);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $record->delete();
        return response()->json([
            'success' => true,
            'msg' => 'Berhasil dihapus.'
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_project' => 'required',
            'tag' => 'required',
        ]);
        $validator->validate();
        $record = new Portopolio();
        // file logo
        $file = $request->file('image_preview');
        if($file){
            $nama_project_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path('assets/img/portfolio/'),$nama_project_file);
            $record->image_preview = $nama_project_file;
        }
        $record->nama_project = request()->get('nama_project');
        $record->tag = request()->get('tag');
        $record->save();
        return redirect()->route("portopolio")->with('success', 'Data tersimpan!');
    }
}
