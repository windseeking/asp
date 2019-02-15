<section>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto py-5">
            <h1>Create an account</h1>
            <form method="post">
                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="email">Email</label>
                        <?php $class = isset($errors['email']) ? 'is-invalid' : ''; $value = isset($user['email']) ? $user['email'] : ''; ?>
                        <input type="email" name="user[email]" class="form-control <?=$class;?>" value="<?=filter_tags($value);?>" id="email" placeholder="Email">

                        <?php if(isset($errors['email'])): ?>
                        <div class="invalid-feedback">
                            <?=$errors['email'];?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="password">Password</label>
                        <?php $class = isset($errors['password']) ? 'is-invalid' : ''; ?>
                        <input type="password" name="user[password]" class="form-control <?=$class;?>" id="password" placeholder="Password">

                        <?php if (!isset($errors['password'])): ?>
                        <div class="invalid-feedback">
                            <?= $errors['password']; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-4 mb-3">
                        <label for="name">Name</label>
                        <?php $class = isset($errors['name']) ? 'is-invalid' : ''; $value = isset($user['name']) ? $user['name'] : ''; ?>
                        <input type="text" name="user[name]" class="form-control <?= $class; ?>" id="name" placeholder="Name" value="<?=filter_tags($value);?>">

                        <?php if(isset($errors['name'])): ?>
                        <div class="invalid-feedback">
                            <?= $errors['name']; ?>
                        </div>
                        <?php endif; ?>

                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="last_name">Last name</label>
                        <?php $class = isset($errors['lastname']) ? 'is-invalid' : ''; $value = isset($user['lastname']) ?  $user['lastname'] : ''; ?>
                        <input type="text" name="user[lastname]" class="form-control <?=$class;?>" id="lastname" placeholder="Last Name" value="<?=filter_tags($value);?>">

                        <?php if(isset($errors['lastname'])): ?>
                            <div class="invalid-feedback">
                                <?= $errors['lastname']; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <?php $class = isset($errors['username']) ? 'is-invalid' : ''; $value = isset($user['username']) ?  $user['username'] : ''; ?>
                            <input type="text" name="user[username]" class="form-control <?=$class;?>" id="username" placeholder="Username" value="<?=filter_tags($value);?>" aria-describedby="inputGroupPrepend">

                            <?php if(isset($errors['username'])): ?>
                                <div class="invalid-feedback">
                                    <?= $errors['username']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-block" type="submit">Sign up</button>
            </form>
          <p class="text-center mt-3"><a href="login.php">Already registered? Click here to log in</a></p>
        </div>
    </div>
</div>
</section>