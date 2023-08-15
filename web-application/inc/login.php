<?php include __DIR__ . '/header.php'; ?>

    <div class="container">
        <div class="m-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            
                            <h4><?= $appConfig['app']['name'] ?></h4>
                            
                            <?php flashMessage() ?>

                            <form action="process.php?action=login" method="POST">
                                <div class="mb-2">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" autocomplete="off" name="username" id="username" class="form-control" />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" autocomplete="off" name="password" id="password" class="form-control" />
                                </div>
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/footer.php'; ?>