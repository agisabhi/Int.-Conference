<?= $this->extend('layout/templateadmin'); ?>


<?= $this->section('contentadmin'); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/setHome">Set Home</a></li>
                <li class="breadcrumb-item active"><a href="/admin/setDate">Conference Date</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/prosesDate" method="post" >
                        <h3>Setting Conference Date </h3>
                        <input type="date" name="conf_date" class="form-control" value="<?=$tanggal;?>">
                        <br>
                        <input type="submit" value="Submit" class="btn btn-success">
                    </form>
                </div>
            </div>
            
            </div>
        </div>
    </div>
</div>
<script>
    function fileValidation() {
                        var fileInput = document.getElementById('full_paper');
                        
                        var filePath = fileInput.value;
                        
                        // Allowing file type
                        var allowedExtensions =
                        /(\.doc|\.docx)$/i;
             
            if (!allowedExtensions.exec(filePath)) {
                alert('File type should be .DOC or .DOCX');
                fileInput.value = '';
                return false;
            }
        }
</script>

<?= $this->endSection(); ?>