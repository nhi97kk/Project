<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<div class="container">
    <!-- SECTION HEADING -->
    <h2 class="text-center animate__animated animate__bounce">Manage Courses</h2>

    <div class="row">
        <div class="col-12">

            <!-- FLASH MESSAGES -->
            <!-- Table Starts Here -->
            <table id="course" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Course Name</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">Student count</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td>
                                <?= $this->e($course->name) ?>
                            </td>
                            <td>
                                <?php $teacher = \App\Models\Teacher::where('id', $course->teacher_id)->first() ?>
                                <?= $this->e($teacher->name) ?>
                            </td>
                            <td>
                                <?php
                                $studentCount = Illuminate\Database\Capsule\Manager::select('SELECT countStudentInClass(?) AS studentCount', [$course->id]);
                                ?>
                                <?= $studentCount[0]->studentCount ?>
                            </td>
                            <td class="d-flex justify-content-center ">
                                <a href="<?= '/dashboard/result/view/' . $this->e($course->id) ?>"
                                    class="btn btn-xs btn-success">
                                    <i class="fa-solid fa-users-viewfinder"></i> View Result</a>
                                <div style="width: 2rem;">

                                </div>
                                <a href="<?= '/dashboard/result/' . $this->e($course->id) ?>"
                                    class="btn btn-xs btn-warning">
                                    <i class="fa-solid fa-plus"></i> Add Result</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- Table Ends Here -->
        </div>
    </div>
</div>


<?php $this->stop() ?>