<?php

$cminds_plugin_config = array(
    'plugin-is-pro'                 => FALSE,
    'plugin-free-only'              => FALSE,
    'plugin-has-addons'             => FALSE,
    'plugin-version'                => '1.4.9',
    'plugin-abbrev'                 => 'cmpopfly',
    'plugin-short-slug'             => 'cmpopfly',
    'plugin-parent-short-slug'      => '',
    'plugin-affiliate'              => '',
    'plugin-redirect-after-install' => admin_url( 'admin.php?page=cm-popupflyin-settings' ),
    'plugin-settings-url'           => admin_url( 'admin.php?page=cm-popupflyin-settings' ),
    'plugin-show-guide'             => TRUE,
    'plugin-show-upgrade'           => TRUE,
    'plugin-show-upgrade-first'     => TRUE,
    'plugin-guide-text'             => '    <div style="display:block">
        <ol>
            <li>Go to <strong>"Add New Campaign"</strong></li>
            <li>Fill the <strong>"Title"</strong> of the campaign and <strong>"Content"</strong> of one or many Advertisement Items</li>
            <li>Click <strong>"Add Advertisement Item"</strong> to dynamically add more items</li>
            <li>Check <strong>"Show on every page"</strong></li>
            <li>Pick the <strong>"Selected banner"</strong> near the "Display method"</li>
            <li>Click <strong>"Publish" </strong> in the right column.</li>
            <li>Go to any page of your website</li>
            <li>Watch the banner with Advertisement Item</li>
            <li>Close the banner clicking "X" icon</li>
        </ol>
    </div>',
    'plugin-guide-video-height'     => 240,
    'plugin-guide-videos'           => array(
        array( 'title' => 'Installation tutorial', 'video_id' => '157541754' ),
    ),
        'plugin-upgrade-text'           => 'Our WordPress popup plugin helps you add responsive popup banners to your site with custom messages and effects.',
    'plugin-upgrade-text-list'      => array(
        array( 'title' => 'Creating Custom Banners', 'video_time' => '0:04' ),
        array( 'title' => 'Creating Random Banners', 'video_time' => '0:50' ),
        array( 'title' => 'Autoplay Video Banner', 'video_time' => '1:28' ),
        array( 'title' => 'Javascript Triggered Banner', 'video_time' => '2:01' ),
        array( 'title' => 'Using the Ad Designer', 'video_time' => '3:56' ),
        array( 'title' => 'Controling Delay and Interval', 'video_time' => '5:07' ),
        array( 'title' => 'Setting Display Effects', 'video_time' => '6:33' ),
        array( 'title' => 'Restrict Campaign By Period', 'video_time' => '7:11' ),
        array( 'title' => 'Statistics and Reports', 'video_time' => '8:00' ),
       array( 'title' => 'Target Users', 'video_time' => '9:06' ),
       array( 'title' => 'Restrict by Days of the Week', 'video_time' => '9:55' )
      ),
    'plugin-upgrade-video-height' => 240,
    'plugin-upgrade-videos'       => array(
        array( 'title' => 'PopUp Introduction', 'video_id' => '287417713' ),
    ),
    'plugin-file'                   => CMPOPFLY_PLUGIN_FILE,
    'plugin-dir-path'               => plugin_dir_path( CMPOPFLY_PLUGIN_FILE ),
    'plugin-dir-url'                => plugin_dir_url( CMPOPFLY_PLUGIN_FILE ),
    'plugin-basename'               => plugin_basename( CMPOPFLY_PLUGIN_FILE ),
    'plugin-icon'                   => '',
    'plugin-name'                   => CMPOPFLY_NAME,
    'plugin-license-name'           => CMPOPFLY_NAME,
    'plugin-slug'                   => '',
    'plugin-menu-item'              => CMPOPFLY_SLUG_NAME,
    'plugin-textdomain'             => CMPOPFLY_SLUG_NAME,
    'plugin-userguide-key'          => '350-cm-pop-up-banners-cmpb',
    'plugin-store-url'              => 'https://www.cminds.com/wordpress-plugins-library/cm-pop-up-banners-plugin-for-wordpress/',
    'plugin-review-url'             => 'https://wordpress.org/support/view/plugin-reviews/cm-pop-up-banners',
    'plugin-changelog-url'          => 'https://www.cminds.com/wordpress-plugins-library/cm-pop-up-banners-plugin-for-wordpress/#changelog',
    'plugin-licensing-aliases'      => array(),
    'plugin-compare-table'          => '
    <div class="pricing-table" id="pricing-table"><h2 style="padding-left:10px;">Upgrade The Popup Plugin:</h2>
                <ul>
                    <li class="heading" style="background-color:red;">Current Edition</li>
                    <li class="price">FREE<br /></li>
                 <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Define campaign with a banner <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Add a banner to each canpaign you define so it will show in the popup"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Use PopUp campaigns <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Choose between pop-up and fly-in banner options. You can define multiple campaigns to work on your website."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Choose PopUp width/height <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title=" Choose the width/height of the custom WordPress popup."></span></li>
                    <hr>
                    Other CreativeMinds Offerings
                    <hr>
                 <a href="https://www.cminds.com/wordpress-plugins-library/seo-keyword-hound-wordpress/" target="blank"><img src="' . plugin_dir_url( __FILE__ ). 'views/Hound2.png"  width="220"></a><br><br><br>
                <a href="https://www.cminds.com/store/cm-wordpress-plugins-yearly-membership/" target="blank"><img src="' . plugin_dir_url( __FILE__ ). 'views/banner_yearly-membership_220px.png"  width="220"></a><br>
                 </ul>

                <ul>
                    <li class="heading">Pro<a href="https://www.cminds.com/wordpress-plugins-library/cm-pop-up-banners-plugin-for-wordpress/af/4806?utm_source=PopUp&utm_medium=PopUp" style="float:right;font-size:11px;color:white;" target="_blank">More</a></li>
                    <li class="price">$29.00<br /> <span style="font-size:14px;">(For one Year / 2 Sites)<br />Additional pricing options available <a href="https://www.cminds.com/wordpress-plugins-library/cm-pop-up-banners-plugin-for-wordpress/af/4806?utm_source=PopUp&utm_medium=PopUp" target="_blank"> >>> </a></span> <br /></li>
                    <li class="action"><a href="https://www.cminds.com/af/4806?utm_source=WordPress&utm_medium=PopUp&edd_action=add_to_cart&download_id=41966&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" style="font-size:18px;" target="_blank">Upgrade Now</a></li>
                     <li style="text-align:left;"><span class="dashicons dashicons-plus-alt"></span><span style="background-color:lightyellow">&nbsp;All Free Version Features </span><span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="All free features are supported in the pro"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Use Fly-In and Full Screen Campaigns <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Support more campaign types such as Fly-in and Full-Screen"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Advanced styling options <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="More styling options when setting up the popup campaign"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Advanced Responsive support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Ability to control which popup will show on which screen size"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Ad Designer support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Easily create a custom banner and add the required text and colors. The Ad Designer is an easy to use tool that helps you build popup banners."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Statistics and reports <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Track banner clicks and impressions in an easy-to-use report. If you use banner variations in a campaign you can check when the banner converts more."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Restrict by Page/Post/Url <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Choose which pages, posts or specific URL your campaign will appear on. You can choose multiple pages for each campaign."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Restrict to group of pages <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Define multiple pages and posts per each campaign"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Restrict by time period <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Choose the start and end date and time for your popup ad campaign. You can define that the campaign will run on specific days of the week."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Random campaigns <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Add multiple popup banners in the same campaign and randomly show a popup allowing you to choose the best converting popup."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Custom effects <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Define PopUp banner campaign effects once popup shows. For example you can make the popup slide before appearing.."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Option to add delay <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Add a delay between the time that the page loads and the popup appears."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Option to setup the display interval <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Define when user will see the popup. On every page load, one per each page and more."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Activate on JS event <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Trigger popup on a JS event such as click or hover"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Show once per user session <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Limit each popup to the first user session"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Target Logged-in Users <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Set campaign to target logged-in or non logged-in users."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Show X amount per customer <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="You can define that the campaign will show X amount of time per a specific customer until it stops."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Inactivity detection  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="You can show the popup when user’s inactive for X seconds (not moving mouse and not typing)."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Page leave intent detection Popup <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Detect when user moves cursor to close the tab and in such event show the popup."></span></li>
                    <li class="support" style="background-color:lightgreen; text-align:left; font-size:14px;"><span class="dashicons dashicons-yes"></span> One year of expert support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="You receive 365 days of WordPress expert support. We will answer questions you have and also support any issue related to the plugin. We will also provide on-site support."></span><br />
                         <span class="dashicons dashicons-yes"></span> Unlimited product updates <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="During the license period, you can update the plugin as many times as needed and receive any version release and security update"></span><br />
                        <span class="dashicons dashicons-yes"></span> Plugin can be used forever <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose not to renew the plugin license, you can still continue to use it as long as you want."></span><br />
                        <span class="dashicons dashicons-yes"></span> Save 40% once renewing license <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose to renew the plugin license you can do this anytime you choose. The renewal cost will be 35% off the product cost."></span></li>
                 </ul>


            </div>',
);
