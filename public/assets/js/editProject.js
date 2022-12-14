
getWeekStateForProject();

function getWeekStateForProject() {
  let weekstateList = document.getElementById('weekstateList').value;

  axios.post(`getWeekStateForProject`, {
    value: weekstateList,
    projectID: projectID
  }).then(response => {

    let data = response.data;
    let respondingDIV = document.getElementById("weekstateLi");
    respondingDIV.innerHTML = '';

    if (data.length > 0) {
      for (var i in data) {

        let li = document.createElement("LI");
        let newLink = document.createElement('a');
        newLink.setAttribute('href', 'admin/Edit-weekstaat/'+data[i].id);

        let text = data[i].Weeknumber + '(Verzonden: ' + data[i].Sent_Date + ')';

        newLink.innerHTML = text

        li.appendChild(newLink);
        document.getElementById("weekstateLi").appendChild(li);
      }

    }


  })
  .catch(error => {
    console.log(error);
  })


}
