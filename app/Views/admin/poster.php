<?= $this->extend('layout/templateadmin'); ?>


<?= $this->section('contentadmin'); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/poster_paper">Poster Paper</a></li>
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
                                <h4 class="card-title">Poster Paper Data</h4>
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
                                                    
                                        
                                    </div>
                                                <?php $b=1; ?>
                                                
                                                <table id="rp_admin_all" class="table table-primary">
                                                <thead align="center">
                                                    <tr >
                                                        <td><b>Poster Paper Data</b></td>
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
                                                                            <?php if($a['status_poster']=="submitted"){ ?>
                                                                                <small><span class="label gradient-5 btn-rounded"><?= $a['status_poster']; ?></span></small>
                                                                            <?php }else if($a['status_poster']=="accepted") {
                                                                                ?><small><span class="label gradient-7 btn-rounded"><?= $a['status_poster']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['status_poster']=="decline"){?>
                                                                            <small><span class="label gradient-2 btn-rounded"><?= $a['status_poster']; ?></span></small>
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
                                                                    
                                                                    
                                                                    <?php if($a['poster']!=""){ ?>
                                                                    <a href="/poster/<?=$a['poster'];?>" target="_blank"><span class="label gradient-7 btn-rounded">Preview Poster </span></a><br><br>
                                                                    <?php } ?>
                                                                    
                                                                    <hr>
                                                                    <div class="d-flex w-100 justify-content-between">
                                                                    <small>Created at: <?= $a['submit_poster']; ?><br>Last Update: <?= $a['update_poster']; ?></small>
                                                                    <div class="basic-dropdown">
                                                                    <div class="btn-group dropup mb-2">
                                                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Set Final Decision</button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item btn btn-success" href="/admin/validasi_poster_acc/<?=$a['abs_id'];?>">Accept</a> 
                                                                        <a class="dropdown-item btn btn-danger" href="/admin/validasi_poster_decline/<?=$a['abs_id'];?>">Decline</a> 
                                                                        
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
                                        
                                        <div class="tab-pane fade" id="accepted">
                                            <div class="p-t-15">
                                                <table id="rp_admin_acc" class="table table-primary" width="990px">
                                                <thead align="center">
                                                    <tr >
                                                        <td><b>Poster Paper Data</b></td>
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
                                                                        
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h3 class="mb-1"><?= $a['abs_id']; ?></h5>
                                                                            <?php if($a['status_poster']=="submitted"){ ?>
                                                                                <small><span class="label gradient-5 btn-rounded"><?= $a['status_poster']; ?></span></small>
                                                                            <?php }else if($a['status_poster']=="accepted") {
                                                                                ?><small><span class="label gradient-7 btn-rounded"><?= $a['status_poster']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['status_poster']=="decline"){?>
                                                                            <small><span class="label gradient-2 btn-rounded"><?= $a['status_poster']; ?></span></small>
                                                                            <?php
                                                                            }?>
                                                                        </div>
                                                                        <h3 class="mb-1" align="left"><?= $a['judul']; ?></h3>
                                                                    </div>
                                                                    <p class="mb-1" align="left"><?= $a['penulis']; ?></p>
                                                                    
                                                                    <?php if($a['poster']!=""){ ?>
                                                                    <a href="poster/<?=$a['poster'];?>" target="_blank"><span class="label gradient-7 btn-rounded">Preview Poster </span></a><br><br>
                                                                    <?php } ?>
                                                                    
                                                                    <hr>
                                                                    <div class="d-flex w-100 justify-content-between">
                                                                    <small>Created at: <?= $a['submit_poster']; ?><br>Last Update: <?= $a['update_poster']; ?></small>
                                                                    <div class="btn-group dropup mb-2">
                                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Action</button>
                                                                    
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
                                                        <td><b>Poster Paper Data</b></td>
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
                                                                            <?php if($a['status_poster']=="submitted"){ ?>
                                                                                <small><span class="label gradient-5 btn-rounded"><?= $a['status_poster']; ?></span></small>
                                                                            <?php }else if($a['status_poster']=="accepted") {
                                                                                ?><small><span class="label gradient-7 btn-rounded"><?= $a['status_poster']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['status_poster']=="decline"){?>
                                                                            <small><span class="label gradient-2 btn-rounded"><?= $a['status_poster']; ?></span></small>
                                                                            <?php
                                                                            }?>
                                                                        </div>
                                                                        <h3 class="mb-1" align="left"><?= $a['judul']; ?></h3>
                                                                    </div>
                                                                    <p class="mb-1" align="left"><?= $a['penulis']; ?></p>
                                                                    
                                                                    <?php if($a['poster']!=""){ ?>
                                                                    <a href="poster/<?=$a['poster'];?>" target="_blank"><span class="label gradient-7 btn-rounded">Preview Poster </span></a><br><br>
                                                                    <?php } ?>
                                                                    
                                                                    <hr>
                                                                    <div class="d-flex w-100 justify-content-between">
                                                                    <small>Created at: <?= $a['submit_poster']; ?><br>Last Update: <?= $a['update_poster']; ?></small>
                                                                    <div class="btn-group dropup mb-2">
                                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Action</button>
                                                                    
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
                                                                        
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h3 class="mb-1"><?= $a['abs_id']; ?></h5>
                                                                            <?php if($a['status_poster']=="submitted"){ ?>
                                                                                <small><span class="label gradient-5 btn-rounded"><?= $a['status_poster']; ?></span></small>
                                                                            <?php }else if($a['status_poster']=="accepted") {
                                                                                ?><small><span class="label gradient-7 btn-rounded"><?= $a['status_poster']; ?></span></small>
                                                                            <?php
                                                                            }else if($a['status_poster']=="decline"){?>
                                                                            <small><span class="label gradient-2 btn-rounded"><?= $a['status_poster']; ?></span></small>
                                                                            <?php
                                                                            }?>
                                                                        </div>
                                                                        <h3 class="mb-1" align="left"><?= $a['judul']; ?></h3>
                                                                    </div>
                                                                    <p class="mb-1" align="left"><?= $a['penulis']; ?></p>
                                                                    
                                                                    <?php if($a['poster']!=""){ ?>
                                                                    <a href="poster/<?=$a['poster'];?>" target="_blank"><span class="label gradient-7 btn-rounded">Preview Poster </span></a><br><br>
                                                                    <?php } ?>
                                                                    
                                                                    <hr>
                                                                    <div class="d-flex w-100 justify-content-between">
                                                                    <small>Created at: <?= $a['submit_poster']; ?><br>Last Update: <?= $a['update_poster']; ?></small>
                                                                    <div class="btn-group dropup mb-2">
                                                                    
                                                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Set Final Decision</button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item btn btn-success" href="/admin/validasi_poster_acc/<?=$a['abs_id'];?>">Accept</a> 
                                                                        <a class="dropdown-item btn btn-danger" href="/admin/validasi_poster_decline/<?=$a['abs_id'];?>">Decline</a> 
                                                                        
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