@extends('themes.metronic.master')
@section('title', 'Client Add')
@section('content')

<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            
             
            <!-- BEGIN PROFILE CONTENT -->
            <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Tambah Team</span>
                                </div>
                                 
                            </div>
                            <div class="portlet-body">
                                    <div class="box-body">
                                        <div class="messages"></div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ old('nama') }}"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="{{ old('jabatan') }}"> </div>
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
                                                            <input type="file" name="foto_team"> 
                                                        </span>
                                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                         
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                            </div>
                            <div class="portlet-footer">
                                <div class="messages"></div>
                                <button type="submit" value="Simpan" class="btn green button-submit"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
            </form>
        </div>
    </div>
</div>
 @endsection
 @push('scripts')
<link href="{{ asset('/metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
<script src="{{ asset('/metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $('#button-submit').click(function () {
        $('#btn_saverequest').addClass('disabled');
        var the_data = new FormData(document.getElementById("frm-ptp"));
        $.ajax({
            url: "",
            type: "POST",
            data: the_data,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            dataType: 'JSON',
    
            beforeSend: function (xhr) {
                //$("#loading-all").show();
            },
            success: function (response) {
                if(response.success){
                    //resetform();
                    $('#btn_saverequest').removeClass('disabled');
                    //swal("Selamat",response.msg,"success");
                    swal({
                        title: "Selamat!",
                        text: response.msg,
                        type: "success",
                        timer: 4000,
                        showConfirmButton: true
                    }, function () {
    
                        window.history.back();
                    });
                }else{
                    $(".messages").empty().append(response.msg);
                    $('#btn_saverequest').removeClass('disabled');
                }
            }
        });
    });
    $('.btn_cancel').click(function () {
        resetform();
    });
    function resetform(){
        $('#frm-request').trigger("reset");
    
    }
    
    </script>
@endpush