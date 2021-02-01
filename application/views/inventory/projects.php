<form action="<?php echo base_url(); ?>inventory/projects" class="data-abide novalidate" id="form_add_items" method="post" accept-charset="utf-8">
    <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> There are some errors in your form.</p>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell small-12">
                <label>Nama Proyek
                    <input name="project_id" type="text" placeholder="Nama proyek atau ID proyek (Wajib Diisi!)" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Mohon isi dengan benar sesuai instruksi.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>Nama Barang
                    <input name="item_id" type="text" placeholder="Nama barang atau ID barang (Wajib Diisi!)" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>Jumlah
                    <input name="amount" type="text" placeholder="Jumlah kebutuhan (Angka)" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
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
    <table id="needs_table" class="display hover">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Proyek</th>
                <th>ID Barang</th>
                <th>Jumlah</th>
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
            <?php $need_index = 1;
            foreach ($needs as $need) : ?>
                <tr>
                    <td><?php echo $need_index; ?></td>
                    <td><?php echo $need['project_id']; ?></td>
                    <td><?php echo $need['item_id']; ?></td>
                    <td><?php echo $need['amount']; ?></td>
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
            <?php $need_index += 1;
            endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>ID Proyek</th>
                <th>ID Barang</th>
                <th>Jumlah</th>
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