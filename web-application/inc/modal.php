<div class="modal" tabindex="-1" id="main-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Device</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="process.php?action=newdevice" method="post">
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label" for="device_name">Device Name</label>
                        <input type="text" autocomplete="off" name="device_name" id="device_name" class="form-control" required />
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="device_location">Device Location</label>
                        <input type="text" autocomplete="off" name="device_location" id="device_location" class="form-control" />
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="device_ip">Device IP Address</label>
                        <input type="text" autocomplete="off" name="device_ip" id="device_ip" class="form-control" />
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="device_type">Device Type</label>
                        <select name="device_type" id="device_type" class="form-select" required>
                            <option value="">Select</option>
                            <?php if ( !empty($devicesTypes) ) : foreach ( $devicesTypes as $dt ) : ?>
                                <option value="<?= $dt['device_type_id'] ?>"><?= $dt['device_type'] ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>