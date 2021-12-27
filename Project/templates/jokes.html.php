<p><?=$totaljokes?>개의 글이 있습니다.</p>

<?php foreach ($jokes as $joke): ?>
    <div>
        <p>
            <?= htmlspecialchars($joke['id'], ENT_QUOTES, 'UTF-8') ?>
            <?= htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8') ?>
            <?= htmlspecialchars($joke['name'], ENT_QUOTES, 'UTF-8') ?>
            <?= htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8') ?>

            <form action="deletejoke.php" method="post">
                <input type="hidden" name="id" value="<?=$joke['id']?>">
                <input type="submit" value="삭제">
            </form>

            <form action="editjoke.php" method="get">
                <input type="hidden" name="id" value="<?=$joke['id'];?>">
                <input type="submit" value="수정">
            </form>

            

        </p>
    </div>
<?php endforeach; ?>