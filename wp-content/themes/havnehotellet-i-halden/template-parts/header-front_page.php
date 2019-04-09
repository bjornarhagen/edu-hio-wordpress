<header class="page-header" style="background-image: url('<?= $header_image ?>')">
  <h1 class="page-title entry-title"><?= $header_heading ?></h1>
  <p class="page-description"><?= $header_text ?></p>

  <?php
    // 01-31
    $regex_days = '0*([1-9]|[12][0-9]|3[01])';

    // 01-12
    $regex_months = '0*([1-9]|1[0-2])';

    // 2019-2029
    $regex_years = '([2]{1}[0]{1}[1]{1}[9]{1})|([2]{1}[0]{1}[2]{1}[0-9]{1})';
  ?>

  <section>
    <form action="" method="get">
      <div class="form-group form-group-line form-group-label-icon">
        <label for="">
          <span>Innsjekk dato</span>
        </label>
        <div class="inputs">
          <input type="text" name="check_in_day" placeholder="Dag" required maxlength="2" pattern="<?= $regex_days ?>">
          <input type="text" name="check_in_month" placeholder="Måned" required maxlength="2" pattern="<?= $regex_months ?>">
          <input type="text" name="check_in_year" placeholder="År" required value="<?= date('Y') ?>" maxlength="4" pattern="<?= $regex_years ?>">
        </div>
      </div>

      <span>-</span>

      <div class="form-group form-group-line form-group-label-icon">
        <label for="">
          <span>Utsjekk dato</span>
        </label>
        <div class="inputs">
          <input type="text" name="check_out_day" placeholder="Dag" required maxlength="2" pattern="<?= $regex_days ?>">
          <input type="text" name="check_out_month" placeholder="Måned" required maxlength="2" pattern="<?= $regex_months ?>">
          <input type="text" name="check_out_year" placeholder="År" required value="<?= date('Y') ?>" maxlength="4" pattern="<?= $regex_years ?>">
        </div>
      </div>

      <div class="form-group form-group-line form-group-label-icon">
        <label for="">
          <span>Antall personer</span>
        </label>
        <div class="input input-select">
          <select id="" name="people" required>
            <option value="" selected disabled hidden>Antall personer</option>
            <?php for ($i=1; $i <= 15; $i++): ?>
            <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
          </select>
        </div>
      </div>

      <div class="form-group form-group-submit">
        <div class="input">
          <button type="submit">Finn rom</button>
        </div>
      </div>
    </form>
  </section>
</header>
