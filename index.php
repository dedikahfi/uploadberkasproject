<!DOCTYPE html>
<html>
<head>
  <title>Upload dan Download File</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
function getDate(){
    var today = new Date();

document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
}
</script>
  <!--Script CSS-->
  <link type="text/css" href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet'>
  <link type="text/css" href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css' rel='stylesheet'>
  <link type="text/css" href='https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css' rel='stylesheet'>
  
</head>
<body>
  <br /><br />
  <div class="container">
   <nav class="navbar navbar-inverse">
    <div class="container-fluid">
     <div class="navbar-header">
      <a class="navbar-brand" href="#">Upload dan Download File</a>
    </div>
  </div>
</nav>
<br />
<br />
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAddData">Add Data</button>
<div id="modalAddData" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Data</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
            <form method="POST" action="upload.php" enctype="multipart/form-data" id="inputdata">
            Tanggal <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name="tanggal" required/><br>
            No Surat<input class="form-control" type="text" name="nosurat" placeholder="No Surat" required/><br>
            Asal Departemen<input class="form-control" type="text" name="asaldepartemen" placeholder="Asal Departemen" required/><br>
            Departement Tujuan<input class="form-control" type="text" name="departementujuan" placeholder="Departemen Tujuan" required/><br>
            Perihal<input class="form-control" type="text" name="perihal" placeholder="Perihal" required/><br>
            Jumlah Lampiran<input class="form-control" type="text" name="jumlahlampiran" placeholder="Jumlah Lampiran" required/><br>
            Cuplikan Redaksi Surat<input class="form-control" type="text" name="cuplikanredaksisurat" placeholder="Cuplikan Redaksi Surat" required/><br>
            Jenis Surat<br>
            <select name="listsurat" form="inputdata">
            <option value="Memo">Memo</option>
            <option value="BA">BA</option>
            <option value="Tembusan">Tembusan</option>
            </select><br><br>
            <!--Tanggal Upload<input class="form-control" type="date" name="tglupload" value="<?php echo date('Y-m-d'); ?>" required disabled/><br>
            -->
            Upload Berkas<input class="form-control" type="file" name="upload"/><br><br>
            <button class="btn btn-success" type="submit" class="btn btn-success form-control" name="submit"><span class="glyphicon glyphicon-upload"></span> Upload</button>
            <button class="btn btn-danger" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
          <p>*Harap lengkapi data<p>
				</div>
    </div>
  </div>
</div>

<br /><br />
<div class="form-group">

  <table id="example" class="display responsive nowrap" style="width:100%">
    <thead>
      <tr>  
        <th>No</th>
        <th>Tanggal</th>
        <th>No Surat</th>
        <th>File Name</th>
        <th>Asal Departemen</th>
        <th>Departemen Tujuan</th>
        <th>Perihal</th>
        <th>Jumlah Lampiran</th>
        <th>Cuplikan Redaksi Surat</th>
        <th>Jenis Surat</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="alert-success">
      <?php
      require 'config.php';
      $row = $conn->query("SELECT * FROM `file`") or die(mysqli_error());
      while($fetch = $row->fetch_array()){
       ?>
       <tr>
        <?php 
        $name = explode('/', $fetch['file']);
        ?>
        <td><?php echo $fetch['file_id']?></td>
        <td><?php echo $fetch['tanggal']?></td>
        <td><?php echo $fetch['nosurat']?></td>
        <td><?php echo $fetch['name']?></td>
        <td><?php echo $fetch['asaldepartemen']?></td>
        <td><?php echo $fetch['departementujuan']?></td>
        <td><?php echo $fetch['perihal']?></td>
        <td><?php echo $fetch['jumlahlampiran']?></td>
        <td><?php echo $fetch['cuplikanredaksisurat']?></td>
        <td><?php echo $fetch['jenissurat']?></td>
        <td><a href="download.php?file=<?php echo $name[1]?>" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span> Download</a></td>

      </tr>
      <?php
    }
    ?>
  </tbody>
</table>

</div>


<!--Script Javascript-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
<script>
 $(document).ready(function() {
  $('#example').DataTable( {
    dom: 'Bfrtip',
    buttons: [
    'colvis'
    ]
  } );
} );
</script>
</body>
</html>