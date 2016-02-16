<div class="container">
    <div class="removepage">
        <form action="remove.php" method="post">
            <fieldset>
                <div class="form-group">
                    <select name = "name">
                        <option value = ""></option>
                        <?php foreach ($rows as $row): ?>
                            <option value="<?= $row["name"] ?>"><?= $row["name"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-default" type="submit">Remove</button>
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>    