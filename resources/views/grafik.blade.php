<x-app-layout>
  <x-slot name="header">
    <div class="h-[400px] grid place-items-center overflow-hidden">
      <img class="brightness-50 w-full h-full object-cover" src="{{ asset('img/hero_4.jpg') }}" alt="hero image">
      <div class="container absolute">
        <h1 class="mb-3 text-5xl font-semibold tracking-tight text-white ">
          Grafik pendaftar Beasiswa
        </h1>
      </div>
    </div>
  </x-slot>
  <div class="container py-24">
    <div class="w-full h-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
      <div>
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">{{ $pendaftars->count() }} person</h5>
        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Pendaftar Beasiswa</p>
      </div>
      {{-- area untuk chart --}}
      <div id="area-chart"></div>
      
    </div>
  </div>

</x-app-layout>
<script>
  // data grafik dari database
  var chartData = <?php echo $chartData; ?>;

  // ApexCharts options and config
  window.addEventListener("load", function() {
    let options = {
      chart: {
        height: "100%",
        maxWidth: "100%",
        type: "area",
        fontFamily: "Inter, sans-serif",
        dropShadow: {
          enabled: false,
        },
        toolbar: {
          show: false,
        },
      },
      tooltip: {
        enabled: true,
        x: {
          show: false,
        },
      },
      fill: {
        type: "gradient",
        gradient: {
          opacityFrom: 0.55,
          opacityTo: 0,
          shade: "#1C64F2",
          gradientToColors: ["#1C64F2"],
        },
      },
      dataLabels: {
        enabled: true,
      },
      stroke: {
        width: 6,
      },
      grid: {
        show: true,
        strokeDashArray: 4,
        padding: {
          left: 2,
          right: 2,
          top: 0
        },
      },
      series: [
        {
          name: "Pendaftar",
          data: chartData.map((item) => item.y),
          color: "#1A56DB",
        },
      ],
      xaxis: {
        categories: chartData.map((item) => item.name),
        labels: {
          style: {
            colors: "#6E6B7B",
            fontSize: "14px",
            fontFamily: "Inter, sans-serif",
            fontWeight: 400,
          },
        },
        axisBorder: {
          show: true,
        },
        axisTicks: {
          show: false,
        },
      },
      yaxis: {
        show: false,
      },
    };

    let chart = new ApexCharts(document.querySelector("#area-chart"), options);

    chart.render();
  });
</script>