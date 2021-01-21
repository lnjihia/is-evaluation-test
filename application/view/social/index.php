
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Social Media</h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container">
                            <h3 class="page-header">Add social media:</h3>
                            <form action="<?php echo(social/addSocialMedia . $_SESSION["staffid"]); ?>" method="POST">
                                <!-- candidate fulfill the reference -->
                                <!--how to call the method??! -->
                                <label>Platform</label>
                                <input type="text" name="platform" value="" required />
                                <label>Link</label>
                                <input type="text" name="link" value="" />
                                <input type="submit" name="submit_add_social_media" value="Submit" />
                            </form>

                            <!-- main content output -->
                            <div class="box">
                                <h3 class="page-header">List of user's social media accounts</h3>
                                <table>
                                    <thead style="background-color: #ddd; font-weight: bold;">
                                        <tr style="font-size:20px;">
                                            <td>Id</td>
                                            <td>Platform</td>
                                            <td>Link</td>
                                            <td>DELETE</td>
                                            <td>EDIT</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($platforms as $platform) { ?>
                                        <tr style="font-size:20px;">
                                            <td><?php if (isset($platform->id)) echo htmlspecialchars($platform->id, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php if (isset($platform->platform)) echo htmlspecialchars($platform->platform, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td>
                                                <?php if (isset($platform->link)) { ?>
                                                    <a href="<?php echo htmlspecialchars($platform->link, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($platform->link, ENT_QUOTES, 'UTF-8'); ?></a>
                                                <?php } ?>
                                            </td>
                                            <td><a href="<?php echo URL . 'social/deletesocialmedia/' . htmlspecialchars($platform->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                                            <!--candidate fulfill the reference -->
                                            <td><a href="<?php echo URL . 'social/updatesocialmedia/' . htmlspecialchars($platform->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                                            <!--candidate fulfill the reference -->
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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