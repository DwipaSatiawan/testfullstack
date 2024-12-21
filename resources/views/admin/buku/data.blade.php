<table  id="mydata" class="table table-striped table-bordered nowrap" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Admin</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
    </thead>


    <tbody>
    	@php ($no = 1)
		@foreach($dtadmin as $row)
            <tr>
                <td>{{ $no++ }}</td>
				<td>{{ $row->id_admin }}</td>
				<td>{{ $row->nama_admin }}</td>
				<td>{{ $row->username_admin }}</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#crud-<?= $titleid; ?>" data-id="{{ $row->id_admin }}" class="edit-<?= $titleid; ?> btn btn-info btn-sm" title="Ubah Data"><i class="fa fa-pencil"></i> Ubah</a>
                </td>
            </tr>
		@endforeach
    </tbody>
</table>


<script>

    $(document).ready(function() {

        $('#mydata').dataTable({ 
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                            var data = row.data();
                            return 'Details data '+data[2];
                        }
                    } ),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                        tableClass: 'table'
                    } )
                }
            },

            columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 2 },
            { responsivePriority: 3, targets: -1 },
            ]

        });
    });
</script>