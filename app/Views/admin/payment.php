<?= $this->extend('layout/templateadmin'); ?>


<?= $this->section('contentadmin'); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/payment">Payment</a></li>
                
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3>Payment Data</h3>
                    <table id="payment_admin" class="table table-primary">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>ABS-ID</td>
                                <td>Transfer Date/Time</td>
                                <td>Bank Account Data</td>
                                <td>Transfer Amount</td>
                                <td>Payment Proof</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                $no=1;
                                foreach($payment as $p):?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $p['abs_id']; ?></td>
                                <td><?= $p['transfer_date']; ?> <br>
                                <?= $p['transfer_time']; ?>
                                </td>
                                <td><?= $p['bank_name']; ?><br>
                                <?= $p['account_number']; ?><br>
                                a.n. <?= $p['account_name']; ?>
                                </td>
                                <td>Rp. <?= number_format($p['amount'],0,',','.'); ?></td>
                                <td><a href="/admin/download_payment/<?= $p['abs_id']; ?>" class="text-green">Download Payment Proof</a></td>
                                

                                
                            </tr>
                            <?php $no++; endforeach;?>
                        </tbody>
                    </table>
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