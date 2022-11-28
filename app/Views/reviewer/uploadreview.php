<?= $this->extend('layout/templatereviewer'); ?>


<?= $this->section('contentreviewer'); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/reviewer">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/reviewer/full_paper">Full Paper</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Upload Review Paper</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="/reviewer/prosesUpload" method="post" enctype="multipart/form-data">
                        <h3>Upload Review paper <?= $abs_id; ?></h3>
                        <label class="col-form-label">File Review</label>
                        <input type="file" name="review_paper" class="form-control" id="full_paper" onchange="return fileValidation()">
                        <label class="col-form-label">Notes</label>
                        <textarea name="notes" id="" class="form-control" cols="30" rows="10">

                        </textarea>
                        <input type="hidden" name="abs_id" value="<?=$abs_id;?>"> <br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a href="/reviewer/full_paper" class="btn btn-danger">Cancel</a>
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