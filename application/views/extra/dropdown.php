<option>Select Class</option>
<?php foreach($batches as $batch){ ?>
                                                <option value="<?= $batch->id; ?>"><?= strtoupper($batch->batch_name); ?></option>
                                                <?php } ?>
