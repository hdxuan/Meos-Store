<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cakes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT . "/admin" ?>">Home</a></li>
                    <li class="breadcrumb-item active">Cakes</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Cake list</h3>
                            <a class="btn btn-primary" href="<?= DOCUMENT_ROOT . "/admin/" ?>cakes/create">Create</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['cakes'] as $key => $cake) : ?>

                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $cake['name'] ?></td>
                                        <td><?= $cake['price'] ?></td>
                                        <td><?= $cake['size'] ?></td>
                                        <td> <img style="max-width: 100px;" class="rounded img-thumbnail" src="<?= IMAGES_CAKES_URL ?>/<?= $cake['image'] ?>" alt="cake image"></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="<?= DOCUMENT_ROOT ?> /admin/cakes/edit/<?= $cake['id'] ?> " type="button" class="btn btn-success">Edit</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $cake['id'] ?>">Delete</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal<?= $cake['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $cake['id'] ?>" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel<?= $cake['id'] ?>">Xác nhận xóa</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure delete this cake?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                <a href="<?= DOCUMENT_ROOT ?>/admin/cakes/delete/<?= $cake['id'] ?>" class="btn btn-danger">Delete</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->