//The function builds a new table with the recived elements from the client 
function implementByTableId(TableId){
    //content-table.appendChild(newTable);
    document.getElementById("rank").innerHTML = tableOfRanks[TableId];
    document.getElementById("name").innerHTML = tableOfNames[TableId];
    document.getElementById("points").innerHTML = tableOfPoints[TableId];
    document.getElementById("team").innerHTML = tableOfTeams[TableId];
}

//The function adds a new row to the table while button is clicked 
function addNew(){
    //const newTable = document.createElement("tr");
    const newTable = document.createElement("td");
    console.log("added");
    newTable.classList.add('content-table');
    //content-table.appendChild(newTable);
} 

function getNewCustomerFromClient(Var,Var,Var,Var){
   //const nameToAdd = print("What is your name ? ");
   //newTable = 
   //return var newTh  ;   
}

//The function adds the client to the row from the client and add to vector 
function onAddClient(e){
    e.preventDefault();
    const rank = document.getElementById('rank').value;
    const name = document.getElementById('name').value;
    const points = document.getElementById('points').value;
    const team = document.getElementById('team').value;
    tbodyEl.innerHTML += `
      <tr>
        <td>${rank}</td>
        <td>${name}</td>
        <td>${points}</td>
        <td>${team}</td>
        <td><button class="deleteBtn">Delete</button></td>
      </tr>
    
    `;
    
  }


//The function Delets the row that selected and most close to the mouse 
function onDeleteRow(e){
    if(!e.target.classList.contains('deleteBtn')){
      return;
    }

    const btn = e.target;
    btn.closest('tr').remove();
    console.log('clicked on the delete button');
  }

//Constants that used to build the table
let typeOfTables = ["Rank","Name","Points","Team"];
let tableOfRanks = ["1","2","3"];
let tableOfNames = ["Domenic","Sally","Nick"];
let tableOfPoints = ["88,110","72,400","52,300"];
let tableOfTeams = ["dcode","students","dcode"];
