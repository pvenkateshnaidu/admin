  <select name="pcaste"  id="caste" class="form-control">
                                        <option value="">------- Select -------</option>
                                                                          
                           

<?php if(!empty($castes)) { foreach ($castes as $value){ ?>
                                        <option value="<?= $value->id ?>"><?php echo $value->caste_name; ?></option>   
                                        <?php } } ?>
</select>