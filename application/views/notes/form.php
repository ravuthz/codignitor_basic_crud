<h3><?php echo $title; ?></h3>

<?php echo validation_errors(); ?>

<div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" type="input" name="name" size="50" value="<?php echo $note->name; ?>" />
</div>

<div class="form-group">
    <label for="note">Note</label>
    <textarea class="form-control" name="note" rows="10" cols="40"><?php echo $note->note; ?></textarea>
</div>

<div class="row">
    <div class="col-sm-2">
        <input class="btn btn-block btn-primary" type="submit" name="submit" value="Save Note" />
    </div>
    <div class="col-sm-offset-8 col-sm-2">
        <?php echo anchor(base_url('notes'), 'Back to Notes', ['class' => 'btn btn-block btn-default']); ?>
    </div>
</div>
