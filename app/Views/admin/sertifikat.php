<?= $this->extend('layout/templateadmin'); ?>


<?= $this->section('contentadmin'); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/sertifikat">Sertifikat Author</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <?= session()->getFlashdata('pesan'); ?>
                <?php endif; ?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sertifikat Paper Data</h4>
                                <!-- Nav tabs -->
                                <div class="default-tab">
                                    <ul class="nav nav-tabs mb-3" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#all">All</a>
                                        </li>
                                        
                                    </ul>
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="all" role="tabpanel">
                                            <div class="p-t-15">
                                                <div class="col-lg-6">
                                                    
                                        
                                    </div>
                                                <?php $b=1; ?>
                                                
                                                <table id="rp_admin_all" class="table table-primary">
                                                <thead align="center">
                                                    <tr >
                                                        <td><b>Sertifikat Paper Data</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($all as $a) :?>
                                                <tr>
                                                    <td>

                                                        <div class="basic-list-group col-lg-11">
                                                            <div class="list-group">
                                                                <div class="list-group-item list-group-item-action flex-column align-items-start" >
                                                                    
                                                                    <div class=" center-content-between">
                                                                        
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h3 class="mb-1"><?= $a['abs_id']; ?></h5>
                                                                            <?php if($a['status_kehadiran']=="hadir"){ ?>
                                                                                <small><span class="label gradient-5 btn-rounded"><?= $a['status_kehadiran']; ?></span></small>
                                                                            <?php }else if($a['status_kehadiran']=="tidak_hadir") {
                                                                                ?><small><span class="label gradient-7 btn-rounded"><?= $a['status_kehadiran']; ?></span></small>
                                                                            <?php
                                                                            }?>
                                                                            
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="center-content-between">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                        <h4 class="mb-1" align="left"><?= $a['judul']; ?></h4>
                                                                        
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-1" align="left"><?= $a['penulis']; ?></p>
                                                                    
                                                                    <br>
                                                                    <?php if($a['status_kehadiran']=='hadir'){ ?>
                                                                    <a href="/admin/download_sertifikat/<?=$a['abs_id'];?>"><span class="label gradient-7 btn-rounded">Download e-Certificate</span></a><br><br>
                                                                    <?php } ?>
                                                                    <hr>
                                                                    <div class="d-flex w-100 justify-content-between">
                                                                    
                                                                    <div class="basic-dropdown">
                                                                    <div class="btn-group dropup mb-2">
                                                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Set Present</button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item btn btn-success" href="/admin/validasi_sertifikat/<?=$a['abs_id'];?>">Present</a> 
                                                                        <a class="dropdown-item btn btn-danger" href="/admin/validasi_sertifikat_reset/<?=$a['abs_id'];?>">Reset</a> 
                                                                        
                                                                    </div>
                                                                    
                                                                    </div>
                                                                    <div class="btn-group dropup mb-2">

                                                                    
                                                                    </div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    <br><br>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                                
                                                </tbody>
                                                </table>
                                            </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>