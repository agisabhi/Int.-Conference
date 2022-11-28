<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title; ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="logoisceer.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="/template/theme/css/style.css" rel="stylesheet">

</head>

<?= $this->renderSection('content'); ?>
<!--**********************************
        Scripts
    ***********************************-->
<script src="/template/theme/plugins/common/common.min.js"></script>
<script src="/template/theme/js/custom.min.js"></script>
<script src="/template/theme/js/settings.js"></script>
<script src="/template/theme/js/gleek.js"></script>
<script src="/template/theme/js/styleSwitcher.js"></script>
<script src="/template/theme/plugins/validation/jquery.validate.min.js"></script>
<script src="/template/theme/plugins/validation/jquery.validate-init.js"></script>
</body>

</html>