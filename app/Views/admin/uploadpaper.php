<?= $this->extend('layout/templateadmin'); ?>


<?= $this->section('contentadmin'); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/full_paper">Full Paper</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Upload Full Paper</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/uploadPaper" method="post" enctype="multipart/form-data">
                        <h3>Upload Full paper <?= $abs_id; ?></h3>
                        <input type="file" name="full_paper" class="form-control" id="full_paper" onchange="return fileValidation()">
                        <input type="hidden" name="abs_id" value="<?=$abs_id;?>"> <br>
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