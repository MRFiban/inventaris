<h2><?php echo $title; ?></h2>
<div class="container">
    <?php echo validation_errors(); ?>
    <?php echo form_open('news/create'); ?>

    <label for="title">Title</label>
    <input class="form-control" type="text" name="title" /><br />

    <label for="text">Text</label>
    <textarea class="form-control" name="text"></textarea><br />

    <input class="btn btn-dark justify-content-center" type="submit" name="submit" value="Create news item" />
</div>
</form>