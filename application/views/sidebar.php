<?php if (!empty($login) && ($login["status"] == 1)) : ?>
<div class="leftpanel">
    <div class="media profile-left">
      <?php if (isset($login["admin"]) && $login["admin"] == 0) : ?>
        <div class="media-body">
            <h5 class="media-heading"><?= $_SESSION["login"]["location"]; ?></h5>
            <h5 class="media-heading"><?= $_SESSION["login"]["server"]["ip"]; ?></h5>
        </div>
      <?php endif; ?>
    </div><!-- media -->

    <h5 class="leftpanel-title">Navigation</h5>

    <ul class="nav nav-pills nav-stacked">
        <?php if (isset($login["admin"]) && $login["admin"] == 1) : ?>
            <li class="<?= ($controller == "fortigates") ? "active" : ''; ?>"><a href="<?= base_url() . "admin/fortigates"; ?>"><i class="fa fa-globe"></i> <span>Fortigates</span></a></li>
            <li class="<?= ($controller == "locations") ? "active" : ''; ?>"><a href="<?= base_url() . "admin/locations"; ?>"><i class="glyphicon glyphicon-map-marker"></i> <span>Locations</span></a></li>

        <?php else : ?>
            <li class="<?= ($controller == "addresses") ? "active" : ''; ?>"><a href="<?= base_url() . "addresses"; ?>"><i class="glyphicon glyphicon-pushpin"></i> <span>Addresses</span></a></li>
            <li class="<?= ($controller == "address_groups") ? "active" : ''; ?>"><a href="<?= base_url() . "address_groups"; ?>"><i class="fa fa-group"></i> <span>Address Groups</span></a></li>
        <?php endif; ?>
    </ul>


</div><!-- leftpanel -->

<?php endif; ?>
