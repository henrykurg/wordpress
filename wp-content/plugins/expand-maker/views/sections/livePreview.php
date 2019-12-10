<div class="panel panel-default">
	<div class="panel-heading"><?php _e('Live preview', YRM_LANG); ?></div>
	<div class="panel-body">
        <div class="row form-group">
            <div class="col-md-12">
                <?php require_once(YRM_VIEWS."livePreview/buttonPreview.php");?>
            </div>
        </div>
        <div class="yrm-shortcode-content-wrapper">
            <?php
            if(ReadMore::RemoveOption('less-button-title')) {
                    $shortCode = '[expander_maker id="'.$id.'" more="Read more"][/expander_maker]';
                }
                else {
                    $shortCode = '[expander_maker id="'.$id.'" more="Read more" less="Read less"]Read more hidden text[/expander_maker]';
                }

            ?>
            <?php if($id != 0): ?>
                <div class="yrm-tooltip">
                    <span class="yrm-tooltiptext" id="yrm-tooltip"><?php _e('Copy to clipboard', YRM_LANG)?></span>
                    <input type="text" id="expm-shortcode-info-div" class="widefat" readonly="readonly" value='<?php echo $shortCode; ?>'>
                </div>
            <?php endif; ?>
            <?php if($id == 0): ?>
                <div class="no-shortcode">
                    <span><?php _e('Please do save read more for getting shortcode.', YRM_LANG); ?></span>
                </div>
            <?php endif; ?>
        </div>
	</div>
</div>

<?php $typeObj->includeOptionsBlock($dataObj); ?>