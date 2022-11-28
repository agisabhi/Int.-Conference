<?= $this->extend('layout/templateadmin'); ?>


<?= $this->section('contentadmin'); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/schedule">Schedule</a></li>
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
                                <h4 class="card-title">Schedule Conferece Setting</h4>
                                <!-- Nav tabs -->
                                <div class="default-tab">
                                    <ul class="nav nav-tabs mb-3" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#abstract">Abstract</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#full_paper">Full Paper</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#payment">Payment</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review1">Review Round 1</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#revised">Revised Paper</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review2">Review Round 2</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#poster">Poster</a>
                                        </li>
                                    </ul>
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="abstract" role="tabpanel">
                                            <div class="p-t-15">
                                                <hr>
                                            <h2>Awal Submit Abstract : <p class="text-green" align="center"><?php $d =date_create($schedule['awal_abstrak']); echo date_format($d, 'd-m-Y H:i:s'); ?> WIB</p></h2><br><br>
                                            <h2>Akhir Submit Abstract : <p class="text-green" align="center"><?php $d =date_create($schedule['akhir_abstrak']); echo date_format($d, 'd-m-Y H:i:s'); ?> WIB</p></h2>
                                            <hr>
                                            <br><br>
                                                <form action="/admin/updateScheduleAbstrak">
                                                <label for="" class="text-yellow">Awal Submit Abstract</label>
                                            <input type="datetime-local" name="awal_abstrak" class="form-control" >
                                            <br>
                                            <label for="" class="text-yellow">Akhir Submit Abstract</label>
                                            <input type="datetime-local" name="akhir_abstrak" class="form-control" >
                                            <br>
                                            <input type="submit" value="Update" class="btn btn-primary">
                                                </form>

                                            
                                            </div>
                                            </div>
                                        
                                        <div class="tab-pane fade" id="full_paper">
                                            <div class="p-t-15">
                                                <hr>
                                            <h2>Awal Submit Full Paper : <p class="text-green" align="center"><?php $d =date_create($schedule['awal_full']); 
                                            if($schedule['awal_full']!=''){
                                                echo date_format($d, 'd-m-Y H:i:s');
                                                } ?> WIB</p></h2><br><br>
                                                
                                            <h2>Akhir Submit Full Paper : <p class="text-green" align="center"><?php $d =date_create($schedule['akhir_full']); if($schedule['akhir_full']!=''){
                                                echo date_format($d, 'd-m-Y H:i:s');
                                                } ?> WIB</p></h2>
                                            <hr>
                                            <br><br>
                                                <form action="/admin/updateScheduleFull">
                                                <label for="" class="text-yellow">Awal Submit Full Paper</label>
                                            <input type="datetime-local" name="awal_full" class="form-control" >
                                            <br>
                                            <label for="" class="text-yellow">Akhir Submit Full Paper</label>
                                            <input type="datetime-local" name="akhir_full" class="form-control" >
                                            <br>
                                            <input type="submit" value="Update" class="btn btn-primary">
                                                </form>

                                            
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="payment">
                                            <div class="p-t-15">
                                                <hr>
                                            <h2>Awal Submit Payment : <p class="text-green" align="center"><?php $d =date_create($schedule['awal_payment']); 
                                            if($schedule['awal_payment']!=''){
                                                echo date_format($d, 'd-m-Y H:i:s');
                                                } ?> WIB</p></h2><br><br>
                                                
                                            <h2>Akhir Submit Payment : <p class="text-green" align="center"><?php $d =date_create($schedule['akhir_payment']); if($schedule['akhir_payment']!=''){
                                                echo date_format($d, 'd-m-Y H:i:s');
                                                } ?> WIB</p></h2>
                                            <hr>
                                            <br><br>
                                                <form action="/admin/updateSchedulePayment">
                                                <label for="" class="text-yellow">Awal Submit Payment</label>
                                            <input type="datetime-local" name="awal_payment" class="form-control" >
                                            <br>
                                            <label for="" class="text-yellow">Akhir Submit Payment</label>
                                            <input type="datetime-local" name="akhir_payment" class="form-control" >
                                            <br>
                                            <input type="submit" value="Update" class="btn btn-primary">
                                                </form>

                                            
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="review1">
                                            <div class="p-t-15">
                                                <hr>
                                            <h2>Awal Review Round 1 : <p class="text-green" align="center"><?php $d =date_create($schedule['awal_review1']); 
                                            if($schedule['awal_review1']!=''){
                                                echo date_format($d, 'd-m-Y H:i:s');
                                                } ?> WIB</p></h2><br><br>
                                                
                                            <h2>Akhir Review Round 1 : <p class="text-green" align="center"><?php $d =date_create($schedule['akhir_review1']); if($schedule['akhir_review1']!=''){
                                                echo date_format($d, 'd-m-Y H:i:s');
                                                } ?> WIB</p></h2>
                                            <hr>
                                            <br><br>
                                                <form action="/admin/updateScheduleReview1">
                                                <label for="" class="text-yellow">Awal Review Round 1</label>
                                            <input type="datetime-local" name="awal_review1" class="form-control" >
                                            <br>
                                            <label for="" class="text-yellow">Akhir Review Round 1</label>
                                            <input type="datetime-local" name="akhir_review1" class="form-control" >
                                            <br>
                                            <input type="submit" value="Update" class="btn btn-primary">
                                                </form>

                                            
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="revised">
                                            <div class="p-t-15">
                                                <hr>
                                            <h2>Awal Submit Revised Paper : <p class="text-green" align="center"><?php $d =date_create($schedule['awal_revised']); 
                                            if($schedule['awal_revised']!=''){
                                                echo date_format($d, 'd-m-Y H:i:s');
                                                } ?> WIB</p></h2><br><br>
                                                
                                            <h2>Akhir Submit Revised Paper : <p class="text-green" align="center"><?php $d =date_create($schedule['akhir_revised']); if($schedule['akhir_revised']!=''){
                                                echo date_format($d, 'd-m-Y H:i:s');
                                                } ?> WIB</p></h2>
                                            <hr>
                                            <br><br>
                                                <form action="/admin/updateScheduleRevised">
                                                <label for="" class="text-yellow">Awal Revised Paper</label>
                                            <input type="datetime-local" name="awal_revised" class="form-control" >
                                            <br>
                                            <label for="" class="text-yellow">Akhir Revised Paper</label>
                                            <input type="datetime-local" name="akhir_revised" class="form-control" >
                                            <br>
                                            <input type="submit" value="Update" class="btn btn-primary">
                                                </form>

                                            
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="review2">
                                            <div class="p-t-15">
                                                <hr>
                                            <h2>Awal Review Round 2 : <p class="text-green" align="center"><?php $d =date_create($schedule['awal_review2']); 
                                            if($schedule['awal_review2']!=''){
                                                echo date_format($d, 'd-m-Y H:i:s');
                                                } ?> WIB</p></h2><br><br>
                                                
                                            <h2>Akhir Review Round 2 : <p class="text-green" align="center"><?php $d =date_create($schedule['akhir_review2']); if($schedule['akhir_review2']!=''){
                                                echo date_format($d, 'd-m-Y H:i:s');
                                                } ?> WIB</p></h2>
                                            <hr>
                                            <br><br>
                                                <form action="/admin/updateScheduleReview2">
                                                <label for="" class="text-yellow">Awal Review Round 2</label>
                                            <input type="datetime-local" name="awal_review2" class="form-control" >
                                            <br>
                                            <label for="" class="text-yellow">Akhir Review Round 2</label>
                                            <input type="datetime-local" name="akhir_review2" class="form-control" >
                                            <br>
                                            <input type="submit" value="Update" class="btn btn-primary">
                                                </form>

                                            
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="poster">
                                            <div class="p-t-15">
                                                <hr>
                                            <h2>Awal Submit Poster : <p class="text-green" align="center"><?php $d =date_create($schedule['awal_poster']); 
                                            if($schedule['awal_poster']!=''){
                                                echo date_format($d, 'd-m-Y H:i:s');
                                                } ?> WIB</p></h2><br><br>
                                                
                                            <h2>Akhir Submit Poster : <p class="text-green" align="center"><?php $d =date_create($schedule['akhir_poster']); if($schedule['akhir_poster']!=''){
                                                echo date_format($d, 'd-m-Y H:i:s');
                                                } ?> WIB</p></h2>
                                            <hr>
                                            <br><br>
                                                <form action="/admin/updateSchedulePoster">
                                                <label for="" class="text-yellow">Awal Submit Poster</label>
                                            <input type="datetime-local" name="awal_poster" class="form-control" >
                                            <br>
                                            <label for="" class="text-yellow">Akhir Submit Poster</label>
                                            <input type="datetime-local" name="akhir_poster" class="form-control" >
                                            <br>
                                            <input type="submit" value="Update" class="btn btn-primary">
                                                </form>

                                            
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