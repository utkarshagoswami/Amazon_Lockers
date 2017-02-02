<div class="container">
    <div class="row">
    <div class="col-md-12">
    <form action="edit_locker.php" method="post" name="edit_locker">
        <table class="table">
            <tbody>
                <tr>
                    <td>Locker Number</td>
                    <td><input type="text" name="id" value="<?php echo $id ?>" hidden><?php echo $id ?></td>
                </tr>
                <tr>
                    <td>Locker Name</td>
                    <td><input type="text" name="name" pattern="[a-zA-Z ]+" title="Only Alphabets are allowed" value="<?php echo $data['locker_name']?>" required></td>
                </tr>
                <tr>
                    <td>locker City</td>
                    <td><input type="text" name="city" value="<?php echo $data['locker_city']?>" required></td>
                </tr>
                <tr>
                    <td>Locker State</td>
                    <td><input type="text" name="state" pattern="[a-zA-Z ]+" value="<?php echo $data['locker_state']?>" required></td>
                </tr>
                <tr>
                    <td>Locker Pincode</td>
                    <td><input type="text" pattern="^\d{6}$" name="pincode" minlength="6" maxlength="6" value="<?php echo $data['locker_pincode']?>" required></td>
                </tr>
                <tr>
                    <td>Locker Prime Capacity</td>
                    <td><input type="text" name="prime" pattern="[0-9]+" value="<?php echo $data['prime_capacity']?>" required></td>
                </tr>
                <tr>
                    <td>Locker Standard Capacity</td>
                    <td><input type="text" name="standard" pattern="[0-9]+" value="<?php echo $data['standard_capacity']?>" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Save" class="btn btn-warning" value="Save"></td>
                </tr>
            </tbody>
        </table>
    </form>
    </div>
    </div>
</div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>