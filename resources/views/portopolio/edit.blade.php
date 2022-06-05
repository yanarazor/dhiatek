@extends('themes.metronic.master')
@section('title', 'Portopolio Edit')
@section('content')

<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Edit Project </span>
                    </div>
                    <div class="actions">
                         
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" action="{{ route('portopolio.update',$record->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label>Nama Project</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" name="nama_project" placeholder="Nama" value="{{ $record->nama_project }}"> </div>
                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <select name="tag" class="form-control">
                                        <option value="">Silahkan Pilih</option>
                                        <option value="web" {{ $record->tag === 'web' ? 'selected' : ''; }} >Web</option>
                                        <option value="app" {{ $record->tag === 'app' ? 'selected' : ''; }}>apps</option>
                                        <option value="desktop {{ $record->tag === 'desktop' ? 'selected' : ''; }}">Desktop</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <div class="input-group">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="input-group input-large">
                                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                <span class="fileinput-filename"> </span>
                                            </div>
                                            <span class="input-group-addon btn-file btn-success">
                                                <span class="fileinput-new"> Select file </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="image_preview"> 
                                            </span>
                                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                             
                                        </div>
                                    </div>
                                    <br>
                                    @if($record->image_preview)
                                    <img src="{{ url('/assets/img/portfolio/'.$record->image_preview) }}" height="100px"/>
                                    @endif
                            </div>
                              
                        </div>
                        <div class="form-actions">
                            <button type="submit" value="Simpan" class="btn green button-submit"><i class="fa fa-save"></i> Simpan</button>
                            <a href="{{ route('portopolio') }}" class="btn default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
 @endsection
 @push('scripts')
<link href="{{ asset('/metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
<script src="{{ asset('/metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    
    </script>
@endpush