<header class="page-header" style="background-image: url('<?= $header_image ?>')">
  <div id="page-navigation-padding"></div>

  <h1 class="page-title entry-title"><?= $header_heading ?></h1>
  <p class="page-description"><?= $header_text ?></p>

  <?php
    // 01-31
    $regex_days = '0*([1-9]|[12][0-9]|3[01])';

    // 01-12
    $regex_months = '0*([1-9]|1[0-2])';

    // Min = this year
    // Max = next year
    $min_year = date('Y');
    $max_year = (string) ((int) date('Y') + 1);

    // Generate regex for min and max year
    // Example output (2019-2020): ([2]{1}[0]{1}[1]{1}[9]{1})|([2]{1}[0]{1}[2]{1}[0]{1})
    $regex_years = '(';
    for ($i=0; $i < strlen($min_year); $i++) {
      $regex_years .= '[' . $min_year[$i] . ']{1}';
    }

    $regex_years .= ')|(';

    for ($i=0; $i < strlen($max_year); $i++) {
      $regex_years .= '[' . $max_year[$i] . ']{1}';
    }
    $regex_years .= ')';
  ?>

  <section id="booking-form-wrapper">
    <form id="booking-form" action="" method="get">
      <div class="form-group form-group-line">
        <label for="">
          <?= get_icon('calendar') ?>
          <span>Innsjekk dato</span>
        </label>
        <div class="input input-date">
          <input type="text" name="check_in_day" placeholder="Dag" required maxlength="2" pattern="<?= $regex_days ?>">
          <input type="text" name="check_in_month" placeholder="Måned" required maxlength="2" pattern="<?= $regex_months ?>">
          <input type="text" name="check_in_year" placeholder="År" required value="<?= date('Y') ?>" maxlength="4" pattern="<?= $regex_years ?>">
        </div>
      </div>

      <span>-</span>

      <div class="form-group form-group-line">
        <label for="">
          <?= get_icon('calendar') ?>
          <span>Utsjekk dato</span>
        </label>
        <div class="input input-date">
          <input type="text" name="check_out_day" placeholder="Dag" required maxlength="2" pattern="<?= $regex_days ?>">
          <input type="text" name="check_out_month" placeholder="Måned" required maxlength="2" pattern="<?= $regex_months ?>">
          <input type="text" name="check_out_year" placeholder="År" required value="<?= date('Y') ?>" maxlength="4" pattern="<?= $regex_years ?>">
        </div>
      </div>

      <div class="form-group form-group-line">
        <label for="">
          <?= get_icon('people') ?>
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
          <button type="submit" class="button-secondary">Finn rom</button>
        </div>
      </div>
    </form>
  </section>
</header>
