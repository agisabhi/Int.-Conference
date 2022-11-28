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
                    <form action="/admin/settingReviewer" method="post" enctype="multipart/form-data">
                        <h3>Setting Reviewer Full paper <?= $abs_id; ?></h3>
                        <select name="id_reviewer" class="form-control">
                            <?php foreach($rev as $r): ?>
                            <option value="<?=$r['id'];?>"><?= $r['nama_reviewer']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="abs_id" value="<?=$abs_id;?>"> <br>
                        <input type="submit" value="Submit" class="btn btn-primary">
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