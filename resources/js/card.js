import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

const expiredDate = document.getElementById('expired').innerText;
const expiringSoon = document.getElementById('expiringSoon').innerText;
const remaining = document.getElementById('remaining').innerText;
const noDate = document.getElementById('noDate').innerText;
// Daten für das Diagramm
const data = {
  labels: [expiredDate + ' Abgelaufen', expiringSoon + ' Bald abgelaufen', remaining + ' Haltbar', noDate + ' Ohne Haltbarkeitsdatum'],
  datasets: [{
    data: [expiredDate, expiringSoon, remaining, noDate],  // Beispielwerte, diese kannst du anpassen
    backgroundColor: ['#7B68EE', '	#BA55D3', '#3CB371', '#FFFFFF'],
    borderColor: ['#7B68EE', '	#BA55D3', '#3CB371', '#CCCCCC'],
    borderWidth: 1
  }]
};

// Optionen für das Diagramm
const options = {
  responsive: true,
  
  plugins: {
    legend: {
      position: 'right',
    },
 
    tooltip: {
      callbacks: {
        label: function (context) {
          let label = context.label || '';

          if (label) {
            label += ': ';
          }
          if (context.parsed !== null) {
            label += context.parsed;
          }
          return label;
        }
      }
    }
  }
};

// Das Kreisdiagramm erstellen
window.onload = function () {
  const ctx = document.getElementById('myPieChart').getContext('2d');
  new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
  });
};
