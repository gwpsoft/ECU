var result = 0;
let clickSaveButton = false;
let updateRowID = null;

function setModal(data){

  if(data['price_agreement'] == 0){
    let element = document.getElementById('uniform-per_keer').getElementsByTagName('span');
    element[0].classList.add("checked");

    initial_keer_checked(data['unit'], data['number_of_units']);
  }
  else {
     let element = document.getElementById('uniform-per_uur').getElementsByTagName('span');
     element[0].classList.add("checked");

     initial_uur_checked();
  }

  if(data['unit'] == 0)
  {
    let element2 = document.getElementById('uniform-per_stand').getElementsByTagName('span');
    element2[0].classList.add("checked");

  } else {
    let element2 = document.getElementById('uniform-per_project').getElementsByTagName('span');
    element2[0].classList.add("checked");
  }

  document.getElementById("keetID").value         = data['id'];
  document.getElementById("number_times").value   = data['times_per_week'];
  document.getElementById("price").value          = data['price'];
  document.getElementById("purchase_price").value = data['purchase_price'];
  document.getElementById("comments").value       = data['comments'];



}//end of function setModal

function getkeetinfo(id){
  // console.log(id);
  updateRowID = id;

  axios.get("getKeetData/"+id).then(response => {
    // console.log(response.data);
    setModal(response.data)
  })
  .catch(error => {
    console.log(error);
  })
}//getkeetinfo function ends here

// store update data
function updateKeetWeekcardData() {
  let data = {};
  data = captureModelData();

  if (!clickSaveButton) { // if a person clicks multiple times then there will be no more than 1 post request
    clickSaveButton = true;

    axios.post('updateKeetWeekCardData', {
      data: data
    })
    .then(response => {
      window.location.reload(true);
    })
    .catch(error => {
      console.log(error);
    })

  }

}

function captureModelData() {

  let data = {};
  data.id = updateRowID
  data.times_per_week  = document.getElementById('number_times').value;
  data.number_of_units = document.getElementById('number_chain').value;
  data.price           = document.getElementById('price').value;
  data.purchase_price  = document.getElementById('purchase_price').value;
  data.comments        = document.getElementById('comments').value;

  let first_radio_pair  = document.getElementById('uniform-per_keer').getElementsByTagName('span');
  let getPriceAgreement = hasClass(first_radio_pair[0], 'checked'); // if true means PER_KEER

  if (getPriceAgreement) {
    data.price_agreement = 0;

  } else {
    data.price_agreement = 1;
  }


  let second_radio_pair = document.getElementById('uniform-per_stand').getElementsByTagName('span');
  let unit              = hasClass(second_radio_pair[0], 'checked'); // if true means price_per_unit

  if (unit) {
    data.unit = 0;

  } else {
    data.unit = 1;

  }

  return data;
}

function cancelButtonClicked() {
  // remove radio buttons checked class

  let element = document.getElementById('uniform-per_keer').getElementsByTagName('span');
  element[0].classList.remove("checked");

  let element1 = document.getElementById('uniform-per_uur').getElementsByTagName('span');
  element1[0].classList.remove("checked");

  let element2 = document.getElementById('uniform-per_stand').getElementsByTagName('span');
  element2[0].classList.remove("checked");

  let element3 = document.getElementById('uniform-per_project').getElementsByTagName('span');
  element3[0].classList.remove("checked");

}


function keer_clciked(){

  document.getElementById('num_times').style.display = 'block';
  document.getElementById('eenheid').style.display = 'block';
  document.getElementById('number').style.display = 'block';

}// keer_clciked function ends here

function uur_clciked(){

  document.getElementById('num_times').style.display = 'none';
  document.getElementById('eenheid').style.display = 'none';
  document.getElementById('number').style.display = 'none';
}// uur_clciked function ends here

function initial_keer_checked(unit, number_chain) {

  document.getElementById('num_times').style.display = 'block';
  document.getElementById('eenheid').style.display = 'block';
  document.getElementById('number').style.display = 'block';

  if(unit == 0) // means price per unit
  {
    let element2 = document.getElementById('uniform-per_stand').getElementsByTagName('span');
    element2[0].classList.add("checked");
    document.getElementById('number_chain').value = number_chain;
    document.getElementById('number').style.display = "inline-block";

  } else { // means price per project
    let element2 = document.getElementById('uniform-per_project').getElementsByTagName('span');
    element2[0].classList.add("checked");

    document.getElementById('number_chain').value = "";
    document.getElementById('number').style.display = "none";

  }

}

function initial_uur_checked() {

  document.getElementById('num_times').style.display = 'none';
  document.getElementById('eenheid').style.display = 'none';
  document.getElementById('number').style.display = 'none';
}


function stand_clicked(){
  document.getElementById('number').style.display = 'block';
}

function project_clicked(){
  document.getElementById('number').style.display = 'none';
}

function hasClass(element, cls) {
   return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}


// prijsafspraak = price_agreement
// number_times = times_per_week
// unit = unit
// number_chain = number_of_units
// price = price
// purchase_price = purchase_price
// comments = comments
