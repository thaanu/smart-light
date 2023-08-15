<?php
class Database
{

    protected $conn;
    protected $config;
    protected $hostname, $username, $password, $database;
    protected $results;

    public function __construct($config)
    {
        $this->config = $config;
        $this->hostname = $this->config['host'];
        $this->username = $this->config['user'];
        $this->password = $this->config['pass'];
        $this->database = $this->config['name'];
        try {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        } catch (Exception $e) {
            setFlashMessage("Unable to connect to database." . $e->getMessage(), "danger");
        }
    }

    public function selectAllDevices()
    {
        $sql = "SELECT d.*, dt.device_type, (select device_status from tbl_events where device_uid = d.device_uid order by event_id desc limit 1 ) device_status, (select event_dt from tbl_events where device_uid = d.device_uid order by event_id desc limit 1 ) event_dt FROM tbl_devices d JOIN tbl_device_types dt ON d.device_type = dt.device_type_id";
        $this->results = $this->conn->query($sql);
        return $this;
    }

    public function getDevice( $uid, $hash ) 
    {
        $sql = "SELECT d.*, dt.device_type, (select device_status from tbl_events where device_uid = d.device_uid order by event_id desc limit 1 ) device_status, (select event_dt from tbl_events where device_uid = d.device_uid order by event_id desc limit 1 ) event_dt FROM tbl_devices d JOIN tbl_device_types dt ON d.device_type = dt.device_type_id 
        WHERE device_hash = '$hash' AND device_uid = '$uid'";
        $this->results = $this->conn->query($sql);
        return $this;
    }

    public function selectDevicesTypes()
    {
        $sql = "SELECT * FROM `tbl_device_types`";
        $this->results = $this->conn->query($sql);
        return $this;
    }

    public function getResults()
    {
        $rows = [];
        if ($this->results->num_rows > 0) {
            while ($row = $this->results->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return [];
    }

    public function newDevice($deviceName,$deviceIp,$deviceHash,$deviceLocation,$deviceUid,$deviceType)
    {
        $sql = "INSERT INTO tbl_devices (`device_name`,`device_ip`,`device_hash`,`device_location`,`device_uid`,`device_type`) VALUES ('$deviceName','$deviceIp','$deviceHash','$deviceLocation','$deviceUid','$deviceType')";
        if ($this->conn->query($sql) === TRUE) {
            $this->changeDeviceStatus( $deviceUid, 'off' );
            return true;
        } else {
            throw new Exception("Error: " . $sql . "<br>" . $this->conn->error);
        }
    }

    public function changeDeviceStatus( $deviceUid, $deviceStatus )
    {
        $eventDatetime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO tbl_events (`device_uid`,`device_status`,`event_dt`) VALUES ('$deviceUid','$deviceStatus','$eventDatetime')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            throw new Exception("Error: " . $sql . "<br>" . $this->conn->error);
        }
    }

    public function __destruct()
    {
        $this->conn->close();
    }

}
