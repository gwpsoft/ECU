<!-- Header -->
@include('admin/header')
<title>Project details . . . .</title>
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
          <h3><u>Project: {{ $projectName }}</u></h3>
        </div>
        <div style="float: right;">
          <a href="#" onclick="takePDF(); return false;" title="Download PDF">
            <img src="{{ URL::asset('assets/img/icons/pdf.png') }}" style=" cursor:pointer">
          </a>
        </div>
      </div>
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
              {{-- {!! Form::select('weekFrom', $weekNumbers, '01', ['class' => 'select2', 'style' => 'width: 135px', 'selected' => 'Select Month']) !!} --}}
              {{-- <option value="" selected disabled>Weeknr</option> --}}
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
      </div>
    </div>

    <div class="block">
      <div class="header">
        <h2 class="heading">ALLE REGIE UREN</h2>
      </div>

      <div class="content">
        <table class="table table-bordered table-striped sortable" id="myTable1">
          <thead>
            <tr>
              <th>Weekstaat ID</th>
              <th>Weeknr.</th>
              <th>Totaal Regie Uren</th>
              <th>Opgebracht</th>
              <th>Kosten</th>
              <th>Resultaat</th>
            </tr>
          </thead>

          <tbody>
            @if (sizeof($regie) > 0)
              @foreach ($regie as $reg)
                <tr>
                  <td><a href="{{ url('admin/Edit-weekstaat/'.$reg->id) }}">{{ $reg->id }}</a></td>
                  <td>{{ $reg->Weeknumber }}</td>
                  <td class="right">{{ number_format($reg->RegieHours, 2) }}</td>
                  <td class="right">{{ number_format($reg->Opgebracht, 2) }}</td>
                  <td class="right">{{ number_format($reg->Kosten, 2) }}</td>
                  <td class="right">
                    @if ($reg->gain > 0)
                      <span class="label label-success" style="font-size: 12px;">
                        {{ number_format($reg->gain, 2) }}
                      </span>
                    @else
                      <span class="label label-danger" style="font-size: 12px;">
                        {{ number_format($reg->gain, 2) }}
                      </span>
                    @endif
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div> <!-- .content class ends -->
    </div><!-- block class ends -->

  </div>
</div>


<div class="row">
  <div class="col-md-12">

    <div class="block">
      <div class="header">
        <h2 class="heading">ALLE AANGENOMEN UREN</h2>
      </div>

      <div class="content">
        <table class="table table-bordered table-striped sortable" id="myTable2">
          <thead>
            <tr>
              <th>Weekstaat ID</th>
              <th>Weeknr.</th>
              <th style="width: 23%;">Totaal Aangenomen Uren</th>
              <th>Opgebracht</th>
              <th>Kosten</th>
              <th>Resultaat</th>
            </tr>
          </thead>

          <tbody>
            @if (sizeof($aan) > 0)
              @foreach ($aan as $an)
                <tr>
                  <td><a href="{{ url('admin/Edit-weekstaat/'.$an->id) }}">{{ $an->id }}</a></td>
                  <td>{{ $an->Weeknumber }}</td>
                  <td class="right">{{ number_format($an->AanHours,2) }}</td>
                  <td class="right">{{ number_format($an->Opgebracht,2) }}</td>
                  <td class="right">{{ number_format($an->Kosten,2) }}</td>
                  <td class="right">
                    @if ($an->gain > 0)
                      <span class="label label-success" style="font-size: 12px;">
                        {{ number_format($an->gain,2) }}
                      </span>
                    @else
                      <span class="label label-danger" style="font-size: 12px;">
                        {{ number_format($an->gain,2) }}
                      </span>
                    @endif
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div> <!-- .content class ends -->
        </div><!-- block class ends -->

        <div class="block" style="padding: 0; margin: 0;">
          <div class="header">
            <h2 class="heading">Totalen</h2>
          </div>

          <div class="content">
            <div class="row">
              <table class="table table-bordered table-striped sortable" id="myTable3">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th>Totaal Aantal Uren</th>
                    <th>Totaal Opgebracht</th>
                    <th>Totale Kosten</th>
                    <th>Resultaat</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Regie uren</td>
                    <td class="right">{{ number_format($totalRegieUren, 2) }}</td>
                    <td class="right">{{ number_format($totalRegieBearing, 2) }}</td>
                    <td class="right">{{ number_format($totalRegieRate, 2) }}</td>
                    <td class="right">
                      @if ($totalRegieResult > 0)
                        <span class="label label-success" style="font-size: 12px;">
                          {{ number_format($totalRegieResult,2) }}
                        </span>
                      @else
                        <span class="label label-danger" style="font-size: 12px;">
                          {{ number_format($totalRegieResult,2) }}
                        </span>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Aangenomen Uren</td>
                    <td class="right">{{ number_format($totalAanUren, 2) }}</td>
                    <td class="right">{{ number_format($totalAanBearing, 2) }}</td>
                    <td class="right">{{ number_format($totalAanRate, 2) }}</td>
                    <td class="right">
                      @if ($totalAanResult > 0)
                        <span class="label label-success" style="font-size: 12px;">
                          {{ number_format($totalAanResult,2) }}
                        </span>
                      @else
                        <span class="label label-danger" style="font-size: 12px;">
                          {{ number_format($totalAanResult,2) }}
                        </span>
                      @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <br>

            <div class="row">
              <table class="table table-bordered table-striped sortable">
                <tbody>
                  <tr>
                    <td style="width: 21%;">Totaal</td>
                    <td style="width: 23.2%;" class="right">{{ number_format($totalRegieUren + $totalAanUren, 2) }}</td>
                    <td style="width: 23.3%;" class="right">{{ number_format($totalRegieBearing + $totalAanBearing, 2) }}</td>
                    <td style="width: 18.4%;" class="right">{{ number_format($totalRegieRate + $totalAanBearing, 2) }}</td>
                    <td style="" class="right">
                      @if (($totalRegieResult + $totalAanResult) > 0)
                        <span class="label label-success" style="font-size: 12px;">
                          {{ number_format($totalRegieResult + $totalAanResult,2) }}
                        </span>
                      @else
                        <span class="label label-danger" style="font-size: 12px;">
                          {{ number_format($totalRegieResult + $totalAanResult,2) }}
                        </span>
                      @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div><!-- content class ends -->

        </div><!-- block class ends -->

  </div>
</div>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  <script type="text/javascript">

          $('#myTable1').DataTable({
            "language": {
                "search": "Zoeken:"
              },
              "order": [[ 0, "desc" ]]
                // destroy: true,
                // paging: false,
                // searching: false
            });

          $('#myTable2').DataTable({
            "language": {
                "search": "Zoeken:"
              },
              "order": [[ 0, "desc" ]]
                // destroy: true,
                // paging: false,
                // searching: false
            });

          $('#myTable3').DataTable({
                "bInfo" : false,
                "paging": false,
                "bFilter": false,
                "order": [[ 0, "desc" ]]
                // destroy: true,
            });

          $('#myTable4').DataTable({
                "bInfo" : false,
                "paging": false,
                "bFilter": false
                // destroy: true,
            });


    function checkRecords() {

      let url      = "{{ url('admin/projects/' . $id . '/details') }}";
      let starting = document.getElementById('yearFrom').value + document.getElementById('weekFrom').value;
      let ending   = document.getElementById('yearTo').value + document.getElementById('weekTo').value;

      gotoURL = url + `?starting=${starting}&&ending=${ending}`;

      window.location.href = gotoURL;

    }

    function takePDF() {
      let url      = "{{ url('admin/ProjectDetailsPDF/' . $id) }}";
      let starting = document.getElementById('yearFrom').value + document.getElementById('weekFrom').value;
      let ending   = document.getElementById('yearTo').value + document.getElementById('weekTo').value;

      gotoURL = url + `?starting=${starting}&&ending=${ending}`;

      window.location.href = gotoURL;

    }


    function clearRecords() {
      let url      = "{{ url('admin/projects/' . $id . '/details') }}";
      gotoURL      = url ;

      window.location.href = gotoURL;

    }
  </script>
