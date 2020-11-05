<?php

/**
 * @package Hide Images From Guests
 * @version 2.1
 * @author Diego Andrés <diegoandres_cortes@outlook.com>
 * @copyright Copyright (c) 2015, Diego Andrés
 * @license https://www.mozilla.org/en-US/MPL/2.0/
 */

if (!defined('SMF'))
	die('No direct access...');

class HIFG
{
	public static function bbc_code(&$codes, &$no_autolink_tags)
	{
		global $user_info, $txt;

		$new_codes = [];
		foreach ($codes as $code)
		{
			if ($code['tag'] == 'img')
			{
				$code['content'] = $user_info['is_guest'] ? $txt['hifg_cannot_view'] . '<br />' : $code['content'];
				$code['disabled_content'] = $user_info['is_guest'] ? $txt['hifg_cannot_view'] . '<br />' : $code['disabled_content'];
			}

			// Temp
			$new_codes[] = $code;
		}
		$codes = $new_codes;
	}
}