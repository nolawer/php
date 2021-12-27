<form action="" method="post">

    <input type="hidden" name='jokeid' value="<?=$joke['id'];?>">

    <label for="joketext">
        글을 입력해주세요
    </label>

    <textarea name="joketext" id="joketext" cols="30" rows="10">
        <?=$joke['joketext'];?>
    </textarea>

    <input type="submit" value="글 업데이트">

</form>