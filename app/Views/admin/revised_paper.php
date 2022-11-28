<?= $this->extend('layout/templateadmin'); ?>


<?= $this->section('contentadmin'); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/revised_paper">Revised Paper</a></li>
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
                                <h4 class="card-title">Revised Paper Data</h4>
                                <!-- Nav tabs -->
                                <div class="default-tab">
                                    <ul class="nav nav-tabs mb-3" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#all">All</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#accepted">Accepted</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#decline">Decline</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#waiting">Waiting Decision</a>
                                        </li>
                                    </ul>
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="all" role="tabpanel">
                                            <div class="p-t-15">
                                                <div class="col-lg-6">
                                                    
                                        <a href="/admin/DownloadAllRevised" class="btn mb-1 btn-rounded btn-success"><span class="btn-icon-left"><i class="fa fa-download color-warning"></i> </span>Download Accepted Revised Paper</a>
                                    </div>
                                                <?php $b=1; ?>
                                                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                                                <table id="rp_admin_all" class="table table-primary">
                                                <thead align="center">
                                                    <tr >
                                                        <td><b>Full Paper Data</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($abstrak as $a) :?>
                                                <tr>
                                                    <td>

                                                        <div class="basic-list-group col-lg-11">
                                                            <div class="list-group">
                                                                <div class="list-group-item list-group-item-action flex-column align-items-start" >
                                                                    
                                                                    <div class=" center-content-between">
                                                                        <input type="hidden" name="page" value="<?=$i;?>">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h3 class="mb-1"><?= $a['abs_id']; ?></h5>
                                                                            <?php if($a['decision_revised']=="waiting decision"){ ?>
                                                                                <small><span class="label gradient-5 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php }else if($a['decision_revised']=="accepted") {
                                                                                ?><small><span class="label gradient-7 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['decision_revised']=="decline"){?>
                                                                            <small><span class="label gradient-2 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['decision_revised']=="not submitted"){?>
                                                                            <small><span class="label gradient-4 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['decision_revised']=="revision required"){?>
                                                                            <small><span class="label gradient-5 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['decision_revised']=="revision submitted"){?>
                                                                        <span class="badge badge-info px-2"><b><?= $a['decision_revised']; ?></b></span>
                                                                            <?php }?>
                                                                            
                                                                            
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="center-content-between">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                        <h4 class="mb-1" align="left"><?= $a['judul']; ?></h4>
                                                                        <?php if($a['nama_reviewer']!="revdefault"){ ?>

                                                                            <small><span class="label gradient-4 btn-rounded"><?= $a['nama_reviewer']; ?></span></small>
                                                                        <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-1" align="left"><?= $a['penulis']; ?></p>
                                                                    <p class="mb-1" align="left"><?= $a['afiliasi']; ?></p><br>
                                                                    
                                                                    <?php if($a['file_rp']!=""){ ?>
                                                                    <a href="/user/download_revised/<?=$a['abs_id'];?>"><span class="label gradient-7 btn-rounded">Download Revised Paper</span></a><br><br>
                                                                    <?php } ?>
                                                                    <small><b>Keyword: <?= $a['keyword']; ?></b></small>
                                                                    <hr>
                                                                    <div class="d-flex w-100 justify-content-between">
                                                                    <small>Created at: <?= $a['created_revised']; ?><br>Last Update: <?= $a['last_revised']; ?></small>
                                                                    <div class="basic-dropdown">
                                                                    <div class="btn-group dropup mb-2">
                                                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Set Final Decision</button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item btn btn-success" href="/admin/validasi_revised_acc/<?=$a['abs_id'];?>">Accept</a> 
                                                                        <a class="dropdown-item btn btn-danger" href="/admin/validasi_revised_decline/<?=$a['abs_id'];?>">Decline</a> 
                                                                        
                                                                    </div>
                                                                    
                                                                    </div>
                                                                    <div class="btn-group dropup mb-2">

                                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Action</button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item btn " href="/admin/addPaperAuthor/<?=$a['abs_id'];?>">Upload Paper Author</a> 
                                                                        <a class="dropdown-item btn " href="/admin/setReviewer/<?=$a['abs_id'];?>">Set Reviewer</a> 
                                                                        
                                                                    </div>
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
                                        
                                        <div class="tab-pane fade" id="accepted">
                                            <div class="p-t-15">
                                                <table id="rp_admin_acc" class="table table-primary" width="990px">
                                                <thead align="center">
                                                    <tr >
                                                        <td><b>Full Paper Data</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($accept as $a) :?>
                                                <tr>
                                                    <td>

                                                        <div class="basic-list-group col-lg-11">
                                                            <div class="list-group">
                                                                <div class="list-group-item list-group-item-action flex-column align-items-start" >
                                                                    
                                                                    <div class=" center-content-between">
                                                                        <input type="hidden" name="page" value="<?=$i;?>">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h3 class="mb-1"><?= $a['abs_id']; ?></h5>
                                                                            <?php if($a['decision_revised']=="waiting decision"){ ?>
                                                                                <small><span class="label gradient-5 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php }else if($a['decision_revised']=="accepted") {
                                                                                ?><small><span class="label gradient-7 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['decision_revised']=="decline"){?>
                                                                            <small><span class="label gradient-2 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['decision_revised']=="not submitted"){?>
                                                                            <small><span class="label gradient-4 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }?>
                                                                        </div>
                                                                        <h3 class="mb-1" align="left"><?= $a['judul']; ?></h3>
                                                                    </div>
                                                                    <p class="mb-1" align="left"><?= $a['penulis']; ?></p>
                                                                    <p class="mb-1" align="left"><?= $a['afiliasi']; ?></p><br>
                                                                    
                                                                    <?php if($a['file_rp']!=""){ ?>
                                                                    <a href="/user/download_revised/<?=$a['abs_id'];?>"><span class="label gradient-7 btn-rounded">Download Revised Paper</span></a><br><br>
                                                                    <?php } ?>
                                                                    <small><b>Keyword: <?= $a['keyword']; ?></b></small>
                                                                    <hr>
                                                                    <div class="d-flex w-100 justify-content-between">
                                                                    <small>Created at: <?= $a['created_revised']; ?><br>Last Update: <?= $a['last_revised']; ?></small>
                                                                    <div class="btn-group dropup mb-2">
                                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Action</button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item btn btn-success" href="/admin/validasi_abstrak_acc/<?=$a['abs_id'];?>">Accept</a> 
                                                                        <a class="dropdown-item btn btn-danger" href="/admin/validasi_abstrak_decline/<?=$a['abs_id'];?>">Decline</a> 
                                                                        
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
                                        <div class="tab-pane fade" id="decline">
                                            <div class="p-t-15">
                                                <table id="rp_admin_dec" class="table table-primary" width="990px">
                                                <thead align="center">
                                                    <tr >
                                                        <td><b>Full Paper Data</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($decline as $a) :?>
                                                <tr>
                                                    <td>

                                                        <div class="basic-list-group col-lg-11">
                                                            <div class="list-group">
                                                                <div class="list-group-item list-group-item-action flex-column align-items-start" >
                                                                    
                                                                    <div class=" center-content-between">
                                                                        <input type="hidden" name="page" value="<?=$i;?>">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h3 class="mb-1"><?= $a['abs_id']; ?></h5>
                                                                            <?php if($a['decision_revised']=="waiting decision"){ ?>
                                                                                <small><span class="label gradient-5 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php }else if($a['decision_revised']=="accepted") {
                                                                                ?><small><span class="label gradient-7 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['decision_revised']=="decline"){?>
                                                                            <small><span class="label gradient-2 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['decision_revised']=="not submitted"){?>
                                                                            <small><span class="label gradient-4 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }?>
                                                                        </div>
                                                                        <h3 class="mb-1" align="left"><?= $a['judul']; ?></h3>
                                                                    </div>
                                                                    <p class="mb-1" align="left"><?= $a['penulis']; ?></p>
                                                                    <p class="mb-1" align="left"><?= $a['afiliasi']; ?></p><br>
                                                                    
                                                                    <?php if($a['file_rp']!=""){ ?>
                                                                    <a href="/user/download_revised/<?=$a['abs_id'];?>"><span class="label gradient-7 btn-rounded">Download Full Paper</span></a><br><br>
                                                                    <?php } ?>
                                                                    <small><b>Keyword: <?= $a['keyword']; ?></b></small>
                                                                    <hr>
                                                                    <div class="d-flex w-100 justify-content-between">
                                                                    <small>Created at: <?= $a['created_revised']; ?><br>Last Update: <?= $a['last_revised']; ?></small>
                                                                    <div class="btn-group dropup mb-2">
                                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Action</button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item btn btn-success" href="/admin/validasi_abstrak_acc/<?=$a['abs_id'];?>">Accept</a> 
                                                                        <a class="dropdown-item btn btn-danger" href="/admin/validasi_abstrak_decline/<?=$a['abs_id'];?>">Decline</a> 
                                                                        
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
                                        <div class="tab-pane fade" id="waiting">
                                            <div class="p-t-15">
                                                <table id="rp_admin_wait" class="table table-primary" width="990px">
                                                <thead align="center">
                                                    <tr >
                                                        <td><b>Full Paper Data</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($wait as $a) :?>
                                                <tr>
                                                    <td>

                                                        <div class="basic-list-group col-lg-11">
                                                            <div class="list-group">
                                                                <div class="list-group-item list-group-item-action flex-column align-items-start" >
                                                                    
                                                                    <div class=" center-content-between">
                                                                        <input type="hidden" name="page" value="<?=$i;?>">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h3 class="mb-1"><?= $a['abs_id']; ?></h5>
                                                                            <?php if($a['decision_revised']=="waiting decision"){ ?>
                                                                                <small><span class="label gradient-5 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php }else if($a['decision_revised']=="accepted") {
                                                                                ?><small><span class="label gradient-7 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['decision_revised']=="decline"){?>
                                                                            <small><span class="label gradient-2 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['decision_revised']=="not submitted"){?>
                                                                            <small><span class="label gradient-4 btn-rounded"><?= $a['decision_revised']; ?></span></small>
                                                                            <?php
                                                                            }?>
                                                                        </div>
                                                                        <h3 class="mb-1" align="left"><?= $a['judul']; ?></h3>
                                                                    </div>
                                                                    <p class="mb-1" align="left"><?= $a['penulis']; ?></p>
                                                                    <p class="mb-1" align="left"><?= $a['afiliasi']; ?></p><br>
                                                                    
                                                                    <?php if($a['file_rp']!=""){ ?>
                                                                    <a href="/user/download_revised/<?=$a['abs_id'];?>"><span class="label gradient-7 btn-rounded">Download Revised Paper</span></a><br><br>
                                                                    <?php } ?>
                                                                    <small><b>Keyword: <?= $a['keyword']; ?></b></small>
                                                                    <hr>
                                                                    <div class="d-flex w-100 justify-content-between">
                                                                    <small>Created at: <?= $a['created_revised']; ?><br>Last Update: <?= $a['last_revised']; ?></small>
                                                                    <div class="btn-group dropup mb-2">
                                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Action</button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item btn btn-success" href="/admin/validasi_abstrak_acc/<?=$a['abs_id'];?>">Accept</a> 
                                                                        <a class="dropdown-item btn btn-danger" href="/admin/validasi_abstrak_decline/<?=$a['abs_id'];?>">Decline</a> 
                                                                        
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