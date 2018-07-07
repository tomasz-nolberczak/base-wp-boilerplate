<form action="#" id="contact-form">
    <div class="row no-gutters inputs-container">
        <div class="col-md-6">
            <div class="input">
                <input type="text" name="contactFirstName" placeholder="<?= _e('Imię', 'base')?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input">
                <input type="text" name="contactLastName" placeholder="<?= _e('Nazwisko', 'base')?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input">
                <input type="text" name="contactPhone" placeholder="<?= _e('Numer telefonu', 'base')?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input">
                <input type="text" name="contactEmailAddress" placeholder="<?= _e('Adres e-mail', 'base')?>" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="input">
                <input type="text" name="contactTopic" placeholder="<?= _e('Temat', 'base')?>" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="input">
                <textarea name="contactMessage" placeholder="<?= _e('Treść wiadomości', 'base')?>" required></textarea>
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-md-9">

        </div>
        <div class="col-md-3">
            <button type="submit" class="button"><?= _e('Wyślij', 'base')?></button>
        </div>
    </div>
</form>