
function parseInput(value) {
  let parsed = parseInt(value);
  var result = 0;

  if(!isNaN(parsed)) {
    result = parsed;
  }

  return result;
}

class Field {
  constructor(name, type, style = "") {
    this.name = name;
    this.type = type;
    this.style = style;
  }

}

class Planner {

  constructor(name, classes, defaultArr, arr = []) {
    this.name = name;
    this.classes = classes;
    this.defaultArr = defaultArr;
    this.arr = arr;

    this.div = document.getElementById(name + "Inputs");
  }

  // For å Oppdatere klassens data i forhold til hva brukeren har fylt inn
  refresh() {
    // Finn ut hvor mange rekker med inputs brukeren har laget
    var length = document.getElementsByClassName(this.name + "-" + this.classes[0].name).length;

    var formData = [];
    for(var i = 0;i < length;i++) {
      var current = [];

      // Loop over hvor mange forskjellige felt vi har i hver rekke og legg verdiene sammen i en array; current
      for(var j = 0;j < this.classes.length;j++) {
        current.push(document.getElementsByClassName(this.name + "-" + this.classes[j].name)[i].value);
      }

      // Legg arrayen inn i formdata om den ikke er tomm (Det skal egt. ikke skje uansett, så kanskje fjern)
      if(current.length > 0) {
        formData.push(current);
      }
    }

    // Erstatt nåverende data i klassen med den faktiske dataen som brukeren har endret på
    this.arr = formData;
  }

  // Funksjon for å oppdatere siden med data som finnes i klassen
  // På en måte det motsatte av refresh funksjonen ovenfor
  update() {
    var result = "";

    // Legg inn starten av en rekke med knapp for å fjerne rekken
    for(var i = 0;i < this.arr.length;i++) { 
      result += "<div class='planner'>"
        + "<button class='removeButton' type='button' onclick='" + this.name + "Planner.remove(" + i + ")'>"
        + "<i class='fas fa-minus-square'></i>"
        + "</button>";

      // legg inn alle de tilhørende feltene for rekken
      for(var j = 0;j < this.classes.length;j++) {

        result += "<input class='" + this.name + "-" + this.classes[j].name
          + "' type='"  + this.classes[j].type
          + "' name='"  + this.name + "-" + this.classes[j].name + "[]"
          + "' value='" + this.arr[i][j]
          + "' style='" + this.classes[j].style
          + "'onchange='updateSummary(incomePlanner, expensePlanner)'>";
      }

      result += "</div>";
    }

    // Oppdater nettsiden
    this.div.innerHTML = result;
  }

  add(data = this.defaultArr) {
    this.refresh();
    this.arr.push(data);
    this.update();
  }

  remove(index) {
    this.refresh();
    this.arr.splice(index, 1);
    this.update();
  }
}