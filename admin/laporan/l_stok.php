<?php
  session_start();
  include("../../config.php");
  include("../../proses.php");
  if(!isset($_SESSION["username"])){
      echo'<script>
                alert("Mohon login dahulu !");
                window.location="../index.php";
             </script>';
      return false;
  }
  if($_SESSION["level"] != "admin"){
        echo'<script>
                alert("Maaf Anda Tidak Berhak Ke Halaman ini !");
                window.location="../'.$_SESSION["level"].'/";
             </script>';
        return false;
  }
?>
<?php
  include("../../header.php");
?>
<!DOCTYPE html>

<body>

<div class="container">
<h1 class="page-header">Master Product</h1>


<div class="table-responsive" style="font-size: 10px;overflow-x:auto;">
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <!-- <th width="1%">No</th> -->
              <th class="text-nowrap">Product Group</th>
              <th class="text-nowrap">Product Type</th>
              <th class="text-nowrap">Product Code</th>
              <th class="text-nowrap">Length</th>
              <th class="text-nowrap">Width</th>
              <th class="text-nowrap">Height</th>
              <th class="text-nowrap">Thickness</th>
              <th class="text-nowrap">Surface</th>
              <th class="text-nowrap">Color</th>
              <th class="text-nowrap">Pattern</th>
              <th class="text-nowrap">PCS/Box</th>
              <th class="text-nowrap">SQM/Box</th>
              <th class="text-nowrap">Weight</th>
              <th class="text-nowrap">Container Type</th>
              <th class="text-nowrap">Box/Pallet</th>






            </tr>
          </thead>
          <tbody>



            <?php
            $nama=$_POST['nm'];
            $qty1=$_POST['qty'];
            $op=$_POST['op'];
            $st1=$_POST['st'];
                $sql = "SELECT master_tipe.nama, master_stok.kode_stok, master_tipe.panjang, master_tipe.lebar,
                master_tipe.surface, master_tipe.color, master_tipe.pattern,master_stok.tinggi, master_stok.tebal,
                master_stok.pcsctn,master_stok.sqmctn,master_stok.kgsstok,master_stok.contstan,master_stok.ctnpallet,
                master_stok.grupname
                FROM master_tipe
                INNER JOIN master_stok
                ON master_tipe.kode=master_stok.kodetipe;";

                   $query = mysqli_query($conn, $sql);
                   while($amku = mysqli_fetch_array($query)){
                        $grupname=$amku["grupname"];
                        $tipe=$amku["nama"];
                        $kodestok=$amku["kode_stok"];
                        $panjang=$amku["panjang"];
                        $lebar=$amku["lebar"];
                        $tinggi=$amku["tinggi"];
                        $tebal=$amku["tebal"];
                        $surface=$amku["surface"];
                        $color=$amku["color"];
                        $pattern=$amku["pattern"];
                      
                        $pcsctn=$amku["pcsctn"];
                        $sqmctn=$amku["sqmctn"];
                        $kgsstok=$amku["kgsstok"];
                        $contstan=$amku["contstan"];
                        $ctnpallet=$amku["ctnpallet"];


                ?>



            <tr class="odd gradeX">
              <td nowrap><?php echo $grupname; ?></td>
              <td nowrap><?php echo $tipe; ?></td>
              <td nowrap><?php echo $kodestok; ?></td>
              <td nowrap><?php echo $panjang; ?></td>
              <td nowrap><?php echo $lebar; ?></td>
              <td nowrap><?php echo $tinggi; ?></td>
              <td nowrap><?php echo $tebal; ?></td>
                <td nowrap><?php echo $surface; ?></td>
                  <td nowrap><?php echo $color; ?></td>
                    <td nowrap><?php echo $pattern; ?></td>
                    <td nowrap><?php echo $pcsctn; ?></td>
                    <td nowrap><?php echo $sqmctn; ?></td>
                    <td nowrap><?php echo $kgsstok; ?></td>
                    <td nowrap><?php echo $contstan; ?></td>
                    <td nowrap><?php echo $ctnpallet; ?></td>








           <?php } ?>
            </tr>
          </tbody>
        </table>
</div>
</div>
      <!-- end page-header -->
<script>
$(document).ready(function() {
$('#example').DataTable( {
  dom: 'Bfrtip',
  buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
  ]
} );
} );
      </script>
<?php
  include("../../footer.php");
?>
    <script type="text/javascript">
      function myFunction() {
      var element = document.getElementById("add_show");
      element.classList.toggle("hide");
      }
    </script>
</div>
	</body>
    </html>
