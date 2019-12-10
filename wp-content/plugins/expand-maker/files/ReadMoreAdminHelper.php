<?php

class ReadMoreAdminHelper {
	public static function getPluginActivationUrl($key) {
		$action = 'install-plugin';
		$contactFormUrl = wp_nonce_url(
			add_query_arg(
				array(
					'action' => $action,
					'plugin' => $key
				),
				admin_url( 'update.php' )
			),
			$action.'_'.$key
		);

		return $contactFormUrl;
	}

	public static function getVersionString() {
	    $version = 'YRM_VERSION='.EXPM_VERSION;
	    if(YRM_PKG > YRM_FREE_PKG) {
		    $version = 'YRM_VERSION_PRO=' . EXPM_VERSION_PRO.";";
	    }

	    return $version;
    }

    public static function separateToActiveAndNotActive($extensions) {
        $result = array(
          'active' => array(),
          'passive' => array()
        );

        foreach($extensions as $extension) {
            if(empty($extension)) {
                continue;
            }
            $key = @$extension['pluginKey'];

            if(is_plugin_active($key)) {
                if($extension['isType']) {
                    $result['active'][] = $extension;
                }
            }
            else {
                $result['passive'][] = $extension;
            }
        }

        return $result;
    }

    public static function getLabelProSpan() {
        $proSpan = '';
        if(YRM_PKG == YRM_FREE_PKG) {
            $proSpan = '<a class="yrm-pro-span" href="'.YRM_PRO_URL.'" target="_blank">'.__('pro', YCD_TEXT_DOMAIN).'</a>';
        }

        return $proSpan;
    }

    public static function getOptionPkgClassName() {
        $optionPkgClassName = 'yrm-option-wrapper';
        if(YRM_PKG == YRM_FREE_PKG) {
            $optionPkgClassName .= '-pro';
        }

        return $optionPkgClassName;
    }
}