<?php
/*
 * This file is part of the MediaWiki extension Popups.
 *
 * Popups is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * Popups is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Popups.  If not, see <http://www.gnu.org/licenses/>.
 *
 * This extension requires that the PageImages and TextExtracts
 * extensions have also been installed.
 *
 * @file
 * @ingroup extensions
 */

/**
 * Adds navigation popups to link on an article
 * @var bool
 */
$wgEnablePopups = true;

$localBasePath = dirname( __DIR__ ) . '/Popups';
$remoteExtPath = 'Popups';

$wgExtensionCredits['other'][] = array(
	'author' => array( 'Prateek Saxena', 'Yair Rand' ),
	'descriptionmsg' => 'popups-desc',
	'name' => 'Popups',
	'path' => __FILE__,
	'url' => 'https://www.mediawiki.org/wiki/Extension:Popups',
);

$wgResourceModules = array_merge( $wgResourceModules, array(
	"ext.popups" => array(
		'scripts' => 'resources/ext.popups.core.js',
		'styles' => array(
			'resources/ext.popups.core.less',
			'resources/ext.popups.animation.less',
		),
		'remoteExtPath' => $remoteExtPath,
		'localBasePath' => $localBasePath,
	),
) );

$wgAutoloadClasses['PopupsHooks'] = __DIR__ . '/Popups.hooks.php';
$wgExtensionMessagesFiles['Popups'] = __DIR__ . '/Popups.i18n.php';
$wgHooks['BeforePageDisplay'][] = 'PopupsHooks::onBeforePageDisplay';