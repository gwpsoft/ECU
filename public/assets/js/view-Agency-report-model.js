
function initialReportModelState() {
  let singleWeek = document.getElementById('singleWeek');
  let multipleWeeks = document.getElementById('multipleWeeks');

  // initially
  // singleWeek.checked = true;
  if (singleWeek.checked) {
    showSingle();

  } else {
    showMultiple();
  }

}


function showSingle() {
  document.getElementById('reportFromDate').value = '';
  document.getElementById('reportToDate').value = '';
  document.getElementById('multiErrorMessage').innerHTML = '';
  document.getElementById('singleWeekDIV').style.display = "block";
  document.getElementById('multipleWeeksDIV').style.display = "none";
}


function showMultiple() {
  document.getElementById('singleWeekValue').value = '';
  document.getElementById('singleErrorMessage').innerHTML = '';
  document.getElementById('singleWeekDIV').style.display = "none";
  document.getElementById('multipleWeeksDIV').style.display = "block";
}

function getSingleWeekReport() {
  document.getElementById('singleErrorMessage').innerHTML = "";
  let value = document.getElementById('singleWeekValue').value;

  if (!value) {
    //singleErrorMessage
    document.getElementById('singleErrorMessage').innerHTML = "Geef het weeknummer op";
    // document.getElementById('singleErrorMessage').innerHTML = "Week number is required";
    return;
  } else {
    // get sigle week pdf

    let singleWeekForPDF = document.getElementById('singleReportYear').value + value;

  //   axios.get(`weekCardWeeklyReportPDF/${singleWeekForPDF}`).then((res) => {
  //     console.log("Single PDF file output success");
  //   })
  //   .catch((err) => console.log("Err ", err));

    // let url = `empAgencyWeeklyReportPDF/${singleWeekForPDF}`;
    // let url = 'admin/empAgencyWeeklyReportPDF/'+singleWeekForPDF;
    let url = singleFileURL+'/'+singleWeekForPDF;
    window.location.href = url;
// alert(url);
    // console.log(url);

    // request = $.ajax({
    //             url: APP_URL+"/admin/empAgencyWeeklyReportPDF/"+singleWeekForPDF,
    //             type: "GET"
    //           });

  }

}


function getMultpleWeeksReport() {
  document.getElementById('multiErrorMessage').innerHTML = '';
  let from = document.getElementById('reportFromDate').value;
  let to = document.getElementById('reportToDate').value;

  if (!from || !to ) {
    //multiErrorMessage
    document.getElementById('multiErrorMessage').innerHTML = "Beide weeknummers zijn verplicht";
    // document.getElementById('multiErrorMessage').innerHTML = "Both weeknumbers are required";
    return;

  } else if (parseInt(to) < parseInt(from) ) {
    document.getElementById('multiErrorMessage').innerHTML = "Week tot waarde moet groter zijn dan een week van";
    // document.getElementById('multiErrorMessage').innerHTML = "Week to must be greater than week from";
    return;

  } else if(from < 0 || to < 0) {
    document.getElementById('multiErrorMessage').innerHTML = "Moet een geldig weeknummer invoeren";
    // document.getElementById('multiErrorMessage').innerHTML = "Must enter a valid week number";

  } else {
    // get multi week PDF
    let data = {};
    data.from = document.getElementById('multiReportYear').value + from;
    data.to   = document.getElementById('multiReportYear').value + to;

    checkReportType(data.from, data.to);

    // let url = `weekCardMultipleWeeksReportPDF/${data.from}/${data.to}`;
    // window.location.href = url;


  }


}

function checkReportType(from, to) {

  let weekWise = document.querySelector('input[name="reportType"]:checked').value;

  if (weekWise == 'week') {
    // get Week Wise Report
    // let url = `weekCardMultipleWeeksReportPDF/${from}/${to}`;
    // let url = `admin/empAgencyWWMultipleWeeksReportPDF/${from}/${to}`;

    let url = WeekMultiReports + '/' + from + '/' + to;

    window.location.href = url;

  } else {
      // get projectWise Report
      // let url = `projectWiseMultipleWeeksReport/${from}/${to}`;
      // let url = `admin/empAgencyPWMultipleWeeksReport/${from}/${to}`;
      let url = ProjectMultiReports + '/' + from + '/' + to;

      window.location.href = url;

  }



}

function closeReportModel() {
  // single
  document.getElementById('singleWeekValue').value        = null;
  document.getElementById('singleErrorMessage').innerHTML = '';


  // multiple
  document.getElementById('multiErrorMessage').innerHTML = '';
  document.getElementById('reportFromDate').value        = null;
  document.getElementById('reportToDate').value          = null;

}
