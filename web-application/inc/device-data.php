<?php 
    include __DIR__ . '/../bootstrap.php';
    $devices = $dbConn->selectAllDevices()->getResults();
?>
<?php if ( empty($devices) ) : showAlert("No devices", "info", false); else : ?>
    <div class="row">
        <?php foreach ( $devices as $device ) : ?>
            <div class="col-md-6 col-lg-4 mb-3" data-uid="<?= $device['device_uid'] ?>" id="duid-<?= $device['device_uid'] ?>">
                <div class="card card-danger">
                    <div class="card-body">
                        <?php getIcon($device['device_type']) ?>
                        <b><?= $device['device_name'] ?></b> at <?= $device['device_location'] ?></br>
                        </br>
                        <code><?= $device['device_uid'] ?></code> : <code><?= $device['device_hash'] ?></code>
                        Last Updated On <?= date('d F Y h:iA', strtotime($device['event_dt'])) ?></br></br>

                        <div class="">
                        <?php if ( $device['device_status'] == 'on' ) : ?>
                            <span class="text-success fw-bolder p-2">ON</span>
                            <a href="#" data-hash="<?= $device['device_hash'] ?>" data-uid="<?= $device['device_uid'] ?>" data-status="off" class="toggle-sw btn btn-dark btn-sm pull-right">Switch Off</a>
                        <?php else: ?>
                            <span class="text-danger fw-bolder p-2">OFF</span>
                            <a href="#" data-hash="<?= $device['device_hash'] ?>" data-uid="<?= $device['device_uid'] ?>" data-status="on" class="toggle-sw btn btn-light btn-sm pull-right">Switch On</a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>