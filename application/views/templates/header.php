<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Note CRUD                                                                                                                                                                 <?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('public/js/jquery.min.js'); ?>" charset="utf-8"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>" charset="utf-8"></script>
</head>
<body style="padding-top: 70px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php if ($this->session->flashdata('message')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
