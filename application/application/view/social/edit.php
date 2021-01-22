
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Edit Social Media</h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container">
                            <h3 class="page-header">Adjust social media profile:</h3>
                            <!--candidate fulfill the reference -->
                            <form role="form" action="<?php echo URL . 'social/updatesocialmedia/' . $_SESSION["staffid"]; ?>" method="POST">
                                <label>Platform</label>
                                <input autofocus type="text" name="platform" value="<?php echo htmlspecialchars($socialmedia->platform, ENT_QUOTES, 'UTF-8'); ?>" required /> 
                                <label>Link</label>
                                <input type="text" name="link" value="<?php echo htmlspecialchars($socialmedia->link, ENT_QUOTES, 'UTF-8'); ?>" />
                                <input type="hidden" name="social_media_id" value="<?php echo htmlspecialchars($platform->id, ENT_QUOTES, 'UTF-8'); ?>" />
                                <input type="submit" name="submit_update_social_media" value="Update" />
                            </form>

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