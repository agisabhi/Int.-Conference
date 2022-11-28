<?= $this->extend('layout/templateadmin'); ?>


<?= $this->section('contentadmin'); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/email">Email</a></li>
                
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
                    <form action="/admin/prosesEmail" method="post" enctype="multipart/form-data">
                        <h3>Send Email Notification </h3>
                        <div class="form-row">
                        <div class="form-group col-md-6">

                            <label class="col-form-label">Tema</label>
                            <select name="tema" class="form-control" required>
                                <option value="" selected>-- Select an Option --</option>
                                <option value="abstract_acc">Abstract Accepted</option>
                                <option value="full_req">Full Paper Required</option>
                                <option value="revised_req">Revision Required</option>
                                <option value="revised_acc">Revised Accepted</option>
                                <option value="poster_req">Poster Required</option>
                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">

                            <label class="col-form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>
                        </div>
                        <label class="col-form-label">Body Email</label>
                        <textarea name="isi" class="form-control" cols="30" rows="10" required>

                        </textarea>
                         <br>
                         <label for="">Attachment</label>
                         <input type="file" name="file[]" class="form-control" multiple="multiple" ><br>
                        <input type="submit" value="Send" class="btn btn-primary">
                        
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