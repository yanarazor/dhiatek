<?php

namespace App\Http\Controllers\admin;

use App\Models\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables as datatable;

class ClientController extends Controller
{
    //
    public function __construct(){
        // $request = Request();
        // dd(Request()->route()->action['prefix']);
    }
    public function index()
    {
        


        $action  = request()->get('action');
        if ($action == 'datatable') {
            return $this->datatableClient();
        }
        return view('client/index',['title'=>"Client"]);
    }
    public function create()
    {
        return view('client/create');
    }
    public function edit($ref="")
    {
        $record = Client::where("id",$ref)->get()->first();
        return view('client/edit',[
            "record"=>$record
        ]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);
        $validator->validate();
        $record = Client::where("id",$id)->get()->first();
        // file logo
        $file = $request->file('logo_client');
        if($file){
            if($record->logo){
                $image_path = public_path('assets/img/clients/').$record->logo;  // Value is not URL but directory file path
                // die($image_path);
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path('assets/img/clients/'),$nama_file);
            $record->logo = $nama_file;
        }
        $record->nama = $request->nama;
        $record->save();
        // $request->session()->flash('warning', 'Update berhasil!');
        return redirect()->route("client")->with('success', 'Update berhasil!');
    }
    public function datatableClient()
    {
        $query = Client::with([]);
        $query->orderBy('id', 'ASC');
        $totalCount = $query->count();
        $inputs = request()->post('form_search_values');
        if (is_array($inputs)) {
            foreach ($inputs as $input) {
                if ($input['name'] == 'nama') {
                    $query->where(function ($query) use ($input) {
                        $query->where('nama','like','%'.$input['value'].'%');
                    });
                }
            }
        }
        $query->orderBy('id','asc');
        $dt = datatable::of($query);

        $dt->addColumn('id', function ($row) {
            return $row->id;
        });
        $dt->addColumn('nama', function ($row) {
            return $row->nama;
        });
       
        $dt->addColumn('logo', function ($row) {
            return $row->logo;
        });

        $dt->addColumn('edit_url', function ($row) {
            return '/client/edit/'.$row->id;
        });
        $dt->addColumn('delete_url', function ($row) {
            return route("clientdestroy", "action=delete&ref={$row->id}");
        });
        return $dt->make(true);
    }
    public function clientdestroy()
    {
        $client_id = request()->get('ref');
        $record = Client::where('id', $client_id)->get()->first();
        if (!$record) {
            return response()->json([
                'success' => false,
                'msg' => 'Data tidak ditemukan'
            ]);
        }
        if($record->logo){
            $image_path = public_path('assets/img/clients/').$record->logo;  // Value is not URL but directory file path
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
            'nama' => 'required',
        ]);
        $validator->validate();
        $record = new Client();
        // file logo
        $file = $request->file('logo_client');
        if($file){
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path('assets/img/clients/'),$nama_file);
            $record->logo = $nama_file;
        }
        $record->nama = request()->get('nama');
        $record->save();
        return redirect()->route("client")->with('success', 'Data tersimpan!');
    }
}
