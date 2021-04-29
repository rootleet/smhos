
<section class="col-sm-2 h-100 o-hide">
    <header class="h_main d-flex flex-wrap align-content-center pl-2">
        <strong class="cname"><?php echo $company_setup['c_name']; ?></strong>
    </header>

    <article class="a_main">
        <ul class="nav h-90 nav-pills nav-justified flex-column">

            <!--Dashboard-->
            <button onclick="location.href='<?php if ($loc !== 'dashboard') {echo '../dashboard/';}   ?>'" class="btn <?php if ($loc === 'dashboard') {echo 'btn-nav-active';} else {echo 'btn-nav';}   ?> text-left rounded-0 d-flex flex-wrap align-content-center justify-content-between">
                <span class="w-20"><div class="ico-sm"><img src="../assets/icos/general/dashboard.png" alt="" class="img-fluid"></div></span>
                <span class="w-80">Dashboard</span>
            </button>


            <?php if (checkPermission(['company_setup'])): ?>
                <!--Company Setup-->
                <button onclick="location.href='<?php if ($loc !== 'company_setup') {echo '../company-setup/';}   ?>'" class="btn <?php if ($loc === 'company_setup') {echo 'btn-nav-active';} else {echo 'btn-nav';}   ?> text-left rounded-0 d-flex flex-wrap align-content-center justify-content-between">
                    <span class="w-20"><div class="ico-sm"><img src="../assets/icos/general/company_setup.png" alt="" class="img-fluid"></div></span>
                    <span class="w-80">Company Setup</span>
                </button>
            <?php endif; ?>



            <?php if (checkPermission(['facility_management'])): ?>
                <!--Facility Management-->
                <button onclick="location.href='<?php if ($loc !== 'facility_management') {echo '../facility-management/';}   ?>'" class="btn <?php if ($loc === 'facility_management') {echo 'btn-nav-active';} else {echo 'btn-nav';}   ?> text-left rounded-0 d-flex flex-wrap align-content-center justify-content-between">
                    <span class="w-20"><div class="ico-sm"><img src="../assets/icos/general/facility_management.png" alt="" class="img-fluid"></div></span>
                    <span class="w-80">Facility Management</span>
                </button>
            <?php endif; ?>

            <?php if (checkPermission(['user_management'])): ?>
                <!--User Management-->
                <button onclick="location.href='<?php if ($loc !== 'user_mgmt') {echo '../user-mgmt/';}   ?>'" class="btn <?php if ($loc === 'user_mgmt') {echo 'btn-nav-active';} else {echo 'btn-nav';}   ?>  text-left rounded-0 d-flex flex-wrap align-content-center justify-content-between">
                    <span class="w-20"><div class="ico-sm"><img src="../assets/icos/general/user_management.png" alt="" class="img-fluid"></div></span>
                    <span class="w-80">User Management</span>
                </button>
            <?php endif; ?>

            <?php if (checkPermission(['reports'])): ?>
                <!--Reports-->
                <button onclick="location.href='<?php if ($loc !== 'reports') {echo '../reports/';}   ?>'" class="btn <?php if ($loc === 'reports') {echo 'btn-nav-active';} else {echo 'btn-nav';}   ?>  text-left rounded-0 d-flex flex-wrap align-content-center justify-content-between">
                    <span class="w-20"><div class="ico-sm"><img src="../assets/icos/general/reports.png" alt="" class="img-fluid"></div></span>
                    <span class="w-80">Reports</span>
                </button>
            <?php endif; ?>

        </ul>

        <div class="w-100 h-10">
            <button onclick="loction.href='www.facebook.com'" class="btn btn-csecondary rounded-0 h-100 w-100">Powered By Rootech.inc</button>
        </div>
    </article>
</section>