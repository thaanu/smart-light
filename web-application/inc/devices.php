<?php include __DIR__ . '/header.php' ?>
<?php include __DIR__ . '/navbar.php' ?>
<div class="container">

    <?php flashMessage(); ?>

    <?php $devicesTypes = $dbConn->selectDevicesTypes()->getResults(); ?>

    <div class="py-3">
        <a href="new-device.php" data-bs-toggle="modal" data-bs-target="#main-modal" class="btn btn-primary">New Device</a>
    </div>
    
    <div id="device-container">
        <center>Loading</center>
    </div>

</div>

<?php include __DIR__ . '/modal.php' ?>

<script>
    async function fetchDevices() {
        const response = await fetch('inc/device-data.php');
        const text = await response.text();
        return text;
    }

    let deviceContainer = document.querySelector('#device-container');

    function init() {
        fetchDevices().then(html => {
            deviceContainer.innerHTML = html;

            let sws = document.querySelectorAll('.toggle-sw');
            
            if ( sws.length > 0 ) {
                for ( let i = 0; i < sws.length; i++ ) {
                    let b = sws[i];
                    b.addEventListener('click', function(e){
                        e.preventDefault();
                        let uid = b.dataset.uid;
                        let hash = b.dataset.hash;
                        fetch(`process.php?action=toggle-switch&uid=${uid}&hash=${hash}`).then(response => {
                            return response.text();
                        }).then(text => {
                            if ( text == 'OK' ) {
                                init();
                            }
                        });
                    });
                }
            }

        });
    }

    init();

    setInterval(function(){
        init();
    }, 10000);

</script>

<?php include __DIR__ . '/footer.php' ?>
