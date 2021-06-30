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
    // Setup - add a text input to each footer cell
    $('#myTable thead tr').clone(true).appendTo( '#myTable thead' );
    $('#myTable thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#myTable').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,      
        "order":[[0,"desc"]],
      "ordering": false,
      "lengthChange": false,
      sDom: 'lrtip'
    } );
} ); 
/*  $(document).ready(function() {
    $('#myTable').DataTable({
      "searching": false,
      "order":[[0,"desc"]],
      "ordering": false,
      "lengthChange": false
    });
  }); */
</script>