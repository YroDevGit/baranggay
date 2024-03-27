<?php $this->extend('partials/main') ?>

<?php $this->section('content') ?>
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add member</h6>
                            <form method="post" action="/admin/addMember">
                               <div class="row g-4">
                               <div class="col-sm-6">
                                <label for="exampleInputEmail1" class="form-label">Fullname</label>
                                    <input type="text" name="fullname" class="form-control" value="<?= old('fullname') ?>" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text text-danger">
                                    <?php if (session('validation')): ?>
                                        <p><?= session('validation')->getError('fullname') ?></p>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Contact number</label>
                                    <input type="text" name="contact" class="form-control" value="<?= old('contact') ?>" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text text-danger">
                                    <?php if (session('validation')): ?>
                                        <p><?= session('validation')->getError('contact') ?></p>
                                    <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= old('email') ?>" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text text-danger">
                                    <?php if (session('validation')): ?>
                                        <p><?= session('validation')->getError('email') ?></p>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <label for="exampleInputEmail1"  class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?= old('address') ?>" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text text-danger">
                                    <?php if (session('validation')): ?>
                                        <p><?= session('validation')->getError('address') ?></p>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                
                               
                                
                                <button type="submit" class="btn btn-primary">Sign in</button>
                               </div>
                            </form>
                            <div align='center'>
                            <?php if(session('msg')): ?>
                    <h2 class="text-success"><?php echo session('msg') ?></h2>
                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6" id="memberTable">
                        
                    </div>
                </div>
            </div>
            <!-- Table End -->
<?php $this->endSection() ?>