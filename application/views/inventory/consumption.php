<form action="<?php echo base_url(); ?>inventory/consumption" class="data-abide novalidate" id="form_add_items" method="post" accept-charset="utf-8">
    <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> There are some errors in your form.</p>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell small-12">
                <label>ID Proyek
                    <input name="project_id" type="text" placeholder="ID proyek" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
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
                <label>Tanggal
                    <input name="date" type="text" placeholder="Tanggal" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
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
    <table id="warehouse_table" class="display hover">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Proyek</th>
                <th>ID Barang</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
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
            <?php $consumption_index = 1;
            foreach ($consumption as $konsumsi) : ?>
                <tr>
                    <td><?php echo $consumption_index; ?></td>
                    <td><?php echo $konsumsi['project_id']; ?></td>
                    <td><?php echo $konsumsi['item_id']; ?></td>
                    <td><?php echo $konsumsi['amount']; ?></td>
                    <td><?php echo $konsumsi['consumption_date']; ?></td>
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
                    <!-- <td><?php echo $item['name']; ?></td> -->

                </tr>
            <?php $consumption_index += 1;
            endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>ID Proyek</th>
                <th>ID Barang</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
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
        $('#consumption_table').DataTable({
            "paging": false,
            "ordering": true,
            "info": true,
            "order": [
                [0, "asc"]
            ],
            // "scrollX": true,
            dom: 'B<"clear">lfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });
    });
</script>