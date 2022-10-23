<div class="list-group">
  <a href="?p=detail_identitas&id=<?= $_GET['id']; ?>" class="py-3 list-group-item list-group-item-action <?= ($_GET['p'] == 'detail_identitas') ? 'active' : ''; ?>">
    <h5 class="mb-0">Identitas Pasien</h5>
  </a>
</div>
<div class="accordion" id="accordionMenu">
  <div class="card m-0">
    <div class="card-header p-3" id="headingSkrining" data-toggle="collapse" data-target="#collapseSkrining" aria-expanded="false" aria-controls="collapseSkrining">
      <h5 class="mb-0">Skrining 11-13</h5>
    </div>
    <div id="collapseSkrining" class="collapse <?php echo (in_array($_GET['p'], ['add_skrining','detail_skrining'])) ? 'show' : ''; ?>" aria-labelledby="headingSkrining" data-parent="#accordionMenu">
      <div class="card-body p-0">
        <div class="list-group">
          <?php $querySkrining = $connection->query("SELECT * FROM skrining WHERE identitas_id = '".$_GET['id']."'"); ?>
          <?php foreach ($querySkrining as $key => $valueSkrining): ?>
            <a href="?p=detail_skrining&id=<?= $_GET['id']; ?>&id-s=<?= $valueSkrining['skrining_id']; ?>" class="py-2 list-group-item list-group-item-action <?php echo ($_GET['p'].$_GET['id-s'] == 'detail_skrining'.$valueSkrining['skrining_id']) ? 'active' : ''; ?>" aria-current="true">
              <small><?php echo $valueSkrining['tanggal_pemeriksaan']; ?></small>
            </a>
          <?php endforeach; ?>
          <a href="?p=add_skrining&id=<?= $_GET['id']; ?>" class="py-2 list-group-item list-group-item-action <?= ($_GET['p'] == 'add_skrining') ? 'active' : ''; ?>"><small>Tambah</small></a>
        </div>
      </div>
    </div>
  </div>
  <div class="card m-0">
    <div class="card-header p-3" id="headingTrimester" data-toggle="collapse" data-target="#collapseTrimester" aria-expanded="false" aria-controls="collapseTrimester">
      <h5 class="mb-0">USG Trimester II/III</h5>
    </div>
    <div id="collapseTrimester" class="collapse <?php echo (in_array($_GET['p'], ['add_trimester','trimester'])) ? 'show' : ''; ?>" aria-labelledby="headingTrimester" data-parent="#accordionMenu">
      <div class="card-body p-0">
        <div class="list-group">
          <?php $queryTrimester = $connection->query("SELECT * FROM trimester WHERE identitas_id = '".$_GET['id']."'"); ?>
          <?php foreach ($queryTrimester as $key => $valueTrimester): ?>
            <a href="?p=trimester&id=<?= $_GET['id']; ?>&id-t=<?php echo $valueTrimester['trimester_id']; ?>" class="py-2 list-group-item list-group-item-action <?= ($_GET['p'].$_GET['id-t'] == 'trimester'.$valueTrimester['trimester_id']) ? 'active' : ''; ?>" aria-current="true">
              <small><?php echo $valueTrimester['date_created']; ?></small>
            </a>
          <?php endforeach; ?>
          <a href="?p=add_trimester&id=<?= $_GET['id']; ?>" class="py-2 list-group-item list-group-item-action <?= ($_GET['p'] == 'add_trimester') ? 'active' : ''; ?>"><small>Tambah</small></a>
        </div>
      </div>
    </div>
  </div>
  <div class="card m-0">
    <div class="card-header p-3" id="headingDelivery" data-toggle="collapse" data-target="#collapseDelivery" aria-expanded="false" aria-controls="collapseDelivery">
      <h5 class="mb-0">Delivery Outcome</h5>
    </div>
    <div id="collapseDelivery" class="collapse <?php echo (in_array($_GET['p'], ['add_delivery','delivery_outcome'])) ? 'show' : ''; ?>" aria-labelledby="headingDelivery" data-parent="#accordionMenu">
      <div class="card-body p-0">
        <div class="list-group">
          <?php $queryDelivery = $connection->query("SELECT * FROM delivery WHERE identitas_id = '".$_GET['id']."'"); ?>
          <?php foreach ($queryDelivery as $key => $valueDelivery): ?>
            <a href="?p=delivery_outcome&id=<?= $_GET['id']; ?>&id-d=<?= $valueDelivery['delivery_outcome_id']; ?>" class="py-2 list-group-item list-group-item-action <?php echo ($_GET['p'].$_GET['id-d'] == 'delivery_outcome'.$valueDelivery['delivery_outcome_id']) ? 'active' : ''; ?>" aria-current="true">
              <small><?php echo $valueDelivery['date_created']; ?></small>
            </a>
          <?php endforeach; ?>
          <a href="?p=add_delivery&id=<?= $_GET['id']; ?>" class="py-2 list-group-item list-group-item-action <?= ($_GET['p'] == 'add_delivery') ? 'active' : ''; ?>"><small>Tambah</small></a>
        </div>
      </div>
    </div>
  </div>
</div>
