<?= $this->extend('layout/templateadmin'); ?>


<?= $this->section('contentadmin'); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/setHome">Set Home</a></li>
                <li class="breadcrumb-item active"><a href="/admin/setDate">Logo</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <?= session()->getFlashdata('pesan'); ?>
                <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <form action="/admin/prosesLogo" method="post" enctype="multipart/form-data">
                        <h3>Upload Logo </h3>
                        <input type="file" name="logo" class="form-control" id="logo" onchange="return fileValidation()">
                        <br>
                        <img src="/event/img/home/<?=$logo;?>" ><br>
                        <input type="submit" value="Upload" class="btn btn-primary">
                    </form>
                </div>
            </div>
            
            </div>
        </div>
    </div>
</div>
<script>
    function fileValidation() {
                        var fileInput = document.getElementById('logo');
                        
                        var filePath = fileInput.value;
                        
                        // Allowing file type
                        var allowedExtensions =
                        /(\.jpg|\.png)$/i;
             
            if (!allowedExtensions.exec(filePath)) {
                alert('File type should be .KPG or .PNG');
                fileInput.value = '';
                return false;
            }
        }
</script>

<?= $this->endSection(); ?>