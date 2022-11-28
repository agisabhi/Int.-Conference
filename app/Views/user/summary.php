<?= $this->extend('layout/templateuser'); ?>


<?= $this->section('contentuser'); ?>

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/user">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Summary</a></li>
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Summary</h4>
                                <div class="table-responsive"> 
                                    <table class="table table-bordered table-striped verticle-middle">
                                        <thead align="center">
                                            <tr>
                                                <th scope="col" >ABS-ID</th>
                                                <th scope="col" >Abstract</th>
                                                <th scope="col" >Full Paper</th>
                                                <th scope="col" >Payment</th>
                                                <th scope="col" >Revised Paper</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($abstrak as $a): ?>
                                            <tr>
                                                <td align="center"><?= $a['abs_id']; ?></td>
                                                <td align="center">
                                                    <?php if($a['status']=="awaiting decision"){ ?>
                                                        <span class="label gradient-5 btn-rounded"><?= $a['status']; ?></span>
                                                    <?php }else if($a['status']=="accepted") {
                                                        ?><span class="label gradient-7 btn-rounded"><?= $a['status']; ?></span>
                                                    <?php
                                                    }else if($a['status']=="decline"){?>
                                                    <span class="label gradient-2 btn-rounded"><?= $a['status']; ?></span>
                                                    <?php
                                                    }?>
                                                </td>
                                                <td align="center">
                                                    <?php if($a['decision']=="waiting_decision"){ ?>
                                                        <span class="label gradient-5 btn-rounded"><?= $a['decision']; ?></span>
                                                    <?php }else if($a['decision']=="accept") {
                                                        ?><span class="label gradient-7 btn-rounded"><?= $a['decision']; ?></span>
                                                    <?php
                                                    }else if($a['decision']=="decline"){?>
                                                    <span class="label gradient-2 btn-rounded"><?= $a['decision']; ?></span>
                                                    <?php
                                                    }else if($a['decision']=="not submitted"){?>
                                                    <span class="label gradient-4 btn-rounded"><?= $a['decision']; ?></span>
                                                    <?php
                                                    }else if($a['decision']=="revision required"){?>
                                                    <span class="label gradient-7 btn-rounded"><?= $a['decision']; ?></span>
                                                    <?php
                                                    }else if($a['decision']=="revision submitted"){?>
                                                                        <span class="badge badge-info px-2"><b><?= $a['decision']; ?></b></span>
                                                            <?php }?></td>
                                                <td align="center">
                                                    <?php if($a['payment_status']=="uploaded"){ ?>
                                                        <span class="label gradient-7 btn-rounded"><?= $a['payment_status']; ?></span>
                                                    <?php }else if($a['payment_status']=="not uploaded") {
                                                        ?><span class="label gradient-2 btn-rounded"><?= $a['payment_status']; ?></span>
                                                    <?php
                                                    }?>
                                                </td>
                                                <td align="center">
                                                    <?php if($a['decision_revised']=="waiting decision"){ ?>
                                                        <span class="label gradient-5 btn-rounded"><?= $a['decision_revised']; ?></span>
                                                    <?php }else if($a['decision_revised']=="accepted") {
                                                        ?><span class="label gradient-7 btn-rounded"><?= $a['decision_revised']; ?></span>
                                                    <?php
                                                    }else if($a['decision_revised']=="decline"){?>
                                                    <span class="label gradient-2 btn-rounded"><?= $a['decision_revised']; ?></span>
                                                    <?php
                                                    }else if($a['decision_revised']=="not submitted"){?>
                                                    <span class="label gradient-4 btn-rounded"><?= $a['decision_revised']; ?></span>
                                                    <?php
                                                    }?>
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

<?= $this->endSection(); ?>