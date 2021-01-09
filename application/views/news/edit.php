<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/edit/' . $news_item["slug"]); ?>

    <label for="title">Title</label>
    <input type="text" name="title" value='<?php echo $news_item["title"]; ?>' /><br />

    <label for="text">Text</label>
    <textarea name="text"><?php echo $news_item["text"]; ?></textarea><br />

    <input type="submit" name="submit" value="Save" />

</form>