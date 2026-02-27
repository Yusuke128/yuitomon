document.addEventListener('DOMContentLoaded', function () {
  if (typeof diagnosticChartsData === 'undefined') return;

  const canvases = document.querySelectorAll('.diagnostic-chart');

  canvases.forEach((canvas, index) => {
    const item = diagnosticChartsData[index];
    if (!item) return;

    createRadarChart(canvas, item.scores);
  });
});

function createRadarChart(target, chartData) {
  const canvas = typeof target === 'string' ? document.getElementById(target) : target;

  if (!canvas) return;

  const ctx = canvas.getContext('2d');
  const labels = Object.keys(chartData);
  const values = Object.values(chartData);
  return new Chart(ctx, {
    type: 'radar',
    data: {
      labels: labels,
      datasets: [
        {
          label: '得点率（%）',
          data: values,
          fill: true,
          backgroundColor: 'rgba(255, 227, 77, 0.2)', // 薄いyellow
          borderColor: '#ffe34d',
          pointBackgroundColor: '#ffe34d',
          pointBorderColor: '#ffe34d',
          borderWidth: 2
        }
      ]
    },
    options: {
      responsive: true,
      scales: {
        r: {
          min: 0,
          max: 100,
          ticks: {
            stepSize: 20
          },
          pointLabels: {
            font: {
              size: 20, // 20px
              weight: '700'
            }
          },
          grid: {
            color: 'rgba(0,0,0,0.1)'
          },
          angleLines: {
            color: 'rgba(0,0,0,0.1)'
          }
        }
      },
      plugins: {
        legend: {
          labels: {
            font: {
              size: 14,
              weight: '600'
            }
          }
        }
      }
    }
  });
}
