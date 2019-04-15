  <select name="state"  id="stateId" class="form-control">
                                        <option value="">------- Select -------</option>   
<?php if(!empty($result)) { foreach ($result as $value){ ?>
                                        <option value="<?= $value->id ?>"><?php echo $value->name; ?></option>   
                                        <?php } } ?>
         </select>