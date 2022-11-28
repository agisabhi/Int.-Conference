<?= $this->extend('layout/templateuser'); ?>


<?= $this->section('contentuser'); ?>

<!--**********************************
            Content body start
        ***********************************-->
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form action="/user" id="form-year" method="post">
                            
                                <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-username">Submission Year <?= $year; ?>
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
            </div>
                    <br>
                <div class="col-lg-12">
                    
                
                    <div class="button-icon" align="right">
                        <?php if($now>=$sc['awal_abstrak'] && $now<=$sc['akhir_abstrak']){?> 
                            <a href="/user/tambahabstrak" class="btn mb-1 btn-primary">Add New Abstract <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                        <?php } ?>
                        
                    </div>
                </div>
        </div>
    
    <?php if (session()->getFlashdata('pesan')) : ?>
                <?= session()->getFlashdata('pesan'); ?>
            <?php endif; ?>
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <?php $b=1; ?>
            <?php foreach($abstrak as $a) : ?>
            <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                
                                
                                
                                    <form action="/user/delete/<?=$a['abs_id'];?>" method="post">
                                        <?php csrf_field(); ?>
                                        <p align="right">
                                        <a href="/user/editabstrak/<?=$a['uniqid'];?>" class="btn mb-1 btn-primary btn-xs">Edit <span class="btn-icon-right"><i class="fa fa-pencil"></i></span></a>
                                        <input type="hidden" class="btn btn-danger btn sweet-wrong"></input>
                                        <input type="hidden" class="btn btn-info btn sweet-message"></input>
                                        <input type="hidden" class="btn btn-primary btn sweet-text"></input>
                                        <input type="hidden" class="btn btn-success btn sweet-success"></input>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn mb-1 btn-danger btn-xs"  onclick="return confirm('Are You Sure to Delete this Abstract?')">Delete<span class="btn-icon-right"><i class="fa fa-trash"></i></span></button>
                                    </p>
                                    </form>
                                
                                
                                
                                <div class="basic-list-group">
                                    <div class="list-group">
                                        <div class="list-group-item list-group-item-action flex-column align-items-start" >
                                            
                                            <div class=" center-content-between">
                                                <h3 class="mb-1" align="center"><?= $a['abs_id']; ?> </h3>
                                                <h3 class="mb-1" align="center"><?= $a['judul']; ?></h3>
                                            </div>
                                            <p class="mb-1" align="center"><?= $a['penulis']; ?></p>
                                            <p class="mb-1" align="center"><?= $a['afiliasi']; ?></p><br>
                                            <p class="mb-1" align="center"><b>Topic: <?= $a['scope']; ?></b></p>
                                            <p class="mb-1" align="justify"><?= $a['abstrak']; ?></p><br>
                                            <small><b>Keyword: <?= $a['keyword']; ?></b></small>
                                        </div>
                                        
                                    </div>
                                </div>
                                <br>    
                                <div id="accordion-three" class="accordion">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne<?=$b;?>" aria-expanded="true" aria-controls="collapseOne<?=$b;?>"><i class="fa" aria-hidden="true"></i> Abstract for <?= $a['abs_id']; ?></h5>
                                        </div>
                                        <div id="collapseOne<?=$b;?>" class="collapse show" data-parent="#accordion-three">
                                            <div class="table-responsive">
                                                <table class="table table-striped" >
                                                    <thead>
                                                        
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3"><small>Created at <?= $a['submit_date']; ?>. Last Update <?= $a['update_date']; ?></small>    </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td width="200px"><b>Status</b></td>
                                                            <td width="20px">:</td>
                                                            <td>
                                                                <?php if($a['status']=="awaiting decision") {?>
                                                                    <span class="badge badge-warning px-2"><b><?= $a['status']; ?></b></span>
                                                                <?php }else if($a['status']=="accepted"){?> 
                                                                    <span class="badge badge-success px-2"><b><?= $a['status']; ?></b></span>
                                                                     
                                                                    <?php } else if($a['status']=="decline"){?>
                                                                        <span class="badge badge-danger px-2"><b><?= $a['status']; ?></b></span>
                                                            <?php } ?>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Note From Reviewer</td>
                                                            <td>:</td>
                                                            <td>-</td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo<?=$b;?>" aria-expanded="false" aria-controls="collapseTwo<?=$b;?>"><i class="fa" aria-hidden="true"></i> Full Paper for <?= $a['abs_id']; ?> <?php if($a['decision']=='revision required'){?>
                                                <span class="label gradient-4 btn-rounded">Full Paper Revision Required</span>
                                            <?php }else{ ?>

                                                <?php }?></h5>
                                            
                                                
                                        </div>
                                        <div id="collapseTwo<?=$b;?>" class="collapse" data-parent="#accordion-three">
                                            <div class="table-responsive">
                                                <table class="table table-striped" >
                                                    <thead>
                                                        
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3"><small>Created at <?= $a['created_at']; ?> Last Update <?= $a['last_update']; ?> </small>    </td>
                                                        </tr>
                                                        <?php if($a['status']=="accepted"){ ?>
                                                        <tr>
                                                            <?php if($now>=$sc['awal_full'] && $now<=$sc['akhir_full']){?> 
                                                            
                                                            <form action="/user/full_paper" method="post" enctype="multipart/form-data">
                                                                <?= csrf_field(); ?>
                                                                <td>Upload Full Paper</td>
                                                                <td>:</td>
                                                                <input type="hidden" name="abs_id" value="<?=$a['abs_id'];?>">
                                                                <td><input type="file" name="full_paper" class="form-control" id="full_paper<?=$b;?>" onchange="return fileValidation<?=$b;?>()" required> <br>
                                                                    <input type="submit" class="btn btn-primary" value="Upload">
                                                                </td>
                                                                
                                                            </form>
                                                            <?php } ?>
                                                        </tr>
                                                        <?php } ?>
                                                        <tr>
                                                            <td>Full Paper</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php if($a['file_fp']=='') {?>
                                                                    -
                                                                <?php }else{?>
                                                                <a href="/user/download_full/<?=$a['abs_id'];?>" class="text-green">Download Full Paper</a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td width="200px"><b>Decision</b></td>
                                                            <td width="20px">:</td>
                                                            <td>
                                                                <?php if($a['decision']=="waiting_decision") {?>
                                                                    <span class="badge badge-warning px-2"><b>Waiting Decision</b></span>
                                                                <?php }else if($a['decision']=="accepted"){?> 
                                                                    <span class="badge badge-success px-2"><b><?= $a['decision']; ?></b></span>
                                                                     
                                                                    <?php } else if($a['decision']=="decline"){?>
                                                                        <span class="badge badge-danger px-2"><b><?= $a['decision']; ?></b></span>
                                                            <?php } else if($a['decision']=="revision required"){?>
                                                                        <span class="badge badge-info px-2"><b><?= $a['decision']; ?></b></span>
                                                            <?php } else if($a['decision']=="not submitted"){?>
                                                                        <span class="badge badge-info px-2"><b><?= $a['decision']; ?></b></span>
                                                            <?php }else if($a['decision']=="revision submitted"){?>
                                                                        <span class="badge badge-info px-2"><b><?= $a['decision']; ?></b></span>
                                                            <?php } ?>
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Note From Reviewer</td>
                                                            <td>:</td>
                                                            <td><?= $a['notrev']; ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Reviewed Full Paper</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php if($a['file_review']!=''){ ?>
                                                                <a href="/user/download_review/<?= $a['abs_id']; ?>" class="text-red">Download Review Paper</a>
                                                                <?php }else{?>
                                                                    -
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree<?=$b;?>" aria-expanded="false" aria-controls="<?=$b;?>"><i class="fa" aria-hidden="true"></i> Payment Proof for <?= $a['abs_id']; ?></h5>
                                        </div>
                                        <div id="collapseThree<?=$b;?>" class="collapse" data-parent="#accordion-three">
                                            <div class="alert alert-info"><b>Kindly be informed that for the paper that is rejected in the level of committee, registration fee will be returned after deduction for a review fee of IDR 500,000. However, for the paper that is rejected by the publisher, registration fee is nonrefundable.</b>
                                                <br><br>
                                                   <i> Diberitahukan kepada peserta yang papernya direject di tahap panitia, biaya registrasi akan dikembalikan setelah dipotong biaya review dengan besar potongan Rp. 500.000. Bagi peserta yang papernya direject di tahap publisher, maka biaya registrasi tidak dapat dikembalikan.</i> </div>
                                            <?php if($a['payment_status']=="not uploaded") {?>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                <table class="table table-striped" >
                                                    <thead>
                                                        
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3"><small>Created at . Last Update </small>    </td>
                                                        </tr>
                                                        <?php if($now>=$sc['awal_payment'] && $now<=$sc['akhir_payment']){?> 
                                                        <form action="/user/payment" method="post" enctype="multipart/form-data">
                                                        <tr>
                                                                <?= csrf_field(); ?>
                                                                <td>Scan Payment Proof</td>
                                                                <td>:</td>
                                                                <td><input type="file" name="payment" class="form-control" id="payment<?=$b;?>" onchange="return paymentValidation<?=$b;?>()" required></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Transfer Date</td>
                                                            <td>:</td>
                                                            <td><input type="date" name="transfer_date" class="form-control" required></td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td width="200px"><b>Transfer Time</b></td>
                                                            <td width="20px">:</td>
                                                            <td><input type="time" name="transfer_time" class="form-control" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="200px"><b>Your Bank Name</b></td>
                                                            <td width="20px">:</td>
                                                            <td><input type="text" name="bank_name" class="form-control" placeholder="Your Bank Name (Example: Bank Negara Indonesia)" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="200px"><b>Your Account Name</b></td>
                                                            <td width="20px">:</td>
                                                            <td><input type="text" name="account_name" class="form-control" placeholder="Your Account Name (Example: Agis Abhi Rafdhi)" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="200px"><b>Your Account Number</b></td>
                                                            <td width="20px">:</td>
                                                            <td><input type="text" name="account_number" class="form-control" placeholder="Your Account Number (Example: 0585180923)" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="200px"><b>Amount of Transfer</b></td>
                                                            <td width="20px">:</td>
                                                            <td><input type="number" name="amount" class="form-control" placeholder="Amount" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <input type="hidden" name="id_payment" value="<?=$a['id_payment'];?>">
                                                            <input type="hidden" name="abs_id" value="<?=$a['abs_id'];?>">
                                                            <td><input type="submit" class="btn btn-primary" value="Submit"></td>
                                                        </tr>
                                                        

                                                        </form>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                            <?php }else{?> 
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped" >
                                                        <thead>
                                                            
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3"><small>Created at <?= $a['created_payment']; ?> Last Update <?= $a['update_payment']; ?></small>    </td>
                                                            </tr>
                                                            <form action="/user/payment" method="post" enctype="multipart/form-data">
                                                            <tr>
                                                                    <?= csrf_field(); ?>
                                                                    <td>Scan Payment Proof</td>
                                                                    <td>:</td>
                                                                    <td><a href="/user/download_payment/<?=$a['abs_id'];?>" class="text-green">Download Payment Proof</a></td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Transfer Date</td>
                                                                <td>:</td>
                                                                <td><?= $a['transfer_date']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                
                                                                <td width="200px"><b>Transfer Time</b></td>
                                                                <td width="20px">:</td>
                                                                <td><?= $a['transfer_time']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="200px"><b>Your Bank Name</b></td>
                                                                <td width="20px">:</td>
                                                                <td><?= $a['bank_name']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="200px"><b>Your Account Name</b></td>
                                                                <td width="20px">:</td>
                                                                <td><?= $a['account_name']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="200px"><b>Your Account Number</b></td>
                                                                <td width="20px">:</td>
                                                                <td><?= $a['account_number']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="200px"><b>Amount of Transfer</b></td>
                                                                <td width="20px">:</td>
                                                                <td><?= number_format($a['amount'],0,',','.'); ?></td>
                                                            </tr>
                                                            
    
                                                            </form>
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                </div>
                                                
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFour<?=$b;?>" aria-expanded="false" aria-controls="collapseFour<?=$b;?>"><i class="fa" aria-hidden="true"></i> Revised Paper for <?= $a['abs_id']; ?> <?php if($a['decision']=='revision required'){?>
                                                <span class="label gradient-4 btn-rounded">Upload Revised Paper</span>
                                            <?php }else if($a['decision']=='revision submitted'){ ?>
                                                <span class="label gradient-4 btn-rounded">Revision submitted</span>
                                            <?php } ?></h5>
                                            
                                        </div>
                                        <div id="collapseFour<?=$b;?>" class="collapse" data-parent="#accordion-three">
                                            <div class="table-responsive">
                                                <table class="table table-striped" >
                                                    <thead>
                                                        
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3"><small>Created at <?= $a['created_revised']; ?> Last Update <?= $a['last_revised']; ?></small>    </td>
                                                        </tr>
                                                        <?php if($a['decision']=="revision required"){ ?>

                                                            <tr>
                                                                <?php if($now>=$sc['awal_revised'] && $now<=$sc['akhir_revised']){?> 
                                                                <form action="/user/revised_paper" method="post" enctype="multipart/form-data">
                                                                    <?= csrf_field(); ?>
                                                                    <td>Upload Revised Paper</td>
                                                                    <td>:</td>
                                                                    <input type="hidden" name="abs_id" value="<?=$a['abs_id'];?>">
                                                                    <td><input type="file" name="revised_paper" class="form-control" id="revised<?=$b;?>" onchange="return revisedValidation<?=$b;?>()">
                                                                    <br><input type="submit" class="btn btn-info" value="Submit">
                                                                </td>
                                                                    
                                                                </form>
                                                                <?php } ?>
                                                            </tr>
                                                            <?php } ?>
                                                        <tr>
                                                            <td>Revised Paper</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php if($a['file_rp']=='') {?>
                                                                    -
                                                                <?php }else{?>
                                                                <a href="/user/download_revised/<?=$a['abs_id'];?>" class="text-green">Download Revised Paper</a>
                                                                <?php } ?>
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td width="200px"><b>Decision</b></td>
                                                            <td width="20px">:</td>
                                                            <td><?php if($a['decision_revised']=="waiting decision") {?>
                                                                    <span class="badge badge-warning px-2"><b>Waiting Decision</b></span>
                                                                <?php }else if($a['decision_revised']=="accepted"){?> 
                                                                    <span class="badge badge-success px-2"><b><?= $a['decision_revised']; ?></b></span>
                                                                     
                                                                    <?php } else if($a['decision_revised']=="decline"){?>
                                                                        <span class="badge badge-danger px-2"><b><?= $a['decision_revised']; ?></b></span>
                                                            <?php } else if($a['decision_revised']=="not submitted"){?>
                                                                        <span class="badge badge-info px-2"><b><?= $a['decision_revised']; ?></b></span>
                                                            <?php }else{?>
                                                                -
                                                            <?php } ?>
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>Notes Revised Paper</td>
                                                            <td>:</td>
                                                            <td><?= $a['notes_revised']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFive<?=$b;?>" aria-expanded="false" aria-controls="collapseFive<?=$b;?>"><i class="fa" aria-hidden="true"></i> Poster for <?= $a['abs_id']; ?></h5>
                                        </div>
                                        <div id="collapseFive<?=$b;?>" class="collapse" data-parent="#accordion-three">
                                            <div class="table-responsive">
                                                <table class="table table-striped" >
                                                    <thead>
                                                        
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3"><small>Created at <?= $a['submit_poster']; ?> Last Update <?= $a['update_poster']; ?> </small>    </td>
                                                        </tr>
                                                        <?php if($a['decision_revised']=="accepted"){ ?>

                                                            <tr>
                                                                <?php if($now>=$sc['awal_poster'] && $now<=$sc['akhir_poster']){?> 
                                                                <form action="/user/poster" method="post" enctype="multipart/form-data">
                                                                    <?= csrf_field(); ?>
                                                                    <td>Upload Poster</td>
                                                                    <td>:</td>
                                                                    <input type="hidden" name="abs_id" value="<?=$a['abs_id'];?>">
                                                                    <td><input type="file" name="poster" class="form-control" id="poster<?=$b;?>" onchange="return posterValidation<?=$b;?>()" ><br>
                                                                    <p class="text-green">Posters must be Landscape Oriented with <b>minimum dimensions</b> Height: 2200px and Width: 4000px</p>
                                                                    <input type="submit" value="Submit" class="btn btn-info">
                                                                    </td>
                                                                    
                                                                </form>
                                                                <?php } ?>
                                                            </tr>
                                                            <?php } ?>
                                                        <tr>
                                                            <td>File Poster</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php if($a['poster']==''){?>
                                                                    -
                                                                <?php }else{?>

                                                                    <a href="/user/download_poster/<?=$a['abs_id'];?>" class="text-green">Download Poster <?= $a['abs_id']; ?></a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td width="200px"><b>Status</b></td>
                                                            <td width="20px">:</td>
                                                            <td><?php if($a['status_poster']=="not submitted") {?>
                                                                    <span class="badge badge-warning px-2"><b><?= $a['status_poster']; ?></b></span>
                                                                <?php }else if($a['status_poster']=="submitted"){?> 
                                                                    <span class="badge badge-success px-2"><b><?= $a['status_poster']; ?></b></span>
                                                                     
                                                                    <?php }?>
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        
            </div>
            <script>
                
                    function fileValidation<?=$b;?>() {
                        var fileInput = document.getElementById('full_paper<?=$b;?>');
                        
                        
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
                

        
        
        function paymentValidation<?=$b;?>() {
            var fileInput = document.getElementById('payment<?=$b;?>');
             
            var filePath = fileInput.value;
            
            // Allowing file type
            var allowedExtensions =
            /(\.jpg|\.png)$/i;
            
            if (!allowedExtensions.exec(filePath)) {
                alert('File type should be .JPG or .PNG');
                fileInput.value = '';
                return false;
            }else if(fileInput>=10240){
                alert('File Size more than 10MB. Please select a file less than 10MB');
                fileInput.value = '';
                return false;
            }
            
        }
        
        function revisedValidation<?=$b;?>() {
            var fileInput = document.getElementById('revised<?=$b;?>');
            
            var filePath = fileInput.value;
            
            // Allowing file type
            var allowedExtensions =
            /(\.docx|\.doc)$/i;
            
            if (!allowedExtensions.exec(filePath)) {
                alert('File type should be .DOCX or .DOC');
                fileInput.value = '';
                return false;
            }
        }
        
        function posterValidation<?=$b;?>() {
            var fileInput = document.getElementById('poster<?=$b;?>');
            
            var filePath = fileInput.value;
         
            // Allowing file type
            var allowedExtensions = /(\.jpg|\.png)$/i;
            
            if (!allowedExtensions.exec(filePath)) {
                alert('File type should be .PNG or JPG');
                fileInput.value = '';
                return false;
            }

            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
    if (regex.test(fileInput.value.toLowerCase())) {
 
        //Check whether HTML5 is supported.
        if (typeof (fileInput.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileInput.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (height <= 1 || width <= 1) {
                        alert("Height must > 4000px and Width must > 2200px.");
                        fileInput.value = '';
                        return false;
                    }
                    
                    return true;
                };
 
            }
        } else {
            alert("This browser does not support HTML5.");
            return false;
        }
    }
        }
        


</script>
<?php $b++; ?>
<?php endforeach; ?>
</div>
</div>
</div>
</div>

<!-- row -->
<!--**********************************
            Content body end
        ***********************************-->
<?= $this->endSection(); ?>