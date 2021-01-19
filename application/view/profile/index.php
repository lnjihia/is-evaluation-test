
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">User Profile</h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                            <h1><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></h1>
                            <p>
                                <i class="fa fa-user fa-fw"></i><b><?php echo $_SESSION['staffid']; ?></b></br>
                                <i class="fa fa-at fa-fw"></i><b><?php echo $_SESSION['email']; ?></b></br>
                                <i class="fa fa-phone fa-fw"></i><b><?php echo $_SESSION['phonenumber']; ?></b></br>
                            </p>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->