<footer class="footer mt-auto py-4 bg-dark text-white-50">
  <div class="container">
    <small> &copy; โรงพยาบาลมหาวิทยาลัยพะเยา คณะแพทยศาสตร์ 2561</small>

  </div>
</footer>
<style>
  footer {
    position: fixed;
    bottom: 0;

    width: 100%;
  }
</style>
<!-- data table -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="../DataTables/datatables.js"></script>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable({
      "order":[[0,"desc"]]
    });
  });
</script>