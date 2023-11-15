<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>


    <div class="container">
        <!-- SECTION HEADING -->
        <h2 class="text-center animate__animated animate__bounce">Rooms</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <p class="animate__animated animate__fadeInLeft">View your all rooms here.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <!-- FLASH MESSAGES -->

                <a href="/dashboard/room/create" class="btn btn-primary mb-3">
                    <i class="fa fa-plus"></i> New Room</a>

                <!-- Table Starts Here -->
                <table id="course" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Number</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rooms as $room): ?>
                            <tr>
                                <td>
                                    <?= $this->e($room->num) ?>
                                </td>
                                <td>
                                    <?= $this->e($room->notes) ?>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a href="<?= '/dashboard/room/edit/' . $this->e($room->id) ?>" class="btn btn-xs btn-warning">
                                        <i alt="Edit" class="fa fa-pencil"></i> Edit</a>
                                    <form class="form-inline ml-1" action="<?= '/dashboard/room/delete/' . $this->e($room->id) ?>"
                                        method="POST">
                                        <button type="submit" class="btn btn-xs btn-danger" name="delete-course">
                                            <i alt="Delete" class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- Table Ends Here -->
            </div>
        </div>
    </div>

<div id="delete-confirm" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Do you want to delete this course?</div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Delete</button>
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
            </div>
        </div>
    </div>
</div>
    <?php $this->stop() ?>