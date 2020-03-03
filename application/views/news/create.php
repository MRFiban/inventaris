<h2><?php echo $title; ?></h2>
<div class=" grid-container">
    <?php echo validation_errors(); ?>
    <?php echo form_open('news/create'); ?>

    <label class=" text-center" for="title">Title</label>
    <input type="text" name="title" /><br />

    <label class=" text-center" for="text">Text</label>
    <textarea class="form-control" name="text"></textarea><br />

    <input class="button primary" type="submit" name="submit" value="Create news item" />
</div>
</form>