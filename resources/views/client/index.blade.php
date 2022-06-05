@extends('themes.metronic.master')
@section('title', 'Client')
@section('content')
<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <div class="portlet light ">
            <div class="portlet-title">
                
                <style>
                    table.filter_pegawai tr td {
                        padding-top: 2px;
                    }
                </style>
            <form action="#" id="form-search" method="post" accept-charset="utf-8">
                @csrf
                <table class="filter_pegawai" sborder=0 width='100%' cellpadding="10">
                    <tr>
                        <td width="200px"><label for="example-text-input" class="col-form-label">Nama Client</label></td>
                        <td colspan=2><input class="form-control" type="text" name="nama" value="" ></td>
                    </tr>
                    <tr>
                        <td colspan=4>
                            <a href="/client/create" class="btn blue button-submit pull-right show-modal"> Tambah
                                <i class="fa fa-plus"></i>
                            </a>
                            
                            &nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;
                            <button type="botton" class="btn btn-success pull-right btn_cari"><i class="fa fa-search"></i> Cari</button>
                            &nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </form>
            </div>
            <div class="portlet-body">
                 <table class="slug-table table table-bordered table-striped table-responsive table-data table-hover">
                    <thead>
                    <tr>
                        <th style="width:10px">No</th>
                        <th>Nama Client</th>
                        <th>Logo</th>
                        <th width="60px" align="center">#</th></tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
     
</div>
@endsection
@push('scripts')
<script src="{{ asset('/metronic/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ asset('/metronic/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/metronic/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
 <script type="text/javascript">
      
      $table = $(".table-data").DataTable({
        
        dom : "<'row'<'col-sm-6'><'col-sm-6'>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-2'l><'col-sm-3'i><'col-sm-7'p>>",
        processing: true,
        serverSide: true,
        "columnDefs": [
                        {"className": "text-center", "targets": [0]},
                        { "targets": [0], "orderable": false }
                    ],
        ajax: {
            "url": "{{ route('client','action=datatable') }}",
            "data": function(d) {
                d.form_search_values = $("#form-search").serializeArray();
            }
        },
        "aoColumns": [
            {
                        "mData": "id",
                        "searchable": false,
                        'class': 'dt-center'
                    },
                    {
                        "mData": "nama",
                        "searchable": false,
                        'class': ''
                    },
                    
                    {
                        "mData": null,
                        "orderable": false,
                        "searchable": false,
                        'sWidth': '150px',
                        'class': 'dt-center',
                        "mRender": function(data, type, full) {
                            if (full.logo) {
                                return "<img src='{{ asset('/assets/img/clients') }}/" + full.logo + "' height='40px' />";
                            }else
                                return "";
                        }
                    },
                    {
                        "mData": null,
                        "orderable": false,
                        "searchable": false,
                        'sWidth': '150px',
                        'class': 'dt-center',
                        "mRender": function(data, type, full) {
                            var actions = [];
                            actions.push("<div class='btn-group'>");
                            if (full.edit_url) {
                                actions.push("<a data-toggle='tooltip' title='Hapus Pilihan' href='" + full.edit_url + "' class='btn btn-sm btn-warning'  ><i class='fa fa-edit'></i></a>");
                            }
                            if (full.delete_url) {
                                actions.push("<a data-toggle='tooltip' title='Hapus Pilihan' link='" + full.delete_url + "' class='btn btn-sm btn-danger btn-delete'  ><i class='fa fa-remove'></i></a>");
                            }
                            actions.push("</div>");
                            return actions.join('');
                        }
                    }
                ]
    });
    
    $(".btn_cari").click(function(){
        $table.ajax.reload(null,true);
        return false;
    });

$('body').on('click','.btn-delete',function () { 
	var link =$(this).attr("link");
	swal({
		title: "Anda Yakin?",
		text: "Delete Client!",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: 'btn-danger',
		confirmButtonText: 'Ya, Delete!',
		cancelButtonText: "Tidak, Batalkan!",
        cancelButtonClass: 'btn-danger',
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function (isConfirm) {
		if (isConfirm) {
			var post_data = "_token={{ csrf_token() }}";
			$.ajax({
					url: link,
					type:"POST",
					data: post_data,
					dataType: 'JSON',
					timeout:180000,
					success: function (result) {
						if(result.success){
							swal("Deleted!", result.msg, "success");
                         	$table.ajax.reload(null,true);
						}else{
							swal("Perhatian!", result.msg, "error");
						}
				},
				error : function(error) {
					alert(error);
				} 
			});
		} else {
			swal("Batal", "Hapus data dibatalkan", "error");
		}
	});
}); 
</script>
@endpush