<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';
// データベースに接続
$notyet_plan = findPlanByStatus(PLAN_STATUS_NULL);
?>

<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/head.html' ?>

<!-- _head.phpの読み込み -->

<body>
    <div class="wrapper">
        <h1 class="title">学習管理アプリ</h1>
        <div class="form-area">
            <!-- エラー表示 -->

            <form action="" method="post">
                <label for="title">学習内容</label>
                <input type="text" name="title">
                <label for="due_date">期限日</label>
                <input type="date" name="due_date">
                <input type="submit" class="btn submit-btn" value="追加">
            </form>
        </div>
        <div class="incomplete-area">
            <h2 class="sub-title">未達成</h2>
            <table class="plan-list">
                <thead>
                    <tr>
                        <th class="plan-title">学習内容</th>
                        <th class="plan-due-date">完了期限</th>
                        <th class="done-link-area"></th>
                        <th class="edit-link-area"></th>
                        <th class="delete-link-area"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($notyet_plan as $plan) : ?>
                        <tr>
                            <td><?=h($plan['title'])?> </td>
                            <td><?= h(date('Y/m/d', strtotime($plan['due_date'])))?></td>
                            <td><a href="done.php?id=<?= h($plan['id']) ?>" class="btn done-btn">完了</a></td>
                            <td><a href="edit.php?id=<?= h($plan['id']) ?>" class="btn edit-btn">編集</a></td>
                            <td><a href="delete.php?id=<?= h($plan['id']) ?>" class="btn delete-btn">削除</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="complete-area">
            <h2 class="sub-title">完了</h2>
            <table class="plan-list">
                <thead>
                    <tr>
                        <th class="plan-title">学習内容</th>
                        <th class="plan-completion-date">完了日</th>
                        <th class="done-link-area"></th>
                        <th class="edit-link-area"></th>
                        <th class="delete-link-area"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><a href="" class="btn incomplete-btn">未完了</a></td>
                        <td><a href="" class="btn edit-btn">編集</a></td>
                        <td><a href="" class="btn delete-btn">削除</a></td>
                    </tr>
                    <!-- 完了済のデータを表示 -->

                </tbody>
            </table>
        </div>
    </div>
</body>