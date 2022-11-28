<?= $this->extend('layout/templateuser'); ?>


<?= $this->section('contentuser'); ?>

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/user">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Download</a></li>
            </ol>
        </div>
    </div>
    <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form action="" id="form-year" method="post">
                            
                                <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-username">Submission Year 
                      </label>
                      <div class="col-lg-10">
                        <select name="year" id="year" class="form-control" onchange="getYear(this.value)">
                            <?php for($i=2022;$i<=date("Y");$i++) {?>
                                <?php if($i==$year) {?>
                                <option value="<?=$i;?>" selected><?=$i;?></option>
                                <?php }else{?>
                                    <option value="<?=$i;?>" ><?=$i;?></option>
                                <?php }?>
                            <?php } ?>
                        </select>
                        <br>
                        <input type="submit"  class="btn btn-primary" value="Change">
                    <!--Button Reset Tampil ketika bukan data tahun ini-->
                        <?php if($year!=date("Y")){?>
                            <a href="/user" class="btn btn-danger">Reset</a>
                        <?php } ?>
                      </div>
                    </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            
                

                    <div class="col-lg-12">
                        
                            <div class="card-body">
                                <h4 class="card-title">E-Certificate</h4>
                                <hr>
                                <div class="row">
                                <?php foreach($sertifikat as $s): ?>
                                <div class="col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="card-title">E-Certificate <?= $s['abs_id']; ?></h5>
                                            <br><br><a href="/user/download_sertifikat/<?=$s['abs_id'];?>" class="btn btn-primary">Download</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                        <br><br><br>
                    <div class="col-lg-12">
                        
                            <div class="card-body">
                                <h4 class="card-title">Letter of Acceptance</h4>
                                <hr>
                                <div class="row">
                                <?php foreach($loa as $a): ?>
                                <div class="col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="card-title">Letter of Acceptance <?= $a['abs_id']; ?></h5>
                                            <br><br><a href="/user/download_loa/<?=$a['abs_id'];?>" class="btn btn-primary" target="_blank">Download LoA</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                        
                    </div>
</div>

<?= $this->endSection(); ?>