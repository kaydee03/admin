<div class="form-group">
    <label for="<?= $name ?>"><?= $label ?></label>
    <select name="<?= $name ?>" class="form-control">
        <option value=""><?= $placeholder ?? false ? $placeholder : null ?></option>
       
        <?php foreach ($items as $item) : ?>
            <option value="<?= $item->{$primaryKey} ?>" <?= ($item->{$primaryKey} == $compareTo ? 'selected' : null) ?>>
                <?= $item->{$display} ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>