<!-- Header -->
@include('admin/header')
<style>
    .dataTables_length  { width:170px !important;}
    .dataTables_length select { width:70px !important;}
</style>

<title>Lijst van de Personeels Aanvragen</title>
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>
            <li class="active">Lijst van de Personeels Aanvragen</li>
        </ol>
    </div>
</div>
<div class="row">
    @include('admin/sidebar')
    <div class="col-md-12">
        @if (Session::has('message'))
            <div class="alert alert-success">
                <b>Success!</b> {{Session::get('message')}}
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif


        <div class="block">
            <div class="header">
                <h2>Lijst van de Personeels Aanvragen</h2>
                <div style="float:right"><a href=" <?php echo URL:: to( 'admin/new_OrderServices' ); ?> " class="btn btn-success">Nieuw Personeel's Aanvraag </a>
                </div>
            </div>
            <div class="content">

                <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="orders">
                    <thead>
                    <tr>
                        <th width="6%">ID</th>
                        <th width="10%">Aanvraagnr.</th>
                        <th width="10%">Project</th>
                        <th width="12%">Datum aanvraag</th>
                        <th width="10%">Begindatum </th>
                        <th width="12%">Aantal mensen</th>
                        <th width="12%">Hoeveel dagen</th>
                        <th width="8%">Werkzaamheden</th>
                        <th width="5%">Afgehandeld</th>
                        <th width="25%">Opties</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    (function($) {
        // your normal jQuery code goes here.
        $(document).ready(function() { /* Do stuff */

            oTable = $('#orders').DataTable({

                "processing": true,

                "serverSide": true,

                "ajax": "{{ route('datatable.getAllOrders') }}",
                "order": [[ 0, "desc" ]],
                "columns": [
                    {data: 'ID', name: 'ID'},

                    {data: 'Aanvraagnr', name: 'Aanvraagnr'},

                    {data: 'Project', name: 'Project'},

                    {data: 'Datum aanvraag', name: 'Datum aanvraag'},

                    {data: 'Begindatum', name: 'Begindatum'},

                    {data: 'Aantal mensen', name: 'Aantal mensen'},

                    {data: 'Hoeveel dagen', name: 'Hoeveel dagen'},

                    {data: 'Werkzaamheden', name: 'Werkzaamheden'},

                    {data: 'Afgehandled', name: 'Afgehandled'},

                    {data: 'Opties', name: 'Opties', searchable: false,orderable: false}

                ]

            });

        });
    })(jQuery);

</script>

@include('admin/footer')</div>
