<?= $this->extend('layout/templatereviewer'); ?>


<?= $this->section('contentreviewer'); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/reviewer">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/reviewer/revised_paper">Revised Paper</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Set Decision Revised Paper</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="/reviewer/decisionRevised" method="post" enctype="multipart/form-data">
                        <h3>Set Decision Revised Paper <?= $abs_id; ?></h3>
                        <label class="col-form-label">Decision</label>
                        <select name="decision_revised" class="form-control" required>
                            <option value="">-- Select an Option --</option>
                            <option value="accepted">Accepted</option>
                            <option value="decline">Decline</option>
                        </select>
                        <label class="col-form-label">Notes</label>
                        <textarea name="notes_revised" id="" class="form-control" cols="30" rows="10" required>

                        </textarea>
                        <input type="hidden" name="abs_id" value="<?=$abs_id;?>"> <br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a href="/reviewer/revised_paper" class="btn btn-danger">Cancel</a>
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