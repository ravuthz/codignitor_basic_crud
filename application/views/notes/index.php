<div class="container">
    <div class="row">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6 text-right">
            <?php echo anchor(base_url('notes/new'), 'New Note'); ?>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Id</th>
                <th>Name</th>
                <th>Note</th>
                <th class="text-center">Created Date</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notes as $note): ?>
                <tr data-id="<?php echo $note->id; ?>">
                    <td class="text-center"><?php echo $note->id; ?></td>
                    <td><?php echo anchor(base_url('notes/view/' . $note->id), character_limiter($note->name, 50)); ?></td>
                    <td><?php echo character_limiter($note->note, 100); ?></td>
                    <td class="text-center"><?php echo nice_date($note->created_at, 'Y-m-d'); ?></td>
                    <td class="text-center">
                        <?php echo anchor(base_url('notes/edit/' . $note->id), '<span class="glyphicon glyphicon-pencil"></span>'); ?>
                        &nbsp;
                        <?php echo anchor(base_url('notes/delete/' . $note->id), '<span class="glyphicon glyphicon-trash"></span>'); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
