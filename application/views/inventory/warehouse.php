<form action="<?php echo base_url(); ?>inventory/warehouse" class="data-abide novalidate" id="form_add_items" method="post" accept-charset="utf-8">
    <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> There are some errors in your form.</p>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell small-12">
                <label>Nama Bagian Gudang
                    <input name="section" type="text" placeholder="Nama bagian gudang" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Mohon isi dengan benar sesuai instruksi.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>Deskripsi
                    <input name="description" type="text" placeholder="Deskripsi fungsi bagian gudang" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>Status kapasitas penyimpanan
                    <input name="capacity" type="text" placeholder="Status ketersediaan tempat penyimpanan" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
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
                <th>Bagian</th>
                <th>Deskripsi</th>
                <th>Kapasitas</th>
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
                <th>#</th> -->

            </tr>
        </thead>
        <tbody>
            <?php $warehouse_index = 1;
            foreach ($warehouse as $gudang) : ?>
                <tr>
                    <td><?php echo $warehouse_index; ?></td>
                    <td><?php echo $gudang['warehouse_section']; ?></td>
                    <td><?php echo $gudang['description']; ?></td>
                    <td><?php echo $gudang['capacity']; ?></td>
                    <!-- <td><?php echo $item['description']; ?></td> -->
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
            <?php $warehouse_index += 1;
            endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Bagian</th>
                <th>Deskripsi</th>
                <th>Kapasitas</th>
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
        $('#warehouse_table').DataTable({
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