<?php

/**
 * @package Hide Images From Guests
 * @version 2.2
 * @author Diego Andrés <diegoandres_cortes@outlook.com>
 * @copyright Copyright (c) 2021, Diego Andrés
 * @license https://www.mozilla.org/en-US/MPL/2.0/
 */

if (!defined('SMF'))
	die('No direct access...');

class HIFG
{
	public static function bbc_code(&$codes, &$no_autolink_tags)
	{
		global $user_info, $txt;

		// Language
		loadLanguage('HIFG/');

		foreach ($codes as &$code)
		{
			if ($code['tag'] == 'img' && $user_info['is_guest'])
			{
				$code['content'] = $txt['hifg_cannot_view'] . '<br />';
				$code['disabled_content'] = $txt['hifg_cannot_view'] . '<br />';
			}
		}
		unset($code);
	}
}