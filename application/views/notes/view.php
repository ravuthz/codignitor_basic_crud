<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3>
                <?php echo $note->name; ?>
            </h3>
            <div class="">
                <p>Created On <?php echo nice_date($note->created_at, 'Y-m-d'); ?></p>
                <hr/>
                <p><?php echo $note->note; ?></p>
                <hr/>
                <div class="row">
                    <div class="col-sm-2">
                        <?php echo anchor(base_url('notes/delete/' . $note->id), 'Delete Note', ['class' => 'btn btn-block btn-danger']); ?>
                    </div>
                    <div class="col-sm-offset-8 col-sm-2">
                        <?php echo anchor(base_url('notes'), 'Back to Notes', ['class' => 'btn btn-block btn-default']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
