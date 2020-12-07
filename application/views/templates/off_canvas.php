<div class="cell">
    <div class="off-canvas-wrapper">
        <div class="off-canvas position-left" id="offCanvasLeft1" data-off-canvas>
            <!-- Your menu or Off-canvas content goes here -->
            <ul class=" vertical menu accordion-menu" data-accordion-menu>
                <li><a href="<?php echo base_url("inventory/dashboard"); ?>">Beranda</a></li>
                <li><a href="<?php echo base_url("inventory/current_inventory"); ?>">Inventaris</a></li>
                <li><a href="<?php echo base_url("inventory/warehouses"); ?>">Gudang</a></li>
                <li><a href="<?php echo base_url("inventory/projects"); ?>">Projek</a></li>
                <li><a href="<?php echo base_url("inventory/outgoing_orders"); ?>">Pesanan Keluar</a></li>
                <li><a href="<?php echo base_url("inventory/incoming_purchases"); ?>">Pembelian Masuk</a></li>
                <li><a href="<?php echo base_url("inventory/reports"); ?>">Laporan</a></li>
                <li><a href="<?php echo base_url("inventory/forecast"); ?>">Prakira</a>
                <li><a href="#">-</a>
                    <ul class="menu vertical nested">
                        <li><a href="#">Item 1A</a></li>
                        <li><a href="#">Item 1B</a></li>
                    </ul>
                </li>
                <li><a href="#">-</a>
                    <ul class="menu vertical nested">
                        <li><a href="#">Item 1A</a></li>
                        <li><a href="#">Item 1B</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="off-canvas position-right" id="offCanvasRight1" data-off-canvas>
            <!-- Your menu or Off-canvas content goes here -->B
        </div>
        <div class="off-canvas position-top" id="offCanvasTop1" data-off-canvas>
            <!-- Your menu or Off-canvas content goes here -->C
        </div>
        <div class="off-canvas position-bottom" id="offCanvasBottom1" data-off-canvas>
            <!-- Your menu or Off-canvas content goes here -->D
        </div>

        <div class="off-canvas-content position-fixed-bottom" data-off-canvas-content>
            <button type="button" class="button fixed-left" data-toggle="offCanvasLeft1"></button>
        </div>
    </div>
</div>