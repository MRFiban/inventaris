<form action="<?php echo base_url(); ?>inventory/add_item" class="data-abide novalidate" id="form_add_items" method="post" accept-charset="utf-8">
    <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> There are some errors in your form.</p>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell small-12">
                <label>Nama Barang
                    <input name="name" type="text" placeholder="Nama barang atau bahan (Wajib Diisi!)" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Mohon isi dengan benar sesuai instruksi.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <!-- <div class="cell small-12">
                <label>Merk
                    <input name="test" type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>Kode
                    <input name="test" type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>Kategori
                    <input name="test" type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>Model
                    <input name="test" type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>Nomor Seri
                    <input name="test" type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>Ukuran
                    <input name="test" type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>Tahun Produksi
                    <input name="test" type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div> -->
            <div class="cell small-12">
                <label>Jumlah Barang
                    <input name="test" type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <!-- <div class="cell small-12">
                <label>Harga
                    <input name="test" type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div> -->
            <div class="cell small-12">
                <label>Deskripsi
                    <input name="test" type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <!-- <div class="cell small-12">
                <label>Gambar
                    <input name="test" type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div>
            <div class="cell small-12">
                <label>Gudang
                    <input name="test" type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
                    <span class="form-error">
                        Yo, you had better fill this out, it's required.
                    </span>
                </label>
                <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
            </div> -->
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
    <table id="inventory_table" class="display hover">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Deskripsi</th>
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
            <?php $item_index = 1;
            foreach ($items as $item) : ?>
                <tr>
                    <td><?php echo $item_index; ?></td>
                    <td><?php echo $item['item_id']; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['amount']; ?></td>
                    <td><?php echo $item['description']; ?></td>
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
            <?php $item_index += 1;
            endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Deskripsi</th>
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