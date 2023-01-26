<body>
    
<div>
  <div style="text-align:center">
    <h2>Dashboard Valor histórico UF</h2>
    <a href="<?= base_url() ?>indicadores/" class="btn btn-primary"> Página principal </a> 
  </div>
    <canvas id="myChart" style="margin: 0 auto; width: 80%;"></canvas>
    <div style="text-align:center">
      <input type="date" id="desde" value="">
      <input type="date" id="hasta" value="">
    </div>
</div>

  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
  <script src="<?= base_url() ?>assets/js/ajax_dashboard.js"></script>
  <script src="<?= base_url() ?>assets/js/ajax_filtro.js"></script>

</body>
