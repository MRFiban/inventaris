<form action="<?php echo base_url(); ?>inventory/purchases" class="data-abide novalidate" id="form_add_items" method="post" accept-charset="utf-8">
    <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> There are some errors in your form.</p>
    </div>

    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell small-12">
                <label>supplier_id
                    <input name="supplier_id" type="text" placeholder="ID proyek" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Mohon isi dengan benar sesuai instruksi.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>ID Barang
                    <input name="item_id" type="text" placeholder="ID barang" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>Jumlah
                    <input name="amount" type="text" placeholder="Jumlah" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>order_date
                    <input name="order_date" type="text" placeholder="order_date" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>date_arrived
                    <input name="date_arrived" type="text" placeholder="date_arrived" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>

        </div>
    </div>

    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <fieldset class="cell large-6">
                <button class="button" type="submit" value="Submit">Submit</button>
            </fieldset>
            <fieldset class="cell large-6">
                <button class="button" type="reset" value="Reset">Reset</button>
            </fieldset>
        </div>
    </div>
</form>

<div class="float-center" style="width: 90%">
    <table id="purchases_table" class="display hover">
        <thead>
            <tr>

                <th>#</th>
                <th>ID Pemasok</th>
                <th>ID Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Pesan</th>
                <th>Tanggal Tiba</th>
                <!-- <th></th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th> -->

            </tr>
        </thead>
        <tbody>
            <?php $purchases_index = 1;
            foreach ($purchases as $purchase) : ?>
                <tr>
                    <td><?php echo $purchases_index; ?></td>
                    <td><?php echo $purchase['supplier_id']; ?></td>
                    <td><?php echo $purchase['item_id']; ?></td>
                    <td><?php echo $purchase['amount']; ?></td>
                    <td><?php echo $purchase['order_date']; ?></td>
                    <td><?php echo $purchase['date_arrived']; ?></td>
                    <!-- <td><?php echo $item['name']; ?></td> -->
                    <!-- <td><?php echo $item['name']; ?></td> -->
                    <!-- <td><?php echo $item['name']; ?></td> -->
                    <!-- <td><?php echo $item['name']; ?></td> -->
                    <!-- <td><?php echo $item['name']; ?></td> -->
                    <!-- <td><?php echo $item['name']; ?></td> -->
                    <!-- <td><?php echo $item['name']; ?></td> -->
                    <!-- <td><?php echo $item['name']; ?></td> -->
                    <!-- <td><?php echo $item['name']; ?></td> -->
                    <!-- <td><?php echo $item['name']; ?></td> -->
                    <!-- <td><?php echo $item['name']; ?></td> -->
                    <!-- <td><?php echo $item['name']; ?></td> -->
                    <!-- <td><?php echo $item['name']; ?></td> -->

                </tr>
            <?php $purchases_index += 1;
            endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>ID Pemasok</th>
                <th>ID Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Pesan</th>
                <th>Tanggal Tiba</th>
                <!-- <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th> -->

            </tr>
        </tfoot>
    </table>
</div>
<script>
    $(function() {
        $(document).foundation();
        $('#purchases_table').DataTable({
            "paging": false,
            "ordering": true,
            "info": true,
            "order": [
                [0, "asc"]
            ],
            // "scrollX": true,
            dom: 'B<"clear">lfrtip',
            altEditor: true,
            select: 'single',
            buttons: [{
                    text: 'Add',
                    name: 'add' // do not change name
                },

                {
                    extend: 'selected', // Bind to Selected row
                    text: 'Edit',
                    name: 'edit' // do not change name
                },

                {
                    extend: 'selected', // Bind to Selected row
                    text: 'Delete',
                    name: 'delete' // do not change name
                }, 'copy', 'excel', 'pdf'
            ]
            // buttons: [
            //     'copy', 'excel', 'pdf', 'add'
            // ]
        });
    });
</script>