<?php if(!empty($studentList)){
        foreach ($studentList as $stu) { ?>
<tr>
    <td data-id="<?= $stu->mid; ?>"><input type="checkbox" name="attendence" class="checkbox"></td>
    <td><?= $stu->stu_roll_number; ?></td>
    <td> <?= $stu->stu_unique_id; ?></td>
    <td><?= $stu->stu_first_name; ?></td>
    <td><input type="text" name="remark" class="form-control"></td>
 
</tr>
<?php } } ?>