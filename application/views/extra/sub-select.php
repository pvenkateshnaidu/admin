  <select name="subcaste"  id="subcaste" class="form-control">
                                        <option value="">------- Select -------</option>   
<?php if(!empty($castes)) { foreach ($castes as $value){ ?>
                                        <option value="<?= $value->id ?>"><?php echo $value->subCastename; ?></option>   
                                        <?php } } ?>
         </select>