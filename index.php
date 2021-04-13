

<!DOCTYPE html>
<html lang="en">
<?php include_once 'includes/header.php'?>
<body>
    <?php include_once 'includes/modal.php'?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-10 col-sm-10 col-md-11 Timer"></div>
            <div class="col-2 col-sm-2 col-md-1">
                <button  type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <img src="assets/gear.png" class="img-fluid">
                </button>
            </div>
        </div>

        <div class="row">
            <div class="collapse offset-md-9 col-md-3" id="collapseExample" style="position:fixed;">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="login.php">Login</a>
                            <a href="login.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="offset-md-3 col-12 col-sm-12 col-md-6" style="margin-top: 10vh;">
                <form class="row">
                    <div class="offset-2 offset-sm-2 offset-md-2 col-6 col-sm-6 col-md-8">
                        <input type="text" class="form-control" placeholder="Search" id="search-target">
                        <span class="tools">tools</span>
                    </div>


                    <div class="col-2 col-sm-2 col-md-2">
                        <button class="btn btn-success btn-full" id="search" value="submit">Search</button>
                    </div>
                </form>


                <div class="row link-wrapper" id="link-wrapper">
                    <div class="col-6 col-sm-6 col-md-3" id="addItem">
                        <div class="offset-1 offset-sm-1 offset-md-1 col-10 col-sm-10 col-md-10 item">
                            <div class="row">
                                <div class="col-md-12 bc">
                                    <p class="addItem">+</p>
                                </div>

                                <div class="col-md-12 linktext">
                                    <span>Add page</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>
</html>
