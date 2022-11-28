<?= $this->extend('layout/templateuser'); ?>


<?= $this->section('contentuser'); ?>

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/user">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Abstract</a></li>
                
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="form-validation">
                  <form class="form-valide" action="/user/edit" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-username">Paper Title <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="val-username" name="judul"
                          value="<?=$abstrak['judul']?>">
                          <input type="hidden" name="abs_id" value="<?=$abstrak['abs_id'];?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-email">Author(s) <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="val-email" name="penulis"
                          value="<?=$abstrak['penulis'];?>">    
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-password">Afiliation <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="val-password" name="afiliasi"
                          value="<?=$abstrak['afiliasi'];?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-skill">Topic <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <select class="form-control" id="val-skill" name="scope">
                          
                          <?php foreach ($scope as $s): ?>
                            <?php if($s['id_scope']==$abstrak['id_scope']) ?>
                          <option value="<?=$s['id_scope'];?>" active><?=$s['scope'];?></option>
                          <?php endforeach;  ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-website">Abstrak <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <textarea name="abstrak" id="val-abstrak" class="form-control" cols="30" rows="10" ><?=$abstrak['abstrak'];?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-currency">Keywords <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="val-currency" name="keyword"
                          value="<?=$abstrak['keyword'];?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-phoneus">Presenter <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="val-phoneus" name="presenter"
                          value="<?=$abstrak['presenter'];?>">
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">
                      <div class="col-lg-10 ml-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/user" class="btn btn-danger">Cancel</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

<?= $this->endSection(); ?>