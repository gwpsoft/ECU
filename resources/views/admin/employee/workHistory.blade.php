@include('admin/header')
<title>Werkervaring van de werknemer . . . .</title>
<style>
.checker {float:right !important; }
.error { color:#fff; }
.center { text-align:center;}
.left { text-align:left}
.right { text-align:right}
label { font-size:13px;}
table th,td { font-size:12px;}
div.radio { margin-left:0px;} .strong { font-weight:bold; font-size:14px;}
div.checker, div.checker span, div.checker input, div.radio, div.radio span, div.radio input { vertical-align:text-bottom;}
.ml-10 { margin-right: 10px;}

select { padding: 0; }

</style>

@include('admin/sidebar')


<div class="row">
  <div class="col-md-12">

    <div class="block">
      <div class="header">
        <div class="" style="float: left;">
          <h3><u>Naam: {{ $employee->Firstname }} {{ $employee->Lastname }}</u></h3>
        </div>
        <div style="float: right;">
          <a href="#" onclick="takePDF(); return false;" title="Download PDF">
            <img src="{{ URL::asset('assets/img/icons/pdf.png') }}" style=" cursor:pointer">
          </a>
        </div>
      </div><!-- header class ends -->

      <div class="content">
        <div class="row">
          <div class="col-md-2 col-md-offset-3">
            <label for="" style="margin-left: 10px;">Vanaf weeknr.:</label>
          </div>
          <div class="col-md-2">
            <label for="" style="margin-left: 10px;">t/m weeknr.:</label>
          </div>
        </div><!-- row class ends -->

        <div class="row">
          <div class="col-md-2 col-md-offset-3">
            <div class="col-md-6">
              <select class="select2" name="weekFrom" id="weekFrom" style="width: 90px;">
                <option value="" selected disabled>Weeknr</option>
                @foreach ($weekNumbers as $key => $week)
                  <option value="{{ $week }}" {{ ($week == $weekFrom) ? 'selected' : '' }}>{{ $week }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <select class="select2" name="yearFrom" id="yearFrom" style="width: 90px;">
                <option value="" selected disabled>Year</option>
                @foreach ($yearNumbers as $key => $year)
                  <option value="{{ $year }}" {{ ($year == $yearFrom) ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="col-md-6">
              <select class="select2" name="weekTo" id="weekTo" style="width: 90px;">
                <option value="" selected disabled>Weeknr</option>
                @foreach ($weekNumbers as $key => $week)
                  <option value="{{ $week }}" {{ ($week == $weekTo) ? 'selected' : '' }}>{{ $week }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <select class="select2" name="yearTo" id="yearTo" style="width: 90px;">
                <option value="" selected disabled>Year</option>
                @foreach ($yearNumbers as $key => $year)
                  <option value="{{ $year }}" {{ ($year == $yearTo) ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-1">
            <a href="#" onclick="checkRecords(); return false;">
              <img src="{{ asset('assets/img/icons/search.png') }}" alt="">
            </a>
          </div>
          <div class="col-md-1">
            <a href="#" class="btn btn-sm btn-success" onclick="clearRecords(); return false;">Alle uren</a>
          </div>
        </div><!-- row class ends -->

      </div><!-- content class ends -->
    </div><!-- block class ends -->

    <div class="block">
      <div class="header">
        <h2 class="heading">Werk geschiedenis</h2>
      </div><!-- header class ends -->

      <div class="content">
        <table class="table table-bordered table-striped sortable"  id="myTable1">
          <thead>
            <tr>
              <th>Week number </th>
              <th>Project name</th>
              <th>Uitzendbureau</th>
              <th>Ma</th>
              <th>Di</th>
              <th>Wo</th>
              <th>Do</th>
              <th>Vr</th>
              <th>Za</th>
              <th>Zo</th>
              <th>Totaal</th>
            </tr>
          </thead>
          <tbody>
            @if (sizeof($records) > 0)
              @foreach ($records as $key => $record)
                <tr>
                  {{-- <td><a href="{{ url('admin/Edit-weekstaat/'.$record->Weekcard_Id) }}">{{ $record->Weeknumber }}</a></td> --}}
                  <td>{{ $record->Weeknumber }}</td>
                  <td>{{ $record->Project_name }}</td>
                  <td>{{ $record->emp_name }}</td>
                  <td class="right">{{ ($record->Mon) ? number_format($record->Mon, 2) : '' }}</td>
                  <td class="right">{{ ($record->Tue) ? number_format($record->Tue, 2) : '' }}</td>
                  <td class="right">{{ ($record->Wed) ? number_format($record->Wed, 2) : '' }}</td>
                  <td class="right">{{ ($record->Thu) ? number_format($record->Thu, 2) : '' }}</td>
                  <td class="right">{{ ($record->Fri) ? number_format($record->Fri, 2) : '' }}</td>
                  <td class="right">{{ ($record->Sat) ? number_format($record->Sat, 2) : '' }}</td>
                  <td class="right">{{ ($record->Sun) ? number_format($record->Sun, 2) : '' }}</td>
                  <td class="right">{{ number_format($record->Total, 2) }}</td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div><!-- content class ends -->
    </div><!-- block class ends -->

    <div class="block">
      <div class="header">
        <h2 class="heading">Totaal</h2>
      </div><!-- header class ends -->

      <div class="content">
        <table class="table table-bordered table-striped sortable" id="myTable2">
          <thead>
            <tr>
              <th>Naam</th>
              <th>Vanaf week</th>
              <th>Naar week</th>
              <th>Totaal</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $employee->Firstname }} {{ $employee->Lastname }}</td>
              <td>{{ $yearFrom }} {{ $weekFrom }}</td>
              <td>{{ $yearTo }} {{ $weekTo }}</td>
              <td>{{ number_format($total, 2) }}</td>
            </tr>
          </tbody>
        </table>
      </div><!-- content class ends -->
    </div><!-- block class ends -->

  </div><!-- col-md-12 class ends -->
</div><!-- row class ends -->


<script>

$('#myTable1').DataTable({
  "language": {
      "search": "Zoeken:"
    },
    "order": [[ 0, "desc" ]]
      // destroy: true,
      // paging: false,
      // searching: false
  });

  function checkRecords() {

    let url      = "{{ url('admin/employeeWorkHistory/' . $employee->id) }}";
    let starting = document.getElementById('yearFrom').value + document.getElementById('weekFrom').value;
    let ending   = document.getElementById('yearTo').value + document.getElementById('weekTo').value;

    gotoURL = url + `?starting=${starting}&&ending=${ending}`;

    window.location.href = gotoURL;

  }


  function takePDF() {
    let url      = "{{ url('admin/employeeWorkHistoryPDF/' . $employee->id) }}";
    let starting = document.getElementById('yearFrom').value + document.getElementById('weekFrom').value;
    let ending   = document.getElementById('yearTo').value + document.getElementById('weekTo').value;

    gotoURL = url + `?starting=${starting}&&ending=${ending}`;

    window.location.href = gotoURL;

  }


function clearRecords() {
  let url = "{{ url('admin/employeeWorkHistory/' . $employee->id) }}";
  gotoURL = url ;

  window.location.href = gotoURL;

}


</script>
