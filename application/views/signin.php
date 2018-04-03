<section>
    
    <div class="panel panel-signin">
        <div class="panel-body">
            <div class="logo text-center">
                <h3><?= $this->config->item("app_name"); ?></h3>
            </div>
            <br />
            <h4 class="text-center mb5">Sign in to your account</h4>
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger" style="margin-top: 20px;"><?= $error; ?></div>
            <?php endif; ?>
            <div class="mb30"></div>

            <?php echo validation_errors(); ?>
            
            <form action="<?= base_url() . 'login/'; ?>" method="post" autocomplete="off">
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <!--<input name="server_ip" id="server_ip" type="text" class="form-control" placeholder="Server IP" value="38.132.204.108">-->
                    <select name="location" id="location" class="form-control" placeholder="Datacenter Location" required="">
                        <option value="" disabled selected>Datacenter Location</option>
                        <?php
                            foreach ($locations as $l) {
                                echo "<option value='{$l['id']}'>{$l['name']}</option>";
                            }
                        ?>
                    </select>
                </div><!-- input-group -->
                
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="username" id="username" type="text" class="form-control" placeholder="Username" required="">
                </div><!-- input-group -->
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input name="secretkey" id="secretkey" type="password" class="form-control" placeholder="Password" required="">
                </div><!-- input-group -->
                
                <div class="clearfix">
                    <div class="pull-left">
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success" name="submit">Sign In <i class="fa fa-angle-right ml5"></i></button>
                    </div>
                </div>
                <input name="redirect" id="redirect" type="hidden" value="<?= (isset($_GET["redirect"]) && !empty($_GET["redirect"])) ? $_GET["redirect"] : 'home'; ?>">            
            </form>
            
        </div><!-- panel-body -->
        <div class="panel-footer">
            <div class="text-center">© <?= date("Y"); ?> Powered by Invision Community</div>
        </div><!-- panel-footer -->
    </div><!-- panel -->
    
</section>
