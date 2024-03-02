<!-- Vista del dashboard -->
<body>
    
  <div>
      <div class="toggleOn">
        Dark Mode:
        <span class="change">OFF</span>
      </div>
    <div style="text-align:center">
      <h2>Dashboard Valor histórico UF</h2>
      <!-- Botòn que lleva a la página principal -->
      <a href="<?= base_url() ?>indicadores/" class="btn btn-primary"> Página principal </a> 
    </div>
      <!-- Canvas con id myChart que será utilizado por assets/js/ajax_dashboard.js para cargar ChartJs -->
      <canvas id="myChart" style="margin: 0 auto; width: 90%;"></canvas>
      <div style="text-align:center">
        <!-- Inputs con id "desde" y "hasta" para marcar los límites de fechas según los valores ingresados en la base de datos -->
        <input type="date" id="desde" value="">
        <input type="date" id="hasta" value="">
      </div>
  </div>

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
  <!-- Chart.JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
  <!-- Función AJAX que realizará las peticiones y así mostrar los datos en el gráfico -->
  <script src="<?= base_url() ?>assets/js/ajax_dashboard.js"></script>
  <script src="<?= base_url() ?>assets/js/darkMode.js"></script>

</body>
