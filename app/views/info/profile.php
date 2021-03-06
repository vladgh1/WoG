<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APPNAME ?> - user profile</title>
    <link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
    <link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
    <link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/profile.css'>

</head>

<body>
    <div class="form-wrapper">

        <?php include_once APPROOT . '/views/includes/loggedInHeader.php'; ?>

        <form method="post" action="<?= URLROOT ?>/public/users/profile" class="set-profile-form-width profile--form">
            <h3 class="profile-text font--alata">Profile</h3>
            <div class="profile-form-block">
                <input type="text" disabled class="profile-input <?= (isset($data['fullnameError']) && strlen($data['fullnameError']) == 0) ? '' : 'error--input' ?>" name="fullname" placeholder="<?= (isset($data['fullnameError']) && strlen($data['fullnameError']) == 0) ? 'Full name' : $data['fullnameError']; ?>" value="<?= (isset($data['fullnameError']) && strlen($data['fullnameError']) == 0 && isset($data['fullname']) && strlen($data['fullname'])) ? $data['fullname'] : null ?>" required>
            </div>

            <div class="profile-form-block">
                <input type="password" disabled class="profile-input <?= (isset($data['passwordError']) && strlen($data['passwordError']) == 0) ? '' : 'error--input' ?>" name="password" placeholder="<?= (isset($data['passwordError']) && strlen($data['passwordError']) == 0) ? 'Password' : $data['passwordError']; ?>" value="<?= (isset($data['passwordError']) && strlen($data['passwordError']) == 0 && isset($data['password']) && strlen($data['password'])) ? $data['password'] : null ?>" required>
            </div>

            <div class="profile-form-block">
                <input type="password" disabled class="profile-input <?= (isset($data['confirmPasswordError']) && strlen($data['confirmPasswordError']) == 0) ? '' : 'error--input' ?>" name="cpassword" placeholder="<?= (isset($data['confirmPasswordError']) && strlen($data['confirmPasswordError']) == 0) ? 'Confirm Password' : $data['confirmPasswordError']; ?>" value="<?= (isset($data['confirmPasswordError']) && strlen($data['confirmPasswordError']) == 0 && isset($data['confirmPassword']) && strlen($data['confirmPassword'])) ? $data['confirmPassword'] : null ?>" required>
            </div>

            <div class="profile-form-block">
                <input type="number" disabled class="profile-input <?= (isset($data['ageError']) && strlen($data['ageError']) == 0) ? '' : 'error--input' ?>" name="age" placeholder="<?= (isset($data['ageError']) && strlen($data['ageError']) == 0) ? 'Age' : $data['ageError']; ?>" value="<?= (isset($data['ageError']) && strlen($data['ageError']) == 0 && isset($data['age']) && strlen($data['age'])) ? $data['age'] : null ?>">
                <select name="gender" disabled class="profile-input <?= (isset($data['genderError']) && strlen($data['genderError']) == 0) ? '' : 'error--input' ?>" required>
                    <option value="" style="display: none;">Choose gender</option>
                    <option value="Male" <?= $data['gender'] == 'Male' ? "selected" : "" ?>>Male</option>
                    <option value="Female" <?= $data['gender'] == 'Female' ? "selected" : "" ?>>Female</option>
                </select>
            </div>

            <div class="profile-form-block">
                <input type="number" disabled class="profile-input <?= (isset($data['heightError']) && strlen($data['heightError']) == 0) ? '' : 'error--input' ?>" name="height" placeholder="<?= (isset($data['heightError']) && strlen($data['heightError']) == 0) ? 'Height' : $data['heightError']; ?>" value="<?= (isset($data['heightError']) && strlen($data['heightError']) == 0 && isset($data['height']) && strlen($data['height'])) ? $data['height'] : null ?>">
                <select name="typeheight" class="profile-input" disabled required>
					<option value="" style="display: none;">Error</option>
                    <option value="cm" <?= $data['heightUnit'] == 'cm' ? "selected" : "" ?>>CM</option>
                    <option value="feet" <?= $data['heightUnit'] == 'feet' ? "selected" : "" ?>>Feet & Inches</option>
                </select>
            </div>

            <div class="profile-form-block">
                <input type="number" disabled class="profile-input <?= (isset($data['weightError']) && strlen($data['weightError']) == 0) ? '' : 'error--input' ?>" name="weight" placeholder="<?= (isset($data['weightError']) && strlen($data['weightError']) == 0) ? 'Weight' : $data['weightError']; ?>" value="<?= (isset($data['weightError']) && strlen($data['weightError']) == 0 && isset($data['weight']) && strlen($data['weight'])) ? $data['weight'] : null ?>">
                <select name="typeweight" class="profile-input" disabled required>
					<option value="" style="display: none;">Error</option>
                    <option value="kg" <?= $data['weightUnit'] == 'kg' ? "selected" : "" ?>>Kg</option>
                    <option value="lb" <?= $data['weightUnit'] == 'lb' ? "selected" : "" ?>>Pounds</option>
                </select>
            </div>
            <div class="main-login-profile--container">
                <input type="button" class="buttons-group-2 hidden-button form-button" name="submit_btn" value="Cancel" onclick="toggleInputsVisible()">
                <input type="submit" class="buttons-group-2 hidden-button form-button" name="submit_btn" value="Update">

                <input type="button" class="buttons-group-1 visible-button form-button" name="submit_btn" value="Update Profile" onclick="toggleInputsVisible()">
            </div>
        </form>

    </div>

    <script src='<?= URLROOT ?>/public/src/scripts/profile.js'></script>
</body>

</html>