<div class="container">
    <?php
        echo form_open('notes/edit/' . $note->id, ['class' => 'form']);
        include "form.php";
        echo form_close();
    ?>
</div>
