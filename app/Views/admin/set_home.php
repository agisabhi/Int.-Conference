<?= $this->extend('layout/templateadmin'); ?>


<?= $this->section('contentadmin'); ?>

<div class="content-body">
    
            <div class="row page-titles mx-0" >
                <div class="col p-md-0" align="right">
                    <ol class="breadcrumb" >
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/setHome">Page - Home</a></li>
                    </ol>
                </div>
            </div>
    <div class="container-fluid">
        <div class="row">
            <!-- row -->
                    <div class="col-lg-12">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                    <?= session()->getFlashdata('pesan'); ?>
                <?php endif; ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Home Page Management</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Content Name</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td>Conference Date</td>
                                                <td><span><a href="/admin/setDate" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i></a></span>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td>About Conference</td>
                                                <td><span><a href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i></a></span>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <th>3</th>
                                                <td>Conference Scope</td>
                                                <td><span><a href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i></a></span>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <th>4</th>
                                                <td>Important Dates</td>
                                                <td><span><a href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i></a></span>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <th>5</th>
                                                <td>Logo ISCEER</td>
                                                <td><span><a href="/admin/setLogo" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i></a></span>
                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>