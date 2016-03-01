<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <label for="s" class="screen-reader-text"><?php _e('','bonestheme'); ?></label>
        <span class="dashicons dashicons-search"></span>
        <input type="search" id="s" name="s" value="Search" onblur="if(this.value == '') {this.value = 'Search';}" onfocus="if(this.value == 'Search') {this.value = '';}"/>

        <button class="puente-btn" type="submit" id="searchsubmit" ><?php _e('Search','bonestheme'); ?></button>
    </div>
</form>