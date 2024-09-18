<?php $title = generateHeadTitle("edit-note"); ?>

<?php ob_start();  ?>

<div class="the-form-container container">
    <div class="content">
        <h4>Edit Note</h4>
        <div class="row">
            <form id="edit-note-form" action="/edit-note?id=<?= $statement['id'] ?>" method="post" class="col s12" enctype="application/x-www-form-urlencoded">
                <!-- title -->
                <div class="row">
                    <div class="input-field col s12 m6 l6 xl6">
                        <input id="title" name="title" maxlength="20" minlength="2" type="text" class="validate" required value="<?= htmlspecialchars($statement['title']) ?>" />
                        <label for="title" class="active">Title</label>
                        <span id="title-error" class="error-message red-text"><?= isset($errors["title"]) ? $errors['title'] : ''  ?></span>
                    </div>
                </div>
                <!-- content -->
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="note-content" name="note-content" max=400 maxlength="400" minlength="10" class="materialize-textarea validate" required><?= htmlspecialchars($statement['content']) ?></textarea>
                        <label for="note-content" class="active">Note Content</label>
                        <span id="note-content-error" class="error-message red-text"><?= isset($errors["note-content"]) ? $errors['note-content'] : ''  ?></span>
                    </div>
                </div>
                <!-- options -->
                <div class="row">
                    <div class="input-field col s12">
                        <select id="note-color" name="note-color" required>
                            <option value="" disabled>Select a color</option>
                            <option class="yellow-text accent-4" value="yellow accent-4" <?= $statement['color'] == 'yellow accent-4' ? 'selected' : '' ?>>Yellow</option>
                            <option class="light-blue-text" value="light-blue" <?= $statement['color'] == 'light-blue' ? 'selected' : '' ?>>Blue</option>
                            <option class="pink-text lighten-1" value="pink lighten-1" <?= $statement['color'] == 'pink lighten-1' ? 'selected' : '' ?>>Pink</option>
                            <option class="blue-grey-text darken-1" value="blue-grey darken-1" <?= $statement['color'] == 'blue-grey darken-1' ? 'selected' : '' ?>>Grey</option>
                            <option class="orange-text lighten-1" value="orange lighten-1" <?= $statement['color'] == 'orange lighten-1' ? 'selected' : '' ?>>Orange</option>
                        </select>
                        <label>Color</label>
                        <span id="note-color-error" class="error-message red-text"><?= isset($errors["note-color"]) ? $errors['note-color'] : ''  ?></span>
                    </div>
                </div>
                <!-- operations -->
                <div class="btn-container">
                    <a href="/" class="waves-effect waves-red btn-flat red-text">Cancel</a>
                    <button id="submit-btn" type="submit" class="waves-effect waves-light-blue btn-flat light-blue-text">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require_once(__DIR__ . "../../template/layout/layout.php") ?>