<?php
/** @var array $data */
?>

<div class='row'>
    <div class='col'>
        <form enctype="multipart/form-data"
              action='/article/<?= !empty($data['article']) ? 'editArticle/' . $data['article']['id'] : 'addArticle' ?>'
              method='post'>
            <div class='form-group'>
                <textarea class='form-control' placeholder='name'
                          name='name'><?= $data['article']['name'] ?? ''; ?></textarea>
            </div>
            <div class='form-group'>
                <textarea class='form-control' placeholder='textarea'
                          name='text'><?= $data['article']['text'] ?? ''; ?></textarea>
            </div>
            <div class='form-group w-25 p-3'>
                <label for="formFile" class="form-label">Add image to Article</label>
                <input class="form-control" name='file' type="file" id="formFile">
            </div>
            <button type='submit' class='btn btn-primary'>Submit</button>
        </form>
    </div>
</div>
