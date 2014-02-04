<?php
$postCategoryArgs = array(
    'type' => 'post',
    'child_of' => 0,
    'parent' => '',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => 0,
    'hierarchical' => 1,
    'exclude' => '',
    'include' => '',
    'number' => '',
    'taxonomy' => 'category',
    'pad_counts' => false
);
$postCategories = get_categories($postCategoryArgs);
$spCustomSettings = get_option('spCustomSettings');

?>
<div class="wrap">
    <h2> Settings</h2>
    <?php settings_errors('', true,true);?>
    <form action="options.php" method="POST">
        <?php settings_fields('wp_sp_settings_group'); ?>
        <table class="form-table">
            <tbody>
            <tr>
                <th valign="top" scope="row">Post Slider Category</th>
                <td>
                    <select name="spCustomSettings[postSliderCategory]">
                        <option value="--Please select category--"></option>
                        <?php foreach ($postCategories as $category) : ?>
                            <option
                                <?php if ($spCustomSettings['postSliderCategory'] == $category->cat_ID) : ?> selected <?php endif ?>
                                value="<?php echo $category->cat_ID ?>"><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

            </tbody>
        </table>
        <p class="submit">
            <input type="submit" value="Save Changes" class="button button-primary" id="submit"
                                 name="submit">
        </p>
    </form>
</div>
