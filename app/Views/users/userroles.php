<h3>User Roles</h3>
<form action="<?= '/users/updateroles'; ?>"method="post" accept-charset="utf-8">
    <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $user->id ?>">
    <?php if ($roles) : ?>
        <div class="form-group form-check">
            <?php $userRoles = $user->getRoles(); ?>
            <?php foreach ($roles as $role) : ?>
                <div>
                    <input 
                        type="checkbox" 
                        value="<?= $role->r_id ?>" 
                        name="roles[]" 
                        <?= in_array($role->r_id, $userRoles) ? 'checked' : null ?>
                        class="form-check-input" 
                        id="check-r-<?= $role->r_id ?>">
                    <label class="form-check-label" for="check-r-<?= $role->r_id ?>"><?= $role->r_name ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <button type="submit" id="send_form" class="btn btn-success">Update Roles</button>
    </div>
</form>