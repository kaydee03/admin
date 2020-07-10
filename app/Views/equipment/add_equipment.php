    <a href="#" onclick="toggleAddForm(event)" class="btn btn-success mb-2">Add Equipment</a>
    <?php

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    }

    $tableHead = '<thead class="">
                    <tr class="">
                    <th>Unit Num.</th>
                    <th>Type</th>
                    <th>Trailer Type</th>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>VIN</th>
                    <th>Plate</th>
                    <th>IRP</th>
                    <th>Unladen Wt.</th>
                    <th>Action</th>
                  </tr>
              </thead>';
    ?>
    <div class="row mt-3">
        <div class="col-12" style="display:none;" id="addFormWrapper">
            <table class="table table-bordered table-responsive text-nowrap">
                <?= $tableHead ?>
                <tbody>
                    <tr>
                        <td><input type="text" name="unit_num" class="form-control" id="unit_num" placeholder="Please enter unit num"></td>
                        <td>
                            <div class="form-group">

                                <select id="type" name="type" class="form-control">
                                    <option value="">Select</option>
                                    <option value="">Select</option>
                                    <option value="Tractor">Tractor</option>
                                    <option value="Trailer">Trailer</option>
                                </select>
                            </div>

                        </td>
                        <td>
                            <div class="form-group">

                                <select id="trailer_type" name="trailer_type" class="form-control">
                                    <option value="">Select</option>
                                    <option value="">Select</option>
                                    <option value="V">V</option>
                                    <option value="R">R</option>
                                    <option value="F">F</option>
                                </select>
                            </div>

                        </td>
                        <td><input type="text" name="year" class="form-control" id="year" placeholder="Please enter year"></td>
                        <td><input type="text" name="make" class="form-control" id="make" placeholder="Please enter make"></td>
                        <td><input type="text" name="model" class="form-control" id="model" placeholder="Please enter model"></td>
                        <td><input type="text" name="vin" class="form-control" id="vin" placeholder="Please enter vin"></td>
                        <td><input type="text" name="plate" class="form-control" id="plate" placeholder="Please enter plate"></td>
                        <td><input type="text" name="irp" class="form-control" id="irp" placeholder="Please enter irp"></td>
                        <td><input type="text" name="unladen_wt" class="form-control" id="unladen_wt" placeholder="Please enter unladen_wt"></td>
                        <td><button type="submit" id="send_form" class="btn btn-success">Submit</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
