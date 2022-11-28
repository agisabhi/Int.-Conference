<?= $this->extend('layout/templateadmin'); ?>


<?= $this->section('contentadmin'); ?>
<?php $session = session(); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row"> 
                <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="img-fluid" src="images/big/img3.jpg" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">User</h5>
                                        <table class="table table-info">
                                            <tr>
                                                <td>Total User</td>
                                                <td><b><?= $usertotal; ?></b></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>User Unikom</td>
                                                <td><b><?= $userunikom; ?></b></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>User Non Unikom</td>
                                                <td><b><?= $usernonunikom; ?></b></td>
                                                
                                            </tr>

                                        </table>
                                        
                                    </div>
                                </div>
                </div>
                <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="img-fluid" src="images/big/img3.jpg" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Abstract</h5>
                                        <table class="table table-info">
                                            <tr>
                                                <td>Total Abstract</td>
                                                <td><b><?= $abs_total; ?></b></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Abstract from Unikom</td>
                                                <td><b><?= $abs_unikom; ?></b></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Abstract Non Unikom</td>
                                                <td><b><?= $abs_non; ?></b></td>
                                                
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                </div>
                <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="img-fluid" src="images/big/img3.jpg" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Full Paper</h5>
                                        <table class="table table-info">
                                            <tr>
                                                <td>Total Full Paper</td>
                                                <td><b><?= $full_total; ?></b></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Full Paper from Unikom</td>
                                                <td><b><?= $full_unikom; ?></b></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Full Paper Non Unikom</td>
                                                <td><b><?= $full_non; ?></b></td>
                                                
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                </div>
                <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="img-fluid" src="images/big/img3.jpg" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Revised Paper</h5>
                                        <table class="table table-info">
                                            <tr>
                                                <td>Total Revised Paper</td>
                                                <td><b><?= $revised_total; ?></b></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Revised Paper from Unikom</td>
                                                <td><b><?= $revised_unikom; ?></b></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Revised Paper Non Unikom</td>
                                                <td><b><?= $revised_non; ?></b></td>
                                                
                                            </tr>

                                        </table>   
                                    </div>
                                </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="img-fluid" src="images/big/img3.jpg" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Poster</h5>
                                        <table class="table table-info">
                                            <tr>
                                                <td>Total Poster</td>
                                                <td><b><?= $poster_total; ?></b></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Poster from Unikom</td>
                                                <td><b><?= $poster_unikom; ?></b></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Poster Non Unikom</td>
                                                <td><b><?= $poster_non; ?></b></td>
                                                
                                            </tr>

                                        </table> 
                                    </div>
                                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>