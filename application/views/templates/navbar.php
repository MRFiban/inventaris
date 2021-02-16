<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#"> <img src="<?php echo base_url(); ?>assets/images/logo_transparant.png" alt="PT. GM2">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">


        <ul class="navbar-nav nav-pills d-flex container-fluid justify-content-start">
            <!-- <li class="nav-item">
                <a class="nav-link <?php if ($this->uri->segment(2) == "dashboard") {
                                        echo "active";
                                    } ?>" href="<?php echo base_url("inventory/dashboard"); ?>">Beranda</a>
            </li> -->
            <div>
                <li class="nav-item p-2">
                    <a class="nav-link <?php if ($this->uri->segment(2) == "inventory") {
                                            echo "active";
                                        } ?>" href="<?php echo base_url("inventory/inventory"); ?>">Inventaris</a>
                </li>
            </div>
            <div>
                <li class="nav-item p-2">
                    <a class="nav-link <?php if ($this->uri->segment(2) == "projects") {
                                            echo "active";
                                        } ?>" href="<?php echo base_url("inventory/projects"); ?>">Proyek</a>
                </li>
            </div>

            <div>
                <li class="nav-item p-2">
                    <a class="nav-link <?php if ($this->uri->segment(2) == "consumption") {
                                            echo "active";
                                        } ?>" href="<?php echo base_url("inventory/consumption"); ?>">Barang Keluar</a>
                </li>
            </div>

            <div>
                <li class="nav-item p-2">
                    <a class="nav-link <?php if ($this->uri->segment(2) == "purchases") {
                                            echo "active";
                                        } ?>" href="<?php echo base_url("inventory/purchases"); ?>">Barang Masuk</a>
                </li>
            </div>

            <div>
                <li class="nav-item p-2">
                    <a class="nav-link <?php if ($this->uri->segment(2) == "warehouse") {
                                            echo "active";
                                        } ?>" href="<?php echo base_url("inventory/warehouse"); ?>">Gudang</a>
                </li>
            </div>

            <div>
                <li class="nav-item p-2 <?php if ($this->session->userdata('status') == "logged_in") {
                                            echo "d-none";
                                        } ?>">
                    <a class="nav-link <?php if ($this->uri->segment(1) == "auth") {
                                            echo "active";
                                        }
                                        if ($this->session->userdata('status') == "logged_in") {
                                            echo "d-none";
                                        } ?>" href="<?php echo base_url("auth"); ?>">Login</a>
                </li>
            </div>

            <div class="ml-auto p-2">
                <li class=" nav-item <?php if ($this->session->userdata('status') !== "logged_in") {
                                            echo "d-none";
                                        } ?>">
                    <a id="logoutlink" class="nav-link bg-secondary text-center" href="<?php echo base_url("auth/logout"); ?>"><span><?php echo $this->session->userdata('real_name'); ?></span></a>
                </li>
            </div>

        </ul>

    </div>
</nav>
<br>