<?php
    if (isset($_POST['search'])) {
        include '../../config/connection.php';

        $no = 1;
        $search = $_POST['search'];

        $query = mysqli_query($connection, "SELECT * FROM identitas JOIN unit ON unit.unit_id = identitas.unit_id WHERE no_rm LIKE '%".$search."%' OR nama_ibu LIKE '%".$search."%' ORDER BY identitas_id DESC LIMIT 5");
        while ($row = mysqli_fetch_assoc($query)) {
?>
<div class="mt-3">
  <div class="d-flex justify-content-between align-items-center">
    <div class="d-flex flex-row align-items-center">
      <!-- <span class="star">
        <i class="fa fa-star yellow"></i>
      </span> -->
      <div class="d-flex flex-column"><span><?= $row['nama_ibu']; ?></span>
          <div class="d-flex flex-row align-items-center time-text">
            <small><?php echo $row['tanggal_lahir_ibu']; ?></small> <span class="dots"></span>
            <small><?php echo $row['no_rm']; ?></small> <span class="dots"></span>
            <small><?php echo $row['unit_name']; ?></small> </div>
            <a href="?p=detail_identitas&id=<?= $row['identitas_id']; ?>" class="stretched-link"></a>
      </div>
    </div>
    <!-- <span class="content-text-1">BA</span> -->
  </div>
</div>
<?php }
} ?>
