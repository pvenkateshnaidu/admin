  <select name="area"  id="areaId" class="form-control">
                                        <option value="">------- Select -------</option>   
<?php if(!empty($result)) { foreach ($result as $value){ ?>
                                        <option value="<?= $value->id ?>"><?php echo $value->area_name; ?></option>   
                                        <?php } } ?>
         </select>