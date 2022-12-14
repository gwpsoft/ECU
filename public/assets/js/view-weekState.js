function showViewModel(id) {

  document.getElementById('waitingMsg').style.display = "inline-block";

  let timeCard = null;

  axios.get(`ViewWeekStateAjaxCall/${id}`).then((response) => {
    document.getElementById('waitingMsg').style.display = "none";

    ///////////////////////////// place values in top table /////////////////////////////////////////
    let timeCards = response.data.data.GetTimeCards;

    timeCards.forEach((timeCard) => {

      let newRow    = document.createElement("TR");

      // Name
      let name      = document.createElement("TD");
      let inputName = document.createElement("INPUT");
      inputName.setAttribute("disabled", "disabled");
      inputName.value = timeCard.Firstname + ' ' + timeCard.Lastname;
      name.appendChild(inputName);
      newRow.appendChild(name);

      // Monday
      let mon = document.createElement("TD");
      let inputMon = document.createElement("INPUT");
      inputMon.setAttribute("disabled", "disabled");
      inputMon.value = timeCard.Mon;
      if (timeCard.Mon) {
        inputMon.style.background = '#59AD2F';
      }
      mon.appendChild(inputMon);
      newRow.appendChild(mon);

      // Tuesday
      let tue = document.createElement("TD");
      let inputTue = document.createElement("INPUT");
      inputTue.setAttribute("disabled", "disabled");
      inputTue.value = timeCard.Tue;
      if (timeCard.Tue) {
        inputTue.style.background = '#59AD2F';
      }
      tue.appendChild(inputTue);
      newRow.appendChild(tue);

      // Wednesday
      let wed = document.createElement("TD");
      let inputWed = document.createElement("INPUT");
      inputWed.setAttribute("disabled", "disabled");
      inputWed.value = timeCard.Wed;
      if (timeCard.Wed) {
        inputWed.style.background = '#59AD2F';
      }
      wed.appendChild(inputWed);
      newRow.appendChild(wed);

      // Thursday
      let thu = document.createElement("TD");
      let inputThu = document.createElement("INPUT");
      inputThu.setAttribute("disabled", "disabled");
      inputThu.value = timeCard.Thu;
      if (timeCard.Thu) {
        inputThu.style.background = '#59AD2F';
      }
      thu.appendChild(inputThu);
      newRow.appendChild(thu);

      // Friday
      let fri = document.createElement("TD");
      let inputFri = document.createElement("INPUT");
      inputFri.setAttribute("disabled", "disabled");
      inputFri.value = timeCard.Fri;
      if (timeCard.Fri) {
        inputFri.style.background = '#59AD2F';
      }
      fri.appendChild(inputFri);
      newRow.appendChild(fri);

      // Saturday
      let sat = document.createElement("TD");
      let inputSat = document.createElement("INPUT");
      inputSat.setAttribute("disabled", "disabled");
      inputSat.value = timeCard.Sat;
      if (timeCard.Sat) {
        inputSat.style.background = '#59AD2F';
      }
      sat.appendChild(inputSat);
      newRow.appendChild(sat);

      // Sunday
      let sun = document.createElement("TD");
      let inputSun = document.createElement("INPUT");
      inputSun.setAttribute("disabled", "disabled");
      inputSun.value = timeCard.Sun;
      if (timeCard.Sun) {
        inputSun.style.background = '#59AD2F';
      }
      sun.appendChild(inputSun);
      newRow.appendChild(sun);

      // Plus
      let plus              = document.createElement("TD");
      plus.innerHTML        = timeCard.Mon + timeCard.Tue + timeCard.Wed + timeCard.Thu + timeCard.Fri + timeCard.Sat + timeCard.Sun;
      plus.style.paddingTop = "15px";
      newRow.appendChild(plus);

      // Klant
      let klant        = document.createElement("TD");
      let inputKlant   = document.createElement("INPUT");
      inputKlant.setAttribute("disabled", "disabled");
      inputKlant.value = timeCard.Rate;
      klant.appendChild(inputKlant);
      newRow.appendChild(klant);

      // Kost
      let kost = document.createElement("TD");
      let inputKost = document.createElement("INPUT");
      inputKost.setAttribute("disabled", "disabled");
      inputKost.value = timeCard.Rate_Cost;
      kost.appendChild(inputKost);
      newRow.appendChild(kost);

      // Regie
      if (timeCard.Billable === 1) {
        let x          = document.createElement("INPUT");
        x.type         = "checkbox";
        x.style.margin = '18px 20px 2px';
        x.style.width  = '20px';
        x.style.height = '20px';
        x.setAttribute("checked", "checked");
        x.setAttribute("disabled", "disabled");
        newRow.appendChild(x);

      } else {
        let x          = document.createElement("INPUT");
        x.type         = "checkbox";
        x.style.margin = '18px 20px 2px';
        x.style.width  = '20px';
        x.style.height = '20px';
        x.setAttribute("disabled", "disabled");
        newRow.appendChild(x);
      }


      // Afspraken
      let note        = document.createElement("TD");
      let inputNote   = document.createElement("INPUT");
      inputNote.value = timeCard.Notes;
      inputNote.setAttribute("disabled", "disabled");
      note.appendChild(inputNote);
      newRow.appendChild(note);
      document.getElementById("topTableBody").appendChild(newRow);

    }) // loop ends

    /////////////////////// left Middle DIV work ///////////////////////////////////////////////////////////
    let data = getYearAndDate(response.data.data.GetWeekCardDetails.Weeknumber);
    document.getElementById('weekNrYear').value                 = data.year;
    document.getElementById('weekNrYear').style.backgroundColor = '#f4f4f4'
    document.getElementById('weekNrYear').style.color           = '#000'


    document.getElementById('weekNrDate').value                 = data.date;
    document.getElementById('weekNrDate').style.backgroundColor = '#f4f4f4'
    document.getElementById('weekNrDate').style.color           = '#000'

    document.getElementById('projectName').value                 = response.data.data.projectName;
    document.getElementById('projectName').style.backgroundColor = '#f4f4f4'
    document.getElementById('projectName').style.color           = '#000'

    document.getElementById('sendDate').value       = response.data.data.GetWeekCardDetails.Sent_Date;
    document.getElementById('receivedDate').value   = response.data.data.GetWeekCardDetails.Received_Date;

    if (response.data.data.GetWeekCardDetails.Checked) {
      let x          = document.createElement("INPUT");
      x.type         = "checkbox";
      x.style.margin = '10px 0px 2px';
      x.style.width  = '20px';
      x.style.height = '20px';
      x.setAttribute("checked", "checked");
      x.setAttribute("disabled", "disabled");
      document.getElementById('openCheck').appendChild(x);

    } else {
      let x          = document.createElement("INPUT");
      x.type         = "checkbox";
      x.style.margin = '10px 0px 2px';
      x.style.width  = '20px';
      x.style.height = '20px';
      x.setAttribute("disabled", "disabled");
      document.getElementById('openCheck').appendChild(x);
    }


    ///////////////////////////////////// Right Middle DIV work //////////////////////////////////////////////////////
    let project_details = response.data.data.project_details;
    
    document.getElementById("middleDivRightKlant").value      = project_details.CustomerName;
    document.getElementById("middleDivRightAfdeling").value   = project_details.DeptName;
    document.getElementById("middleDivRightProject").value    = project_details.Name;
    document.getElementById("middleDivRightUitvoerder").value = project_details.Contact_Id;
    document.getElementById("middleDivRightAfspraken").value  = project_details.pro_Note;

    if (response.data.data.Project_DTL.Goedkeuring) {
      document.getElementById("middleDivRightGoedkeuring").value = response.data.data.Project_DTL.Goedkeuring;
    } else {
      document.getElementById("middleDivRightGoedkeuring").value = "";
    }


    ///////////////////////////////////// last left DIV work /////////////////////////////////////////////////
    document.getElementById("lastNotes").value  = response.data.data.GetWeekCardDetails.Notes;


  })
  .catch((err) => {
    console.log("Error came: ", err);

  })

}



function closeButton() {

  //////////////// remove values of top table /////////////////////////////////
  document.getElementById('topTableBody').innerHTML      = '';

  /////////////////// remove values from left middle div ////////////////////////
  document.getElementById('weekNrYear').value                  = "";
  document.getElementById('weekNrYear').style.color            = ''
  document.getElementById('weekNrYear').style.backgroundColor  = '';
  document.getElementById('weekNrDate').value                  = "";
  document.getElementById('weekNrDate').style.color            = ''
  document.getElementById('weekNrDate').style.backgroundColor  = '';
  document.getElementById('projectName').value                 = "";
  document.getElementById('projectName').style.color           = ''
  document.getElementById('projectName').style.backgroundColor = '';
  document.getElementById('sendDate').value                    = "";
  document.getElementById('receivedDate').value                = "";
  document.getElementById('openCheck').innerHTML               = '';

  ///////////////// remove values from right middle div /////////////////////////
  document.getElementById("middleDivRightKlant").value       = "";
  document.getElementById("middleDivRightAfdeling").value    = "";
  document.getElementById("middleDivRightProject").value     = "";
  document.getElementById("middleDivRightUitvoerder").value  = "";
  document.getElementById("middleDivRightAfspraken").value   = "";
  document.getElementById("middleDivRightGoedkeuring").value = "";

  ///////////////// remove last left div value /////////////////////////
  document.getElementById("lastNotes").value  = "";

}

function getYearAndDate(number) {

  let numString = number.toString();
  let data = {};

  data.year = numString.substring(0,4);
  data.date = numString.substring(4,6);

  return data;

}
