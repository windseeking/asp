<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">News title<sup> *</sup></label>
        <?php $class = isset($errors['title']) ? 'is-invalid' : ''; $value = isset($news['title']) ? $news['title'] : '';?>
        <input type="text" class="form-control <?=$class;?>" id="title" name="news[title]" placeholder="Short & informative" value="<?=filter_tags($value);?>">
        <?php if(isset($errors['title'])): ?>
            <div class="invalid-feedback">
                <?=$errors['title'];?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="cat">Category<sup> *</sup></label>
        <select class="form-control" id="cat" name="news[cat[]]">
            <option value="asp">Association's news</option>
            <option value="members">Members' news</option>
            <option value="finnish&ukrainian">Finnish-Ukrainian news</option>
        </select>
    </div>
    <div class="form-group">
        <label for="text">News text<sup> *</sup></label>
        <?php $class = isset($errors['text']) ? 'is-invalid' : ''; $value = isset($news['text']) ? $news['text'] : '';?>
        <textarea class="form-control <?=$class;?>" name="news[text]" id="text" rows="5"><?=filter_tags($value);?></textarea>
        <?php if(isset($errors['text'])): ?>
            <div class="invalid-feedback">
                <?=$errors['text'];?>
            </div>
        <?php endif; ?>
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="file" name="news[image_path]">
        <label class="custom-file-label" for="file">News image</label>
    </div>
    <button class="btn btn-outline-primary btn-block mt-3" type="submit">Add news</button>
</form>