(function ($) {
  $(document).ready(function () {
    function calculateTotalScore() {
      let totalScore = 0;
      let subjectStats = {};

      // SCFリピーターの行を取得
      const $rows = $('[data-name="diagnostic_answers"] .acf-row');
      if (!$rows.length) return;

      $rows.each(function () {
        const $row = $(this);

        // サブフィールドの値取得
        const correct = $row.find('[data-name="correct_answer"] input:checked').val();
        const score = parseInt($row.find('[data-name="score"] input').val()) || 0;
        const subject = $row.find('[data-name="subject"] select').val() || 'その他';

        if (correct === '正') totalScore += score;

        if (!subjectStats[subject]) subjectStats[subject] = { correct: 0, total: 0 };
        if (correct === '正') subjectStats[subject].correct++;
        subjectStats[subject].total++;
      });

      // 総合得点をセット
      const $total = $('[data-name="total_score"] input');
      if ($total.length) {
        $total.val(totalScore).trigger('change');
      }

      console.log('Total Score:', totalScore, 'Subject Stats:', subjectStats);
    }

    // 初回計算
    calculateTotalScore();

    // 値変更時に再計算
    $(document).on(
      'change',
      '[data-name="correct_answer"] input, [data-name="score"] input, [data-name="subject"] select',
      function () {
        calculateTotalScore();
      }
    );

    // 行追加・削除時
    $(document).on('click', '.scf-add-row, .scf-remove-row', function () {
      setTimeout(calculateTotalScore, 50); // DOM更新待ち
    });
  });
})(jQuery);
