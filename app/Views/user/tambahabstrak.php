<?= $this->extend('layout/templateuser'); ?>


<?= $this->section('contentuser'); ?>

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0" >
            <ol class="breadcrumb" >
                <li class="breadcrumb-item" ><a href="/user">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Abstract</a></li>
                
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="form-validation">
                  <form class="form-valide" action="/user/tambah" method="post">
                    <?= csrf_field(); ?>
                    
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-username">Paper Title <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="val-username" name="judul"
                          placeholder="Enter a Paper Title.." required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-lg-2">
                      </div>
                      <div class="col-lg-10">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target=".bd-example-modal-lg"><i class="fa-solid fa-eye"></i>Example Author and Affiliation </button>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-email">Author(s) <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="val-email" name="penulis"
                          placeholder="Author.." required>
                      </div>
                    </div>
                    
                  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Authors and Affiliation</h5>
                          <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          
                          <div class="form-group row">
                              <label class="col-lg-2 col-form-label" for="val-email">Author(s) <span class="text-danger">*</span>
                              </label>
                              <div class="col-lg-10">
                                <input type="disable" class="form-control" id="val-email" name=""
                                  value="Agis Abhi Rafdhi(1), Herry Saputra(2), Rizky Jumansyah(3)" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-2 col-form-label" for="val-password">Afiliation <span
                                  class="text-danger">*</span>
                              </label>
                              <div class="col-lg-10">
                                <input type="disable" class="form-control" id="val-password" name=""
                                  value="(1,3)Departemen Sistem Informasi, Universitas Komputer Indonesia, Indonesia, (2) Departemen Manajemen, Universitas Komputer Indonesia, Indonesia " required>
                              </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-password">Afiliation <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="val-password" name="afiliasi"
                          placeholder="Enter an Afiliation.." required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-skill">Topic <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <select class="form-control" id="val-skill" name="scope" required>
                          <option value="">Please select</option>
                          <?php foreach ($scope as $s): ?>
                          <option value="<?=$s['id_scope'];?>"><?=$s['scope'];?></option>
                          <?php endforeach;  ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-website">Abstrak <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <textarea name="abstrak" id="val-abstrak" class="form-control" cols="30" rows="10" required></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-currency">Keywords <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="val-currency" name="keyword"
                          placeholder="Enter a Keywords.." required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-phoneus">Presenter <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="val-phoneus" name="presenter"
                          placeholder="Enter the Presenter.." required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label" for="val-digits">Presentation Type <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-10">
                        <select name="type" id="val-type" class="form-control" required>
                            <option value="">Select an option</option>
                            <option value="poster presentation">Poster Presentation</option>
                        </select>
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