const TYPE_BAR_HORISONTAL   = 0;
const TYPE_BAR_VERTICAL     = 1;
const TYPE_LINE             = 2;

Chart.defaults.font.family  = "sans-serif";
Chart.defaults.font.size    = 18;
Chart.defaults.color        = "#262220";

function createChart(canvas, names, data, type) {

  var chartType, axis, showLegend;

  switch(type) {

    case TYPE_BAR_HORISONTAL:
      chartType   = "bar";
      axis        = 'y';
      showLegend  = false;
      break;

    case TYPE_BAR_VERTICAL:
      chartType   = "bar";
      axis        = 'x';
      showLegend  = false;
      break;

    case TYPE_LINE:
      chartType   = "line";
      axis        = 'x';
      showLegend  = false;
      break;
  }

  var myData = {
    labels: names,
    datasets: [{
      data: data,
      backgroundColor: "#262220"
    }]
  };

  return new Chart(canvas, {
    type: chartType,
    data: myData,
    options: {
      maintainAspectRatioo: false,
      indexAxis: axis,
      plugins: {
        legend: {
          display: showLegend
        }
      }
    }
  });
}