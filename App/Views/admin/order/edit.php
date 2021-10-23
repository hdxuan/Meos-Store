<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit cake</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/cakes">Cakes</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cake Information</h3>
            </div>
            <form action="<?= DOCUMENT_ROOT . "/admin/products/update/" . $data['product']['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">


                    <div class="form-group ">
                        <label for="name">Mã đơn hàng</label>
                        <input value="<?= $data['product']['name'] ?>" type="text" class="form-control" name="name" id="name" placeholder="Cake name">
                    </div>
                    <div class="form-group ">
                        <label for="name">Mã khách hàng</label>
                        <input value="<?= $data['product']['name'] ?>" type="text" class="form-control" name="name" id="name" placeholder="Cake name">
                    </div>
                    <div class="form-group ">
                        <label for="name">Ngày đặt hàng</label>
                        <input value="<?= $data['product']['name'] ?>" type="date" class="form-control" name="name" id="name" placeholder="Cake name">
                    </div>
                    <div class="form-group ">
                        <label for="name">Ngày giao hàng</label>
                        <input value="<?= $data['product']['name'] ?>" type="date" class="form-control" name="name" id="name" placeholder="Cake name">
                    </div>
                    <div class="form-group ">
                        <label for="category">Trạng thái đơn hàng</label>
                        <select name="categoryId" class="form-control" id="category">
                            <?php foreach ($data['categories'] as $key => $categories) : ?>
                                <option <?= $data['product']['id_products_type'] == $categories['id'] ? "selected" : "" ?> value="<?= $categories['id'] ?> "><?= $categories['name'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>


                    <div class="form-group col">
                        <label for="image">Image</label>
                        <input type="file" class="" id="image" name="image">
                        <div>
                            <input type="text" hidden name="oldImage" value="<?= $data['product']['image'] ?>">
                            <img style="max-width: 200px;" class="rounded img-thumbnail" src="<?= IMAGES_PRODUCT_URL . DS . $data['product']['image'] ?>" alt="image cake">
                        </div>
                    </div>
                    <div class="form-group col">
                        <label for="price">Price</label>
                        <input value="<?= $data['product']['price'] ?>" type="number" name="price" class="form-control" id="price" placeholder="Cake price">
                    </div>


                    <div class="form-group">
                        <label for="ingredients">Thành phần</label>
                        <textarea name="ingredients" id="ingredients" class="form-control" cols="2" rows="2"><?= $data['product']['ingredients'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="benerfits">Công dụng</label>
                        <textarea name="benerfits" id="benerfits" class="form-control" cols="2" rows="2"><?= $data['product']['benerfits'] ?></textarea>
                    </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

</section>
<!-- /.content -->